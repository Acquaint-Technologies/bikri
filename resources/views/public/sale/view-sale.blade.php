@extends('public.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales List</li>
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
                <h1>Sales List</h1>
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
                            <th>Quantity</th>
                            <th>Product Cost (BDT)</th>
                            <th style="width:25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($sales as $sale)
                            <tr>
                                <td style="width:30%">{{$sale->product_name}}</td>
                                {{--                        <td style="width:10%">{{$product->product_type}}</td>--}}
                                <td style="width:10%">{{$sale->quantity}}</td>
                                <td style="width:10%">{{$sale->product_cost}}</td>
                                <td align="center" >
                                    <button type="button" class="btn btn-secondary" style="border-radius: 12px; display: inline-flex; padding: 15px " data-toggle="modal" data-target="#edit{{$sale->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a  onclick="return confirm('Are you really want to delete it?')" href="{{route('delete-sale',['id'=>$sale->id])}}" type="button" class="btn btn-danger" style="border-radius: 12px; display: inline-flex; padding: 15px">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>



                            <!-----Modal-------->

                            <div class="modal fade" id="edit{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Sale List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update-sale')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" value="{{$sale->product_name}}">
                                                    <input type="hidden" class="form-control" name="id" value="{{$sale->id}}">
                                                </div>


                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <textarea class="form-control" name="quantity">{{$sale->quantity}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Product Cost</label>
                                                    <textarea class="form-control" name="product_cost">{{$sale->product_cost}}</textarea>
                                                </div>


                                                <input type="submit" name="btn" class="btn btn-primary" value="update">
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

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
