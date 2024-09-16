@extends('admin.component.index')
@section('content')
    @include('admin.component.tableAdmin', ['columns_headers' => ['Record Id', 'name', 'image'], 'columns' => ['id', 'name', 'image'], 'rows' => $category_images])
@endsection

