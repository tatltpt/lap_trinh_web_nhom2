@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="">Tác giả</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>

    <div class="table-responsive">
        <h2>Quản lý tác giả<a href="{{ route('admin.get.create.author')}}" class='pull-right'><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên tác giả</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if ( isset($authors))
                @foreach($authors as $idx=>$author)
                    <tr>
                        <td>{{$idx+1}}</td>
                        <td>{{$author->name}}</td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.edit.author',$author->id)}}"><i class="fas fa-pencil-alt" style="font-size: 11px"></i> Cập nhật</a>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.author',['delete',$author->id])}}"><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
