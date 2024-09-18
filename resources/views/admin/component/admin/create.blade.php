@extends('admin.component.index')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form class="simple-example col-lg-10"
                      action="{{route('admin-'. $table . '.store', ['table' => 'table'])}}" method="POST" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @if($table == 'categories')
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="name">Имя категории</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Имя категории"
                                       value=""
                                       required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please fill the name
                                </div>
                            </div>
                        </div>
                    @elseif($table == 'sliders')
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="text">Текст</label>
                                <input type="text" class="form-control" id="text" name="text"
                                       placeholder="Текст"
                                       value=""
                                       required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please fill the name
                                </div>
                            </div>
                        </div>
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
                    @elseif($table == 'category-images')
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
                                <div id="select_menu" class="form-group mb-4">
                                    <select name="category_id" class="custom-select" required>
                                        <option value="">Open this select menu</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Example valid custom select feedback</div>
                                    <div class="invalid-feedback">
                                        Please Select the field
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary submit-fn mt-2" type="submit">Создать</button>
                        <a href="{{route('admin.' . $table, ['table' => 'table'])}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

