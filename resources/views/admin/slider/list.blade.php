@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px" {{$stt = 0}}>STT</th>
            <th>Name</th>
            <th>URL</th>
            <th>Thumb</th>
            <th>Sort_by</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 120px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sliders as $key => $slider)

            <tr>
                <td>{{ $stt +=1}}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->url }}</td>
                <td>
                    <img src="{{$slider->thumb}}"   height="115px" width="100px">
                </td>
                <td>{{ $slider->sort_by }}</td>
                <td>{!!   App\Helpers\Helper::active($slider->active)!!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href=""
                       onclick="removeRow({{ $slider->id }},'/admin/sliders/destroy')"><i class="fas fa-calendar-minus"></i></a>
                </td>
            </tr>

        @endforeach


        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection
