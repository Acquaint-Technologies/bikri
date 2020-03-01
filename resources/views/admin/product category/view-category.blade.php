@extends('admin.admin-master')

@section('body')
    <div class="container-fluid">

        @if(Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1>View Product Category</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Product Category Name</th>
                <th scope="col" style="width:20%; align-items: center">Description</th>
                <th scope="col">business Id & Name </th>
                <th scope="col">Publication Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->category_desc}}</td>
                    <td style="align-content: center">{{$category->cat_btype_id}} ({{$category->business_type}})</td>
                    <td>{{$category->status==1?'Published':'Unpublished'}}</td>
                    <td> @if($category->status==1)
                            <a href="{{route('published-category',['id'=>$category->id])}}" type="button" class="btn btn-info">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                        @else
                            <a href="{{route('unpublished-category',['id'=>$category->id])}}" type="button" class="btn btn-warning">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$category->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <a href="{{route('delete-category',['id'=>$category->id])}}" type="button" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <!-----Modal-------->

                <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Public Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('update-category')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Business Type (Id)</label>
                                        <input type="number" class="form-control" name="cat_btype_id" value="{{$category->cat_btype_id}}">

                                    </div>

                                    <div class="form-group">
                                        <label>Business Type (Name)</label>
                                        <input type="text" class="form-control" name="business_type" value="{{$category->business_type}}">

                                    </div>

                                    <div class="form-group">
                                        <label>Product Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                        <input type="hidden" class="form-control" name="id" value="{{$category->id}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="category_desc">{{$category->category_desc}}</textarea>
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
    </div>
@endsection
