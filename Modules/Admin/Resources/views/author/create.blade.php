@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.author') }}" title="Tác giả">Tác giả</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </div>

    <div class="">
        @include("admin::author.form")
    </div>

@stop
