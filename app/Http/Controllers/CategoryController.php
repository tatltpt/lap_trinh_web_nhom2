<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListBook(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url)) {
            $books = Book::where([
                'book_category_id' => $id,
                'book_active' => Book::STATUS_PUBLIC
            ]);


            $books = $books->simplePaginate(6);

            $cateBook = Category::find($id);

            $categories = Category::select('id','c_name','c_slug')->get();

            $viewData = [
                'books' => $books,
                'cateBook' => $cateBook,
                'categories' => $categories
            ];
            return view('book.index', $viewData);
        }
        if($request->k){
            $books = Book::where([
                'book_active' => Book::STATUS_PUBLIC
            ])->where('book_name','like','%'.$request->k.'%');
            $books = $books->paginate(6);
            $viewData = [
                'books' => $books
            ];
            return view('book.index', $viewData);
        }
        return redirect('/');
    }
}
