@extends('admin.admin-master')

@section('page_title', 'Dashboard')

@section('body')
    <div class="container-fluid">
        <h1>Dashboard</h1>
        <p>Welcome to my admin panel</p>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>
@endpush
