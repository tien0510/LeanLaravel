@extends('admin.main')

@section('head')

@endsection
@section('content')
    <div class="card card-warning">

        <div class="card-body">
            <form action="" method="POST"  >
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" id="name" class="form-control" value="{{ old('name') }}" name="name" >
                            {{--                        <input type="file" name="file" class="form-control" id="upload" >--}}
                            <br>
                            <div id="name_show">

                            </div>
                            <input type="hidden" name="slug" id="slug">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Đường Dẫn</label>
                            <input class="form-control" name="url" value="{{ old('url') }}"  type="text">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Sắp Xếp</label>
                            <input class="form-control" name="sort_by" value="1"   type="number">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputFile">Ảnh Sản Phẩm</label>
                    <input type="file" name="file" class="form-control" id="upload" >
                    <br>
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
                    <button type="submit" class="btn btn-primary">Tạo Slider</button>
                </div>
                @csrf
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('footer')
@endsection
