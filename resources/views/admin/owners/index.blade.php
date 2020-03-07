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
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <th scope="row">{{ $key += 1 }}</th>
                    <td>{{$product->user->name}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->product_cost}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
