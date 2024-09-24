<!-- Контейнер корзины -->
<div class="light-wrapper">
    <div class="container inner">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Контейнер корзины -->
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ваша корзина</h3>
                </div>
                <div class="panel-body">
                        @foreach($cart->cartItems as $cartItem)
                            <!-- товар -->
                            <div class="row"
                                 style="border-bottom: 1px solid #ddd; padding-bottom: 15px; margin-bottom: 15px;">
                                <div class="col-md-2">
                                    <img width="100" height="100"
                                         src="{{asset('storage/' . $cartItem->product->image)}}" alt="Product Image"
                                         class="img-responsive img-rounded">
                                </div>
                                <div class="col-md-4">
                                    <h4>{{$cartItem->product->name}}</h4>
                                    <p class="text-muted">Цена: {{$cartItem->product->price}} ₽</p>
                                </div>
                                <div class="col-md-3 d-flex">
                                    <div>
                                        <!-- Форма для уменьшения количества -->
                                        <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <span class="input-group-btn">
                                              <input type="hidden" name="id" value="{{$cartItem->id}}">
                                            <input type="hidden" name="quantity" value="{{ $cartItem->quantity - 1 }}">
                                        <button class="btn btn-default" type="submit" {{ $cartItem->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                         </span>
                                        </form>

                                        <!-- Ввод количества -->
                                        <input type="number" class="form-control text-center" name="quantity"
                                               value="{{ $cartItem->quantity }}" min="1" required readonly>

                                        <!-- Форма для увеличения количества -->
                                        <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{$cartItem->id}}">
                                            <span class="input-group-btn">
                                            <input type="hidden" name="quantity" value="{{ $cartItem->quantity + 1 }}">
                                            <button class="btn btn-default" type="submit">+</button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <p class="lead">{{$cartItem->product->price * $cartItem->quantity}} ₽</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <p class="lead">Общая цена: {{$cart->calculateTotalPrice()}} ₽</p>
                            </div>
                        </div>
                        <!-- Кнопка оформления заказа -->
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if($cart->cartItems->isNotEmpty())
                                    <form action="{{ route('cart.order-placement', $cart->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Оформить заказ</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
