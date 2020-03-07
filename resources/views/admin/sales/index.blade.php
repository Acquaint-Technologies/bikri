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
        <h1>All Users</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">User Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $key => $sale)
                <tr>
                    <th scope="row">{{ $key += 1 }}</th>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->product->product_name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->product_cost }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
