@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row thong_tin_ebook">
                        <div class="col-md-4 cover"> <img src="{{asset(pare_url_file($bookDetail->book_avatar))}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> </div>
                        <div class="col-md-8">
                            <a href="">
                                <h1 class="ebook_title text-primary">{{$bookDetail->book_name}}</h1>
                            </a><br>
                            <h5 class="">Tác giả : {{$bookDetail->author->name}}</h5><br>
                            <h5 class="">Thể Loại : <a href="">{{$bookDetail->category->c_name}}</a></h5><br>
                            <br>

                            <h4 class="pull-left"><a href="{{route('add.borrowing.cart',$bookDetail->id)}}" class="btn-primary btn">Mượn sách</a></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="gioi_thieu_sach text-justify">
                        <p>{{$bookDetail->book_description}}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 sidebar">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh Ngôn Hay </div>
                <div class="panel-body">
                    Ai có thể cai trị được một người đàn bà thì người ấy có thể cai trị được một nước. <br><br>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Thể Loại Sách</div>
                @if(isset($categories))
                <ul id="sidebar" class="nav nav-pills nav-stacked">
                    @foreach($categories as $cate)
                    <li><a href="{{route('get.list.book',[$cate->c_slug,$cate->id])}}"><span class="glyphicon glyphicon-record"> </span> {{$cate->c_name}}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
@stop
