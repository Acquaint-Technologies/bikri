@extends('user.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registration</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav>

        <div class="page-header">
            <div class="container">
                <h1>Create Account</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="heading">

                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    </div><!-- End .heading -->

                    <form action="{{route('save-register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <select name="business_type" class="form-control">
                            <option value="">- Business Type -</option>
                            <option value="15">Clothing</option>
                            <option value="16">Food</option>
                            <option value="17">Electronics</option>
                            <option value="18">Furniture</option>
                            <option value="19">Plastics goods</option>
                            <option value="27">Bags</option>
                        </select>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>

                        <input type="number" name="owner_phone" class="form-control" placeholder="Phone Number" required>
                        <input type="email" name="owner_email" class="form-control" placeholder="Email Address" required>
                        <input type="password"  name="owner_password" class="form-control" placeholder="Password" required>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required >
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">*{{ $error }}</p>
                        @endforeach
{{--                        <small class="text-danger">{{Session::get('message')}}</small>--}}
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
