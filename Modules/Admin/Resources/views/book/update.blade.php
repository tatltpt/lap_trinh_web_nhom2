@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.book') }}" title="Sách">Sách</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </div>

    <div class="">
        @include("admin::book.form")
    </div>


@stop
