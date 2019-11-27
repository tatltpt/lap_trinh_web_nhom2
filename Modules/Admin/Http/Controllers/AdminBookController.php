<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestBook;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminBookController extends Controller
{

    public function index(Request $request)
    {
        $books = Book::with('category:id,c_name','author:id,name');
        if($request->name) $books->where('book_name','like','%'.$request->name.'%');
        if($request->cate) $books->where('book_category_id',$request->cate);
        if($request->author) $books->where('book_author_id',$request->author);
        $books = $books->orderByDesc('id')->paginate(20);
        $categories = $this->getCategories();
        $authors = $this->getAuthors();
        $viewData = [
            'books'=>$books,
            'categories'=>$categories,
            'authors'=>$authors
        ];
        return view('admin::book.index',$viewData);
    }


    public function create()
    {
        $categories = $this->getCategories();
        $authors = $this->getAuthors();
        return view('admin::book.create',compact('categories','authors'));
    }


    public function store(RequestBook $requestBook)
    {
        $this->insertOrUpdate($requestBook);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = $this->getCategories();
        $authors = $this->getAuthors();
        return view('admin::book.update',compact('book','categories','authors'));
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
    public function getAuthors()
    {
        return Author::all();
    }
    public function insertOrUpdate($requestBook, $id = '')
    {
        $book = new Book();
        if ($id) $book = Book::find($id);
        $book->book_name = $requestBook->book_name;
        $book->book_slug = str_slug($requestBook->book_name);
        $book->book_category_id = $requestBook->book_category_id;
        $book->book_description = $requestBook->book_description;
        $book->book_content = $requestBook->book_content;
        $book->book_price = $requestBook->book_price;
        $book->book_author_id = $requestBook->book_author_id;
        $book->book_number = $requestBook->book_number;
        if ($requestBook->hasFile('avatar')){
            $file = upload_image('avatar');
            if(isset($file['name'])){
                $book->book_avatar = $file['name'];
            }
        }
        $book ->save();

    }
    public function action(Request $request,$action,$id)
    {
        if($action)
        {
            $book = Book::find($id);
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
