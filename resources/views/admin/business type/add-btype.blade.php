@extends('admin.admin-master')

@section('body')
    <div class="container-fluid">
        <h3 style="color: blue">{{Session::get('message')}}</h3>
        <h1>Business Type</h1>
        <form action="{{route('save-btype')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categoryname">Business Name</label>
{{--                <input type="text" class="form-control" name="business_name" id="btypename">--}}
                <select name="business_name" class="form-control">
                    <option value="">- Business Type -</option>
                    <option value="Clothes">Clothing</option>
                    <option value="Food">Food</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Plastics">Plastics goods</option>
                    <option value="Bags">Bags</option>
                </select>

            </div>
            <div class="form-group">
                <label for="categorydesc">Business Description</label>
                <textarea class="form-control" name="business_desc" id="btypedesc"></textarea>

            </div>

            <div class="form-group">
                <label for="status">Publication Status</label>
                <div class="radio">
                    <input type="radio" name="status" value="1">Published
                    <input type="radio" name="status" value="0">Unpublished
                </div>
            </div>
            <input type="submit" name="btn" class="btn btn-primary">
        </form>

    </div>
@endsection
