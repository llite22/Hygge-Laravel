@extends('admin.component.index')
@section('content')
    @include('admin.component.tableAdmin', ['columns_headers' => ['Record Id', 'Image', 'Text'], 'columns' => ['id', 'image', 'text'], 'rows' => $sliders])
@endsection

