@extends('admin.component.index')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form id="categoryProducts" class="simple-example col-lg-10">
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="name">Имя категории</label>
                            <input type="text" class="form-control" id="name" name="name"
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
                        <button class="btn btn-primary submit-fn mt-2" type="submit">Создать</button>
                        <a href="{{route('admin.category-products')}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>

        $('#categoryProducts').on('submit', function (event) {
            event.preventDefault();

            let name = $('#name').val();

            $.ajax({
                url: "/admin/category-products",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                },
                success: function (response) {
                    console.log(response);
                },
            });
        });
    </script>
@endsection

