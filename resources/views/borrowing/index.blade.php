@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Hình ảnh</th>
                    <th>Thể loại</th>
                    <th>Tác giả</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($books as $key=>$book)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href=""> {{$book->name}}</a></td>
                        <td><img  src="{{ pare_url_file($book->options->avatar) }}" alt=""  style="width: 80px;height: 80px;" ></td>
                        <td>{{$book->options->cate}}</td>
                        <td>{{$book->options->author}}</td>
                        <td>{{$book->qty}}</td>
                        <td>
                            <a href="{{route('delete.borrowing.cart',$key)}}" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php $i ++ ?>
                @endforeach
                </tbody>
            </table>
            <h4 class="pull-right"><a href="{{route('get.form.confirm')}}" class="btn-success btn">Xác nhận</a></h4>
        </div>
    </div>
@stop
