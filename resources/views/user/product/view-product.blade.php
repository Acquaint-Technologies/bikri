@extends('user.public-master')

@section('body')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
            <h1>Product List</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="heading">
                </div><!-- End .heading -->

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr align="center">
                        <th style="width:20%">Product Name</th>
{{--                        <th style="width:20%">Product Type</th>--}}
                        <th >Sale Price (BDT)</th>
                        <th >Product Cost (BDT)</th>
                        <th style="width:25%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($products as $product)
                    <tr>
                        <td style="width:30%">{{$product->product_name}}</td>
{{--                        <td style="width:10%">{{$product->product_type}}</td>--}}
                        <td style="width:10%">{{$product->sale_price}}</td>
                        <td style="width:10%">{{$product->product_cost}}</td>
                        <td align="center" >
                            <button type="button" class="btn btn-secondary" style="border-radius: 12px; display: inline-flex; padding: 15px " data-toggle="modal" data-target="#edit{{$product->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a  onclick="return confirm('Are you really want to delete it?')" href="{{route('delete-product',['id'=>$product->id])}}" type="button" class="btn btn-danger" style="border-radius: 12px; display: inline-flex; padding: 15px">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>



<!-----Modal-------->

                    <div class="modal fade"  id="edit{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel" >Update Product List</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('update-product')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                                            <input type="hidden" class="form-control" name="id" value="{{$product->id}}">
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label>Product Type</label>--}}
{{--                                            <textarea class="form-control" name="product_type">{{$product->product_type}}</textarea>--}}
{{--                                        </div>--}}

                                        <div class="form-group">
                                            <label>Sale Price</label>
                                            <input class="form-control" name="sale_price" value="{{$product->sale_price}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Product Cost</label>
                                            <input class="form-control" name="product_cost" value="{{$product->product_cost}}">
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label>Image</label>--}}
{{--                                            <h5>Previous Image</h5>--}}
{{--                                            <img src="{{asset($product category->cat_image)}}" alt="" width="200px" height="200px" >--}}
{{--                                            <br><br>--}}
{{--                                            <input type="file" class="form-control-file" name="cat_image">--}}
{{--                                        </div>--}}
                                        <input type="submit" name="btn" class="btn btn-primary btn-sm" value="update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </tbody>
                </table>

            </div><!-- End .col-md-6 -->

        </div><!-- End .row -->

    </div><!-- End .container -->

    <div class="mb-5"></div>
{{--    <script>$(document).ready(function() {--}}
{{--            $('#example').DataTable( {--}}
{{--                columnDefs: [ {--}}
{{--                    targets: [ 0 ],--}}
{{--                    orderData: [ 0, 1 ],--}}
{{--                }, {--}}
{{--                    targets: [ 1 ],--}}
{{--                    orderData: [ 1, 0 ]--}}
{{--                }, {--}}
{{--                    targets: [ 4 ],--}}
{{--                    orderData: [ 4, 0 ]--}}
{{--                } ]--}}
{{--            } );--}}
{{--        } );--}}
{{--    </script>--}}

    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>


    <!-- margin -->
</main><!-- End .main -->

@endsection
