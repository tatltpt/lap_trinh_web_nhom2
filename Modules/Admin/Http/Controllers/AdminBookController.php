<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestBook;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminBookController extends Controller
{

    public function index(Request $request)
    {
        $books = book::with('category:id,c_name');
        if($request->name) $books->where('book_name','like','%'.$request->name.'%');
        if($request->cate) $books->where('book_category_id',$request->cate);

        $books = $books->orderByDesc('id')->paginate(20);
        $categories = $this->getCategories();

        $viewData = [
            'books'=>$books,
            'categories'=>$categories
        ];
        return view('admin::book.index',$viewData);
    }


    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::book.create',compact('categories'));
    }


    public function store(RequestBook $requestBook)
    {
        $this->insertOrUpdate($requestBook);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $book = book::find($id);
        $categories = $this->getCategories();
        return view('admin::book.update',compact('book','categories'));
    }
    public function update(RequestBook $requestBook,$id)
    {
        $this->insertOrUpdate($requestBook,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function getCategories()
    {
        return Category::all();
    }
    public function insertOrUpdate($requestBook, $id = '')
    {
        $book = new Book();
        if ($id) $book = book::find($id);
        $book->book_name = $requestBook->book_name;
        $book->book_slug = str_slug($requestBook->book_name);
        $book->book_category_id = $requestBook->book_category_id;
        $book->book_price = $requestBook->book_price;
        $book->book_author_id = $requestBook->book_author_id;
        $book->book_number = $requestBook->book_number;
        $book ->save();

    }
    public function action(Request $request,$action,$id)
    {
        if($action)
        {
            $book = book::find($id);
            switch($action)
            {
                case 'delete':
                    $book->delete();
                    break;
                case 'active':
                    $book->book_active = $book->book_active ? 0 : 1;
                    break;
                case 'hot':
                    $book->book_hot = $book->book_hot ? 0 : 1;
                    break;
            }
            $book->save();
        }
        return redirect()->back();
    }
}
