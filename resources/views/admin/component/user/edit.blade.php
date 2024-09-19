@extends('admin.component.index')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form class="simple-example col-lg-10"
                      action="{{route('admin-users.update', ['id' => $id])}}" method="POST" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="name">Имя пользователя</label>
                            <input value="{{$user->name}}" type="text" class="form-control" id="name" name="name"
                                   placeholder="Имя пользователя"
                                   required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please fill the name
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="select_menu1" class="form-group mb-4">
                                <select name="is_admin" class="custom-select" required>
                                    <option value="">Open this select menu</option>
                                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>лох
                                    </option>
                                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Администратор</option>
                                </select>
                                <div class="valid-feedback">Example valid custom select feedback</div>
                                <div class="invalid-feedback">
                                    Please Select the field
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary submit-fn mt-2" type="submit">Обновить</button>
                        <a href="{{route('admin.users')}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

