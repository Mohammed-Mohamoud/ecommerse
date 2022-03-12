



    <!--On Sale-->
    <div class="wrap-show-advance-info-box style-1 has-countdown">
        <h3 class="title-box"><p class="text-center">المنتوجات</p></h3>
        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container ">
        @foreach ($data['products'] as $product)
            <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                        <img src="{{$product->photo}}" style="width: 300px">
                    <div class="group-flash">
                        <span class="flash-item sale-label">{{$product->name}}</span>
                    </div>
                    <div class="wrap-btn">
                        <a href="" class="function-link">عرض التفاصل</a>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$product->description}}</span></a>
                        <div class="wrap-price"><span class="product-price">{{$product->price}}</span></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



