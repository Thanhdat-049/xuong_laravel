@extends('admin.layout.master')
@section('title')
    Thêm mới Sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Sku</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="{{ strtoupper(Str::random(8)) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Img Thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                                    </div>
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Price Regular</label>
                                        <input type="number" class="form-control" id="price_regular"
                                            name="price_regular"value="0">
                                    </div>
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Price Sale</label>
                                        <input type="number" class="form-control" id="price_sale"
                                            name="price_sale"value="0">
                                    </div>
                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Catelogue</label>
                                        <select type="text" class="form-control" id="catelogue" name="catelogue">
                                            @foreach ($catelogue as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary mb-3">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_active" checked name="is_active">
                                                <label class="form-check-label" for="SwitchCheck2">Is Active</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-warning mb-3">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_hot_deal" name="is_hot_deal">
                                                <label class="form-check-label" for="SwitchCheck2">Is Hot Deal</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-success mb-3">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_good_deal" name="is_good_deal">
                                                <label class="form-check-label" for="SwitchCheck2">Is Good Deal</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-danger mb-3">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_new" checked name="is_new">
                                                <label class="form-check-label" for="SwitchCheck2">Is New</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-info mb-3">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_show_home" checked name="is_show_home">
                                                <label class="form-check-label" for="SwitchCheck2">Is Show Home</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div>
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>

                                        <div>
                                            <label for="material" class="form-label">Material</label>
                                            <textarea class="form-control" id="material" name="material" rows="2"></textarea>
                                        </div>

                                        <div>
                                            <label for="user_manual" class="form-label">User Manual</label>
                                            <textarea class="form-control" id="user_manual" name="user_manual" rows="2"></textarea>
                                        </div>

                                        <div>
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" id="content" name="content"></textarea>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>


        {{-- //////////////////////////////////////////////// --}}
        <div class="row" style="height: 300px; overflow:scroll">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <table>
                                    <tr>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                    @foreach ($size as $sizeid => $sizename)
                                        @foreach ($color as $colorid => $colorname)
                                            <tr>
                                                <td class="text-center">{{ $sizename }}</td>
                                                <td class="text-center">{{ $colorname }}</td>
                                                <td class="text-center">
                                                    <input type="number" class="form-control"
                                                        name="product_variants[{{ $sizeid . '-' . $colorid }}][quantity]">
                                                </td>
                                                <td class="text-center">
                                                    {{-- <input type="file" class="form-control" name="product_variants([{{ $sizeid . '-' . $colorid }}][image])"> --}}
                                                    <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeid . '-' . $colorid }}][image]">

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                                <div class="col-md-8">

                                </div>

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

        {{-- /////////////////////////////////////////////////////// --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Galery</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <label for="galery_1" class="form-label">Galery 1</label>
                                        <input type="file" class="form-control" id="gallery_1" name="galleries[]">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <label for="galery_2" class="form-label">Galery 2</label>
                                        <input type="file" name="galleries[]" id="gallery_2" class="form-control">

                                    </div>
                                </div>

                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

        {{-- ////////////////////////////////////////////////////////////////// --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tag</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <label for="tag" class="form-label">Tag</label>
                                        <select class="form-control" id="tag" name="tag[]" multiple>
                                            @foreach ($tag as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
@endsection

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
