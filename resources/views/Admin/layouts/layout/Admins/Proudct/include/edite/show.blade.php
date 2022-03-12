


        <div class="col-md-6 mt-4">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <div class="mb-0 text-center">عرض كل صور المنتوج</div>
              </div>
              <div class="card-body pt-4 p-3">
                <div class="container">
                    @foreach ($data['product']->productImages as $image)
                    <div class="mySlides">
                      <img src="{{$image->photos}}" id="image">
                    </div>
                    @endforeach
                    <div class="row">
                        @foreach ($data['product']->productImages as $image)
                      <div class="column">
                        <img class="demo cursor" src="{{$image->photos}}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                      </div>
                      @endforeach
                    </div>
                  </div>

              </div>
            </div>
          </div>

