@extends('public.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav>

        <div class="page-header">
            <div class="container">
                <h1>Login to your Account</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading">

                        <p>If you have an account with us, please log in.</p>
                    </div><!-- End .heading -->

                    <form action="{{route('save-login')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="email" name="owner_email" class="form-control" placeholder="Email Address" required>
                        <input type="password" name="owner_password" class="form-control" placeholder="Password" required>
                        <h3 class="text-danger">{{Session::get('message')}}</h3>

                        <div class="form-footer">
                            <button type="submit" name="btn" class="btn btn-primary">LOGIN</button>
                            <a href="forgot-password.php" class="forget-pass"> Forgot your password?</a>
                        </div><!-- End .form-footer -->
                        Dont have a account yet! <a href="{{route('owner-register')}}" class="forget-pass"><strong> Register Now</strong></a>
                    </form>
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">

                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
