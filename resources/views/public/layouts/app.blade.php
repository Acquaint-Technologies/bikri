@extends('public.public-master')

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $controllerInfo->pageTitle }}</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav>

        <div class="page-header">
            <div class="container">
                @include('public.messages.msg')
                <h1>{{ $controllerInfo->pageTitle }}</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">

            @yield('content')

        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
