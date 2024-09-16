@extends('admin.component.index')
@section('content')
    @include('admin.component.tableAdmin', ['columns_headers' => ['Record Id', 'Name'], 'columns' => ['id', 'name'], 'rows' => $categories])
@endsection

