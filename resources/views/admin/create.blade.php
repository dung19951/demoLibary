@extends('master')
@section('title', 'Thêm mới book')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Thêm mới book</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title"  >
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" name="author"  >
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="des"  >
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10 ">

                                    <div class="form-check mt-2">
                                        <select name="category" id="">
                                            @foreach($category as $key)
                                            <option value="{{$key->id}}">{{$key->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
