@extends('admin.component.index')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form class="simple-example col-lg-10"
                      action="{{route('admin-products.update', $product->id)}}" method="POST" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="select_menu" class="form-group mb-4">
                                <select name="category_id" class="custom-select" required>
                                    <option value="">Open this select menu</option>
                                    @foreach($category_products as $category)
                                        <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Example valid custom select feedback</div>
                                <div class="invalid-feedback">
                                    Please Select the field
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="name">Имя продукта</label>
                            <input value="{{$product->name}}" type="text" class="form-control" id="name" name="name"
                                   placeholder="Имя продукта"
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
                        <div class="col-md-12 mb-4">
                            <label for="description">Описание продукта</label>
                            <input value="{{$product->description}}" type="text" class="form-control" id="description"
                                   name="description"
                                   placeholder="Описание продукта"
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
                        <div class="col-md-12 mb-4">
                            <label for="price">Цена</label>
                            <input value="{{$product->price}}" min="0" max="9999999" type="number" class="form-control"
                                   id="price" name="price"
                                   placeholder="Цена"
                                   required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Максимум 7 символов
                            </div>
                        </div>
                    </div>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Текущее изображение"
                             class="img-thumbnail">
                    @endif
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload (Single File) <a href="javascript:void(0)"
                                                       class="custom-file-container__image-clear"
                                                       title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                   name="image">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="select_menu1" class="form-group mb-4">
                                <select name="available" class="custom-select" required>
                                    <option value="">Open this select menu</option>
                                    <option value="0" {{ $product->available == 0 ? 'selected' : '' }}>Недоступно</option>
                                    <option value="1" {{ $product->available == 1 ? 'selected' : '' }}>Доступно</option>
                                </select>
                                <div class="valid-feedback">Example valid custom select feedback</div>
                                <div class="invalid-feedback">
                                    Please Select the field
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="quantity">Количество</label>
                            <input value="{{$product->quantity}}" min="0" max="9999999" type="number"
                                   class="form-control" id="quantity" name="quantity"
                                   placeholder="Количество"
                                   required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Максимум 7 символов
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="delivery_date">Дата</label>
                            <input value="{{$product->delivery_date}}" type="date" class="form-control"
                                   id="delivery_date" name="delivery_date"
                                   required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please select a date
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary submit-fn mt-2" type="submit">Обновить</button>
                        <a href="{{route('admin.products')}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

