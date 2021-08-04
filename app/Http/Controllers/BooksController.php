<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books=Books::all();
//        Books::with('categories')->get();
        return view('admin.list',compact('books',));
    }

    public function create()
    {
        $category=Category::all();
        return view('admin.create',compact('category'));
    }

    public function store(BookRequest $request)
    {
        $book=new Books();
        $category=new Category();
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $path=$image->store('imgs','public');
            $book->image=$path;
        }
        $book->title=$request->input('title');
        $book->author_id=$request->input('author');
        $book->des=$request->input('des');
        $book->price=$request->input('price');
        $book->categories()->associate($request->input('category'));
        $book->save();
        return redirect()->route('admin.home');
    }

    public function edit($id)
    {
        $book=Books::findOrFail($id);
        return view('admin.edit',compact('book'));
    }

    public function update(BookRequest $request,$id)
    {
        $book=Books::findOrFail($id);
        $book->title=$request->input('title');
        $book->des=$request->input('des');
        $book->price=$request->input('price');
        $book->image=$request->input('image');
        $book->save();
        $book->categories()->associate($request->input('category'));
        return redirect()->route('admin.home');

    }

    public function delete($id)
    {
        $book = Books::findOrFail($id);
        $book->categories()->dissociate();
        $book->delete();
        return redirect()->route('admin.home');
    }
}
