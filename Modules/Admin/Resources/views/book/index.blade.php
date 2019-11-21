@extends('admin::layouts.master')
@section('content')
    <style>
        .rating .active { color: #ff9705 !important}
    </style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="#">Sách</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Tên sách ..." name="name" value="{{\Request::get('name')}}">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control">
                        <option value="" >Thể loại</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : ""}}>{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <div class="form-group">
                    <select name="author" id="" class="form-control">
                        <option value="" >Tác giả</option>
                        @if(isset($authors))
                            @foreach($authors as $author)
                                <option value="{{$author->id}}" {{ \Request::get('author') == $author->id ? "selected='selected'" : ""}}>{{$author->name}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý sách<a href="{{ route('admin.get.create.book')}}" class='pull-right'><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Loại sách</th>
                <th>Tác giả</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if ( isset($books))
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td style="width: 368px">
                            {{$book->book_name}}
                            <ul style="padding-left: 16px;">
                                <li><span><i class="fas fa-dollar-sign"></i></span><span> {{number_format($book->book_price,0,',','.')}}đ</span></li>
                                <li><span>Số lượng :</span><sapn>{{$book->book_number}}</sapn></li>
                            </ul>
                        </td>
                        <td>{{isset($book->category->c_name) ? $book->category->c_name : '[N\A]'}}</td>
                        <td>{{isset($book->author->name) ? $book->author->name : '[N\A]'}}</td>
                        <td>
                            <a href="{{route('admin.get.action.book',['active',$book->id])}}" class="label {{$book->getStatus($book->book_active)['class']}}">{{$book->getStatus($book->book_active)['name']}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.book',['hot',$book->id])}}" class="label {{$book->getHot($book->book_hot)['class']}}">{{$book->getHot($book->book_hot)['name']}}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.edit.book',$book->id)}}"><i class="fas fa-pencil-alt" style="font-size: 11px"></i> Cập nhật</a>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.book',['delete',$book->id])}}"><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
