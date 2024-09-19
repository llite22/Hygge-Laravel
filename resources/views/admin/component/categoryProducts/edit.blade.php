@extends('admin.component.index')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form class="simple-example col-lg-10"
                      action="{{route('admin-category-products.update', ['id' => $id])}}" method="POST" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="name">Имя категории</label>
                            <input value="{{$category_product->name}}" type="text" class="form-control" id="name" name="name"
                                   placeholder="Имя категории"
                                   required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please fill the name
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary submit-fn mt-2" type="submit">Обновить</button>
                        <a href="{{route('admin.category-products')}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

