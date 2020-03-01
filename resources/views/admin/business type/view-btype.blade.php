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
        <h1>View Business Type</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Business Types</th>
                <th scope="col">Description of the Business</th>
                <th scope="col">Publication Status</th>
                <th scope="col">Action</th>
                {{--                <th scope="col">Action</th>--}}
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($btypes as $btype)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$btype->business_name}}</td>
                    <td>{{$btype->business_desc}}</td>
                    <td>{{$btype->status==1?'Published':'Unpublished'}}</td>
                    <td> @if($btype->status==1)
                            <a href="{{route('published-btype',['id'=>$btype->id])}}" type="button" class="btn btn-info">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                        @else
                            <a href="{{route('unpublished-btype',['id'=>$btype->id])}}" type="button" class="btn btn-warning">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$btype->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <a href="{{route('delete-btype',['id'=>$btype->id])}}" type="button" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <!-----Modal-------->

                <div class="modal fade" id="edit{{$btype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Business Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('update-btype')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Business Type</label>
                                        <input type="text" class="form-control" name="business_name" value="{{$btype->business_name}}">
                                        <input type="hidden" class="form-control" name="id" value="{{$btype->id}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="business_desc">{{$btype->business_desc}}</textarea>
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

