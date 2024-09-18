<div class="light-wrapper">
    <div class="container inner">
        <div class="section-title text-center">
            <h3>The Product Gallery</h3>
            <p class="lead">awesome products prepared with creative ideas and great design</p>
        </div>
        <div class="cbp-panel">
            <div id="filters-container" class="cbp-filter-container text-center">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">Все</div>
                @foreach($categories as $category)
                    <div data-filter=".category-{{$category->id}}" class="cbp-filter-item"> {{$category->name}}</div>
                @endforeach
            </div>
            <div id="grid-container" class="cbp">
                @foreach($categories as $category)
                    @foreach($category->images as $image)
                    <div class="cbp-item category-{{$category->id}}"><a href="{{asset('ajax/project1.html')}}" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap"><img
                                    src="{{ asset(('storage/' . $image->image)) }}"
                                    alt="img"/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">category-{{$category->name}}</div>
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
