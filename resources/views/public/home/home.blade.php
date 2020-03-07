@extends('public.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav>

        <div class="page-header">
            <div class="container">

            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <div class="row">

                <!--add new sale condition-->
                <div class="col-md-4">
                    <a href="{{route('add-sale')}}">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1>Add New Sales</h1>
                                <p class="lead">Horrey! New Sale in</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!--add new product condition-->
                <div class="col-md-4">
                    <a href="{{route('add-product')}}">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1>Add New Product</h1>
                                <p class="lead">Add product to your list</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!--view sales condition-->
                <div class="col-md-4">
                    <a href="{{route('view-sale')}}">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1>Sales List</h1>
                                <p class="lead">Total 30 sales created</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!--view product list condition-->
                <div class="col-md-4">
                    <a href="{{route('view-product')}}">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1>Product List</h1>
                                <p class="lead">Total 20 products available</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="page-header">
                <div class="container">
                    <h1>Latest Sales</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <table class="table table-step-shipping">
                <tbody>
                <tr>
                    <td><strong>Product Name</strong></td>
                    <td><strong>Quantity</strong></td>
                    <td><strong>Product Cost</strong></td>
                </tr>

                @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->product_name}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->product_cost}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="mb-5"></div><!-- margin -->
    </main>
@endsection
