@extends('admin.component.index')
@section('content')
    @include('admin.component.feedback.component.table', ['columns_headers' => ['Record Id', 'name', 'email', 'phone', 'department', 'message'], 'columns' => ['id', 'name', 'email', 'phone', 'department', 'message'], 'rows' => $feedbacks])
@endsection
