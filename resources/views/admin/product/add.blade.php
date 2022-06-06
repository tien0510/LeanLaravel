@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div class="card card-warning">

    <div class="card-body">
        <form action="" method="POST"  >
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" class="form-control" placeholder="Nhập Tên Sản Phẩm ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select name="" class="form-control" id="">
                            @foreach($menus as $menu){
                            <option type="text"  >{{$menu->name}}</option>}
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá Gốc</label>
                        <input class="form-control"  type="number">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá Giảm</label>
                        <input class="form-control"   type="number">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea id="content" name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Ảnh Sản Phẩm</label>
                <input type="file" name="file" class="form-control" id="upload" >
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group"><label for="">Trạng Thái Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
            </div>
            @csrf
        </form>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
