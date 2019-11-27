<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $bookHot = Book::where([
            'book_hot'=> Book::HOT_ON,
            'book_active'=> Book::STATUS_PUBLIC
        ])->limit(5)->get();

        $viewData = [
            'bookHot' => $bookHot
        ];
        return view('home.index',$viewData);
    }
}
