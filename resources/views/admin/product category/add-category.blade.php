@extends('admin.admin-master')

@section('body')
    <div class="container-fluid">
        <h3 style="color: blue">{{Session::get('message')}}</h3>
        <h1>Product Category</h1>
        <form action="{{route('save-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label >Product Category Name</label>
                <input type="text" class="form-control" name="category_name" id="categoryname">
            </div>

            <div class="form-group">
                <label >Description</label>
                <input type="text" class="form-control" name="category_desc" id="categorydesc">
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
