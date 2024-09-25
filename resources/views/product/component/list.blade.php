<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('croppie/croppie.css')}}" />
    <script src="{{asset('croppie/croppie.js')}}"></script>
    <title>Document</title>
</head>
<body>

<div class="light-wrapper">
    <div class="container inner">
        <div class="section-title text-center">
            <h3>The Products</h3>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at commodi consectetur
                consequuntur culpa dolorum eius enim ex id illo natus odio officia quasi quis, recusandae sapiente
                similique sit ut!</p>
        </div>
        <div class="cbp-panel">
            <div id="filters-container" class="cbp-filter-container text-center">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">Все</div>
                @foreach($products as $product)
                    <div data-filter=".category-{{$product->id}}" class="cbp-filter-item"> {{$product->name}}</div>
                @endforeach
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="grid-container" class="cbp">
                @foreach($products as $product)
                    @foreach($product->products as $productCategory)
                        <div class="cbp-item category-{{$product->id}}">
                                <div class="cbp-caption-defaultWrap">
                                    <img
                                        width="200"
                                        height="400"
                                        src="{{ asset(('storage/' . $productCategory->image)) }}"
                                        class="my-image"
                                        alt="img"
                                    />
                                </div>
{{--                                <div class="cbp-caption-activeWrap">--}}
{{--                                    <div class="cbp-l-caption-alignCenter">--}}
{{--                                        <div class="cbp-l-caption-body">--}}
{{--                                            <div class="cbp-l-caption-title">Product-{{$productCategory->name}}</div>--}}
{{--                                            <div class="cbp-l-caption-desc">{{$productCategory->description}}</div>--}}
{{--                                            <div class="cbp-l-caption-desc">{{$productCategory->price}} ₽</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $productCategory->id }}">
                                <input type="hidden" name="product_id" value="{{ $productCategory->id }}">
                                <input type="number" name="quantity" value="1" min="1" class="form-control mb-2"
                                       style="width: 80px;">
                                <button type="submit" class="btn btn-primary"
                                        @if (!$productCategory->available) disabled @endif>
                                    Добавить в корзину
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endforeach
                <div class="divide30"></div>
                <div class="text-center">
                </div>
                <!--/.text-center -->
            </div>
            <!--/.cbp-panel -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.light-wrapper -->
</div>

<script>
    $('.my-image').croppie({
        viewport: {
            width: 100,
            height: 100,
            type: 'square',
        },
        boundary: { width: 300, height: 400 },
        showZoomer: false,
        enableResize: true,
        enableOrientation: true,
        mouseWheelZoom: 'ctrl'
    });
</script>
</body>
</html>




