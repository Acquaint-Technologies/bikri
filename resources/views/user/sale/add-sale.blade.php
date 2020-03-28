@extends('user.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Sales</li>
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
{{--                <h3 style="color: green" >{{Session::get('message')}}</h3>--}}
                <h1>Add New Sale</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="heading">
                    </div><!-- End .heading -->

                    <form action="{{route('save-sale')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control" name="product_name" id="product" >
                            <option value="">- Select Product -</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>

                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="1" id="qty" data-dependent="price">

                        <input type="number" class="form-control" name="sales_total" value="$mul" placeholder="Total sales cost" id="price">

{{--                        <select class="form-control" name="product_cost" id="product">--}}
{{--                            <option value="">- Sales Total Price -</option>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <option value="{{$product->sales_total}}">{{$product->sale_price}} ({{$product->product_name}})</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}

                        <div class="form-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Add Sale</button>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.dynamic').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('dynamicdependent.fetch') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }

                    })
                }
            });

            $('#qty').change(function(){
                $('#price').val('');
            });
            {{--$(function () {--}}
            {{--    $p =$('select[name="product_name"]');--}}
            {{--    $s =$('select[name="quantity"]');--}}
            {{--    $e =$('select[name="product_cost"]');--}}

            {{--    $('#qty').change(function() {--}}
            {{--        var qty = $(this).val();--}}
            {{--        // console.log(qty);--}}

            {{--        $.get('{{url('/multiply?quantity=')}}'+qty)--}}
            {{--            .success(function (data) {--}}
            {{--                var d = '<option value="">--select--</option>';--}}

            {{--                // data.forEach(function (row) {--}}
            {{--                //     d += '<option value="+row.id+">'+row.name+'</option>'--}}
            {{--                // })--}}
            {{--            e.html(d);--}}
            {{--            })--}}
            {{--    });--}}
            {{--});--}}

            //
            // $('#qty').change(function(){
            //     var qty=$(this).val();
            //     var price=qty*25;
            //     $('#price').val(price);
            // });


            // $('#product').change(function(){
            //     $('#qty').val('');
            //     $('#price').val('');
            // });

        });
    </script>


@endsection
