@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px" {{$stt = 0}}>STT</th>
            <th>Name</th>
            <th>Thumbnail</th>
            <th>Category</th>
            <th>Price</th>
            <th>Price_sale</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 120px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

      @foreach($products as $key => $product)

            <tr>
                <td>{{ $stt +=1}}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{$product->thumb}}"   height="115px" width="100px">
                </td>
                <td>{{ $product->menu->name }}</td>
                <td>{{ $product->price }} VNĐ</td>
                <td>{{ $product->price_sale }} VNĐ</td>
                <td>{!!   App\Helpers\Helper::active($product->active)!!}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href=""
                onclick="removeRow({{ $product->id }},'/admin/products/destroy')"><i class="fas fa-calendar-minus"></i></a>
                </td>
            </tr>

      @endforeach


        </tbody>
    </table>
    <div class ="card-footer clearfix>
{!! $products->links() !!}


    </div>
@endsection
