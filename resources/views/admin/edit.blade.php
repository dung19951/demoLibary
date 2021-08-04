@extends('master')
@section('title', 'Chỉnh sửa book')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Edit</h1></div>
            <div class="col-12">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$book->title}}"  required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="des" value="{{$book->des}}"  required>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$book->price}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control"  value="{{$book->image}}" name="image" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
