<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('croppie/croppie.css')}}"/>
    <script src="{{asset('croppie/croppie.js')}}"></script>
    <title>Document</title>
</head>
<body>

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
                        {{--                                        <input type="file" name="image" id="image-input" accept="image/*">--}}
                        {{--                                        <div id="image-preview"></div>--}}
                        {{--                                        <input type="hidden" name="base64_image" id="base64-image">--}}
                        {{--                                        <div class="form-row">--}}
                        {{--                                            <div class="col-md-12 mb-4">--}}
                        {{--                                                <label for="text">Текст</label>--}}
                        {{--                                                <input type="text" class="form-control" id="text" name="text"--}}
                        {{--                                                       placeholder="Текст"--}}
                        {{--                                                       value=""--}}
                        {{--                                                       required>--}}
                        {{--                                                <div class="valid-feedback">--}}
                        {{--                                                    Looks good!--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    Please fill the name--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}


                        <div class="container">
                            <div class="card" style="max-height: 500px;">
                                <div class="card-header bg-primary text-center text-white">How to Image Upload and Crop
                                    in Laravel with Ajax
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div id="upload-demo"></div>
                                        </div>
                                        <div class="col-md-4" style="padding:5%;">
                                            <strong>Select image to crop:</strong>
                                            <input class="form-control"  type="file" name="image" id="image-input" accept="image/*" required>
                                            <div id="upload-demo"></div>
                                            <input class="form-control" type="hidden" name="base64_image" id="base64-image" required>
                                            <div class="valid-feedback">Image looks good!</div>
                                            <div class="invalid-feedback">Please upload an image.</div>
                                            <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Предпросмотр</button>
                                        </div>

                                        <div class="col-md-4">
                                            <div id="preview-crop-image"
                                                 style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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

    <script type="text/javascript">
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#image-input').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.upload-image').click(function (ev) {
            ev.preventDefault();

            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $('#preview-crop-image').css({
                    'background-image': 'url(' + img + ')',
                    'background-size': 'contain',
                    'background-repeat': 'no-repeat',
                    'background-position': 'center'
                });
            });
        });

        $('form').submit(function (ev) {
            ev.preventDefault();

            const imageUploaded = $('#image-input').val() !== '';
            const textFilled = $('#text').val().trim() !== '';

            if (imageUploaded && textFilled) {
                resize.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (img) {
                    $('#base64-image').val(img);
                    $('form').unbind('submit').submit();
                });
            }
        });
    </script>

@endsection


</body>
</html>
