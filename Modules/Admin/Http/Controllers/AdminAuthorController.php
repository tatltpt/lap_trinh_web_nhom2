<?php

namespace Modules\Admin\Http\Controllers;


use App\Models\Author;
use App\Http\Requests\RequestAuthor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class AdminAuthorController extends Controller
{

    public function index()
    {
        $authors = Author::select('id','name')->get();
        $viewData = [
            'authors' => $authors
        ];
        return view('admin::author.index',$viewData);
    }

    public function create()
    {
        return view('admin::author.create');
    }

    public function store(RequestAuthor $requestAuthor)
    {
        $this->insertOrUpdate($requestAuthor);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id){
        $author = Author::find($id);
        return view('admin::author.update', compact('author'));
    }
    public function update(RequestAuthor $requestAuthor,$id)
    {
        $this->insertOrUpdate($requestAuthor,$id);
        return redirect()->back()->with('success','Cập nhật dữ diệu thành công.');
    }
    public function insertOrUpdate($requestAuthor, $id = '')
    {
            $author = new Author();
            if ($id)
            {
                $author = Author::find($id);
            }
            $author->name = $requestAuthor->name;
            $author ->save();
    }
    public function action($action,$id)
    {
        if($action)
        {
            $messages = '';
            $author = Author::find($id);
            switch ($action)
            {
                case 'delete':
                    $author->delete();

                    break;
                case 'active':
                    break;
            }
            $author->save();
        }
        return redirect()->back()->with('success','Thao tác thành công');
    }

}
