

    <!--On Sale-->
    <div class="wrap-show-advance-info-box style-1 has-countdown">
        <h3 class="title-box"><p class="text-center">الاصناف</p></h3>
        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container ">
        @foreach ($data['categories'] as $category)
            <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                        <img src="{{$category->photo}}" style="width: 300px">
                    <div class="group-flash">
                        <span class="flash-item sale-label">{{$category->name}}</span>
                    </div>
                    <div class="wrap-btn">
                        <a href="{{route('front.show.category',$category->id)}}" class="function-link">عرض المنتوجات</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



