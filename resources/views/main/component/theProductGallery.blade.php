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
                @foreach($categories_images as $categories_image)
                    <div class="cbp-item category-{{$categories_image->category_id}}"><a href="{{asset('ajax/project1.html')}}"
                                                          class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap"><img src="{{ asset(('storage/' . $categories_image->image)) }}" alt="img"/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        @php
                                            $category = $categories->firstWhere('id', $categories_image->category_id);
                                        @endphp
                                        <div class="cbp-l-caption-title">category-{{ $category->name ?? 'Unknown' }}</div>
                                        <div class="cbp-l-caption-desc">Print, Motion</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                @endforeach
                <div class="divide30"></div>
                <div class="text-center">
{{--                    <div id="loadMore-container" class=""><a href="ajax/loadmore.html"--}}
{{--                                                             class="cbp-l-loadMore-link btn btn-border dark"> <span--}}
{{--                                class="cbp-l-loadMore-defaultText">LOAD MORE</span> <span--}}
{{--                                class="cbp-l-loadMore-loadingText">LOADING...</span> <span--}}
{{--                                class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span> </a></div>--}}
                </div>
                <!--/.text-center -->
            </div>
            <!--/.cbp-panel -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.light-wrapper -->
</div>
