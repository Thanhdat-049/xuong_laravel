<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catelogue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatelogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.catelogue.';
    const PATH_UPLOAD = 'catelogue';
    public function index()
    {
        $data = Catelogue::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //với những trường là file khi thêm nên loại trừ ra khỏi mảng add để thao tác riêng mới them sau
        $data = $request->except('cover'); //lấy tất cả input đầu vào ngoại trừ cover
        $data['is_active'] = $data['is_active'] ?? 0;
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
            //muốn upload file kiểu này phải cấu hình 2 cái
            //trong env cấu hình APP_URL giống đường dẫn trang(http://xuong.test)  web và FILESYSTEM_DISK = public


        }
        //có 2 phương thức thêm insert và create
        // trong th này nên dùng create vì khi dùng lệnh này sẽ hỗ trợ thêm trương created_at và updated_at
        //còn insert() sẽ không hỗ trợ trường này và insert sẽ không chống được lỗi bảo mật thêm vào các trường không có trong cơ sở dữ liệu
        Catelogue::query()->create($data);
        return redirect()->route('admin.catelogue.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $models = Catelogue::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('models'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $models = Catelogue::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $models = Catelogue::query()->findOrFail($id);

        $data = $request->except('cover');
        $data['is_active'] = $data['is_active'] ?? 0;
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));


        }
        $currentCover = $models->cover;

        $models->update($data);

        if($currentCover && Storage::exists($currentCover)){
            Storage::delete($currentCover);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $models = Catelogue::query()->findOrFail($id);

        $models->delete();
        if ($models->cover && Storage::exists($$models->cover)) {
            Storage::delete($$models->cover);
        }
        return back();
    }
}
