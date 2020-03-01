@extends('public.public-master')

@section('body')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>

            </ol>
        </div><!-- End .container-fluid -->
    </nav>

    <div class="page-header">
        <div class="container">
            @if(Session::get('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
{{--            <h3 style="color: green" >{{Session::get('message')}}</h3>--}}
            <h1>Add New Product</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="heading">
                </div><!-- End .heading -->

                <form action="{{route('save-product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <select class="form-control" name="product_type">
                        <option value="">- Product Type -</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                    <input type="number" name="sale_price" class="form-control" placeholder="Sale Price" required>
                    <input type="number" name="product_cost" class="form-control" placeholder="Product Cost" >
                    <div class="form-footer">
                        <button type="submit" name="btn" class="btn btn-primary">Add Product</button>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
@endsection
