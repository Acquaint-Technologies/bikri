@extends('admin.admin-master')

@section('body')
    <div class="container-fluid">

        @if(Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1>View Product</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Owner Id</th>
                <th scope="col">Product Name</th>

                <th scope="col">Sale Price (BDT)</th>
                <th scope="col">Product Cost (BDT)</th>
{{--                <th scope="col">Action</th>--}}
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$product->user->name}}</td>
                    <td>{{$product->product_name}}</td>

{{--                    <td><img src="{{asset($product->main_image)}}" alt="" class="img-fluid img-thumbnail" width="100px" ></td>--}}
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->product_cost}}</td>
{{--                    <td><!-- Button trigger modal -->--}}
{{--                        <a href="" type="button" class="btn btn-info" data-toggle="modal" data-target="#view{{$product->id}}">--}}
{{--                            <i class="fas fa-search-plus"></i>--}}
{{--                        </a>--}}

{{--                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$product->id}}">--}}
{{--                            <i class="fas fa-edit"></i>--}}
{{--                        </a>--}}

{{--                        <a href="{{route('delete-brand',['id'=>$product->id])}}" type="button" class="btn btn-danger">--}}
{{--                            <i class="fas fa-trash"></i>--}}
{{--                        </a>--}}

{{--                        <!-- Modal -->--}}
{{--                    </td>--}}
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>



@endsection


