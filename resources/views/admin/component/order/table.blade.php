<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="my-5 w-100">
            <div class="col-lg-11 d-flex justify-content-end">
                <a href="{{route('admin-products.create')}}"
                   class="btn btn-primary mb-2">Добавить</a>
            </div>
            <div class="row layout-spacing d-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3  table-hover">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>User</th>
                                        <th>status</th>
                                        <th>total_price</th>
                                        <th>product</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_items as $order_item)
                                        <tr>
                                            <td>
                                                {{$order_item->id}}
                                            </td>
                                            <td>
                                                {{$order_item->user->name}}

                                            </td>
                                            <td>
                                                {{$order_item->status}}
                                            </td>
                                            <td>
                                                {{$order_item->total_price}}
                                            </td>

                                            <td>
                                                @foreach ($order_item->orderItems as $item)
                                                    <p>Продукт: {{ $item->product->name }}</p>
                                                    <p>Количество: {{ $item->quantity }}</p>
                                                    <p>Цена: {{ $item->product->price }}</p>
                                                @endforeach
                                            </td>
                                            {{--                                            <td>--}}
                                            {{--                                                <span>--}}
                                            {{--                                                    <img--}}
                                            {{--                                                        src="{{ asset('storage/' . $product->image) }}"--}}
                                            {{--                                                        class="profile-img" alt="img"--}}
                                            {{--                                                    ></span>--}}
                                            {{--                                            </td>--}}
                                            {{--                                            <td>--}}
                                            {{--                                                {{$product->quantity}}--}}
                                            {{--                                            </td>--}}
                                            {{--                                            <td>--}}
                                            {{--                                                {{$product->delivery_date}}--}}
                                            {{--                                            </td>--}}
                                            <td><a
                                                    {{--                                                    href="{{route('admin-products.edit', ['id' => $product->id])}}"--}}
                                                    class="bs-tooltip"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-edit-2 p-1 br-6 mb-1">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </a></td>
                                            <td>
                                                <form
                                                    {{--                                                    action="{{route('admin-products.destroy', ['id' => $product->id])}}"--}}
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            style="background:none;border:none;padding:0;cursor:pointer;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24" viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-trash p-1 br-6 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
