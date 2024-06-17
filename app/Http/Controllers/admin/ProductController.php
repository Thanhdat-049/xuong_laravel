<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Catelogue;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    public function index()
    {
        $data = Product::query()->with(['catelogue', 'tags'])->latest('id')->get();
        // dd($data->first()->tags->toArray());
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
        $dataProduct = $request->except(['product_variants', 'tag']);
        $dataProductTag = $request->tag;
        $dataProductVariants = $request->product_variants;
        dd($request->all());
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
        //
    }
}
