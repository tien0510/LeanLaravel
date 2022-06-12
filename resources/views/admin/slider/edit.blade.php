@extends('admin.main')

@section('head')

@endsection
@section('content')
    <div class="card card-warning">
{{--{{dd($sliders)}}--}}
        <div class="card-body">
            <form action="" method="POST"  >
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" id="name" class="form-control" value="{{ $sliders->name }}" name="name" >
                            {{--                        <input type="file" name="file" class="form-control" id="upload" >--}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Đường Dẫn</label>
                            <input class="form-control" name="url" value="{{$sliders->url }}"  type="text">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Sắp Xếp</label>
                            <input class="form-control" name="sort_by" value="{{$sliders->sort_by }}"   type="number">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputFile">Ảnh Sản Phẩm</label>
                    <input type="file" name="file" class="form-control" id="upload" >
                    <br>
                    <div id="image_show">
                        <a href="{{$sliders->thumb}}"target="_blank"> <img src="{{$sliders->thumb}}"   width="100px"></a>
                    </div>

                    <input type="hidden" value="{{$sliders->thumb}}" name="thumb" id="thumb">
                </div>

                <div class="form-group"><label for="">Trạng Thái Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                            {{$sliders->active == 1 ? 'checked = ""':''}}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                            {{$sliders->active == 0 ? 'checked = ""':''}}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật Slider</button>
                </div>
                @csrf
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('footer')
@endsection
