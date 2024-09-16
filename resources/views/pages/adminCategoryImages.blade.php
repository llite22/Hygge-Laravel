@extends('admin.component.index')
@section('content')
    @include('admin.component.tableAdmin', ['columns_headers' => ['Record Id', 'name', 'iMAGE'], 'columns' => ['id', 'category_id', 'image'], 'rows' => $category_images])
@endsection

