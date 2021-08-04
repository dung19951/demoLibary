@extends('master')
@section('title', 'Quản lí sách')
@section('content')
    <h1 class="mt-4">Books Manager</h1>
    <ol class="breadcrumb mb-4">
        <form method="get" action="{{route('admin.create')}}">
            <button type="submit">Add Books</button>
        </form>
    </ol>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>

                    <th scope="col">Price</th>
                    <th scope="col">Des</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($books) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($books as $key => $book)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $book->title }}</td>
                            <td>
                                @if($book->image)
                                    <img src="{{ asset('storage/'.$book->image) }}" alt=""
                                         style="width: 150px; height: 150px">
                                @else
                                    <img src="public/storage/imgs/p9fO19BK4hqqtZO2dVDDOEHPdGTjxS58HbsHDFTH.png" alt=""
                                         style="width: 150px; height: 150px">
                                @endif
                            </td>
                            <td> @forelse($book->categories() as $category){{$category->id}} @empty @endforelse
                            </td>
                            <td>{{ $book->author_id }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->des }}</td>
                            <td><a href="{{route('admin.edit',$book->id)}}">sửa</a></td>
                            <td><a href="{{route('admin.delete',$book->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
