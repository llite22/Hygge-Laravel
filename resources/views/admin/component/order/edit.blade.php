@extends('admin.component.index')
@section('content')
    {{--    @dd($order)--}}
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="d-flex justify-content-center">
                <form class="simple-example col-lg-10"
                      action="{{route('admin-orders.update', $order->id)}}" method="POST" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="select_menu" class="form-group mb-4">
                                <select name="status" class="custom-select" required>
                                    <option value="">Open this select menu</option>
                                    <option value="в обработке" {{ $order->status == 'в обработке' ? 'selected' : '' }}>в обработке</option>
                                    <option value="отправлен" {{ $order->status == 'отправлен' ? 'selected' : '' }}>отправлен</option>
                                    <option value="доставлен" {{ $order->status == 'доставлен' ? 'selected' : '' }}>доставлен</option>
                                    <option value="отменен" {{ $order->status == 'отменен' ? 'selected' : '' }}>отменен</option>
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
                        <a href="{{route('admin.products')}}"
                           class="btn btn-danger submit-fn mt-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

