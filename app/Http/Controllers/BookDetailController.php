<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookDetailController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function bookDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url))
        {
            $bookDetail = Book::where('book_active',Book::STATUS_PUBLIC)->find($id);
            $cateBook = Category::find($bookDetail->book_category_id);


            $viewData = [
                'bookDetail' => $bookDetail,
                'cateBook' => $cateBook
            ];
            return view('book.detail',$viewData);
        }
    }
}
