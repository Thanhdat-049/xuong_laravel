<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Catelogue;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Exception;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    public function index()
    {
        $data = Product::query()->with(['catelogue', 'tags'])->latest('id')->get();
        foreach ($data as $items) {
            $items->catelogue->name;
        }
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catelogue = Catelogue::query()->pluck('name', 'id')->all();
        $color = ProductColor::query()->pluck('name', 'id')->all();
        $size = ProductSize::query()->pluck('name', 'id')->all();
        $tag = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catelogue', 'color', 'size', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = $request->except(['product_variants', 'tag', 'galleries']);
        $dataProduct['is_hot_deal'] ??= 0;
        $dataProduct['is_good_deal'] ??= 0;
        $dataProduct['is_new'] ??=  0;
        $dataProduct['is_show_home'] ??=  0;
        $dataProduct['is_active'] ??= 0;
        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];
        if ($dataProduct['img_thumbnail']) {
            $dataProduct['img_thumbnail'] = Storage::put('products', $dataProduct['img_thumbnail']);
        }
        $dataProductTags = $request->tag;
        $dataProductVariants = [];
        $dataProductVariantsTmp = $request->product_variants;
        $dataProductGalleries = $request->galleries;
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'image' => $item['image'] ?? null,
                'quantity' => $item['quantity'],
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
            ];
        };

        try {
            DB::beginTransaction();
            $Product = Product::create($dataProduct);
            foreach ($dataProductVariants as $item) {
                $item['product_id'] = $Product->id;
                if ($item['image']) {
                    $item['image'] = Storage::put('products', $item['image']);
                }
                ProductVariant::query()->create($item);
            }

            $Product->tags()->sync($dataProductTags);

            foreach ($dataProductGalleries as $key => $item) {

                ProductGallery::query()->create([
                    'product_id' => $Product->id,
                    'image' => Storage::put('products', $item)
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                $product->tags()->sync([]);
                $product->variants()->delete();
                $product->galleries()->delete();
                $product->delete();

                if ($product->img_thumbnail && Storage::exists($product->img_thumbnail)) {
                    Storage::delete($product->img_thumbnail);
                }

                foreach ($product->galleries as $value) {
                    if ($value->image && Storage::exists($value->image)) {
                        Storage::delete($value->image);
                    }
                }
                foreach ($product->variants as $value) {
                    if ($value->image && Storage::exists($value->image)) {
                        Storage::delete($value->image);
                    }
                }
            }, 3);
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            return back();
        }
    }
}
