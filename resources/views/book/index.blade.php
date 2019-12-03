@extends('layouts.app')
@section('content')
    <style>
        .sidebar-content .active
        {
            color: #c2a476;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            @if (isset($cateBook->c_name))
                            <li class="category3"><span>{{$cateBook->c_name}}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        @if (isset($cateBook->c_name))
                        <div class="panel-heading">{{$cateBook->c_name}}</div>
                        @endif
                        <div class="panel-body">
                            @if(isset($books))
                                @foreach($books as $book)
                            <div class="col-xs-6 col-md-3 col-sm-3 ebook">
                                <a href="{{route('get.detail.book',[$book->book_slug,$book->id])}}" class="thumbnail"> <img src="{{asset(pare_url_file($book->book_avatar))}}" alt=""> </a>
                                <h5 class="tieude text-center"><a href="{{route('get.detail.book',[$book->book_slug,$book->id])}}"></a>{{$book->book_name}}</h5>
                            </div>
                                @endforeach
                                {!! $books->links() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 sidebar">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Danh Ngôn Hay </div>
                        <div class="panel-body">
                            Đừng so sánh mình với bất cứ ai trong thế giới này. Nếu bạn làm như vậy có nghĩa bạn đang sỉ nhục chính bản thân mình. <br><br>
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
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg1-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="/img/brand/bg1-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg5-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(function() {
            $('.orderby').change(function() {
                $("#form_order").submit();

            })
        })
    </script>
@stop
