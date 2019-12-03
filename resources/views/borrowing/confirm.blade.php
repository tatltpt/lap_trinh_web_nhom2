@extends('layouts.app')
@section('content')
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
                            <li class="home">
                                <a href="/">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Xác nhận</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                    <p></p>
                </div>

                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>

        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sách <div class="pull-right"><small><a class="afix-1" href="{{route('get.list.borrowing.cart')}}">Cập nhật</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach($books as $book)

                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive" style="width: 100px;height: 70px" src="{{ pare_url_file($book->options->avatar) }}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{$book->name}}</div>
                                        <div class="col-xs-12"><small>Thể loại: {{$book->options->cate}}</small></div>
                                        <div class="col-xs-12"><small>Tác giả: {{$book->options->author}}</small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>Số lượng:<span>{{$book->qty}}</span></h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                            @endforeach
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Xác nhận thông tin</div>
                        <div class="panel-body">

                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control" value="{{get_data_user('web','email')}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                    </div>
            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@stop
