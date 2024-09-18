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
            <div id="grid-container" class="cbp">
                @foreach($products as $product)
                    @foreach($product->products as $productCategory)
                        <div class="cbp-item category-{{$product->id}}"><a href="{{asset('ajax/project1.html')}}"
                                                                           class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img
                                        src="{{ asset(('storage/' . $productCategory->image)) }}"
                                        alt="img"/>
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Product-{{$productCategory->name}}</div>
                                            <div class="cbp-l-caption-desc">Print, Motion</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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





