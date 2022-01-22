<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BookCategory;
use App\Book;

class BookController extends Controller
{
    public function category()
    {
        $cats = BookCategory::latest()->get();
        return view('admin.book.category', compact('cats'));
    }

    public function postCategory (Request $request)
    {
        BookCategory::create($request->all());
        return back()->with('success','Book Category Added');
    }

    public function books()
    {
        $books = Book::with('category')->latest()->get();
        $cats = BookCategory::get();
        return view('admin.book.books', compact('books','cats'));
    }

    public function postBook (Request $request)
    {
        $data = $request->all();
        
        if($request->hasFile('upload')){
            $fileName = $request->upload->getClientOriginalName();  
   
            $request->upload->move('books/', $fileName);

            $data['upload'] = $fileName;
        }
        Book::create($data);
        return back()->with('success','Book Added');
    }

    public function viewBook($id)
    {
        $book = Book::with('category')->findOrFail($id);
        $cats = BookCategory::get();

        return view('admin.book.view-book', compact('book','cats'));
    }

    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        $cats = BookCategory::get();
        return view('admin.book.edit-book', compact('book','cats'));
    }

    public function updateBook(Request $request,$id)
    {
        $data = $request->all();
        $book = Book::find($id);
        $book->update($data);
        return redirect('admin/books')->with('success','Book Updated');
    }

    public function deleteBook($id)
    {
        $book = Book::find($id)->delete();
        return redirect('admin/all-books')->with('success','Book Deleted');
    }
}
