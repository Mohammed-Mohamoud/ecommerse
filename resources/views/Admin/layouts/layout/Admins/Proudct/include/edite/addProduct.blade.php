<div class="col-md-6 mt-4">
    <div class="card">

        <div class="mb-0 text-center">تعديل المنتوج</div>

      @include('Admin.alerts.success')
      @include('Admin.alerts.errors')
      <div class="card-body pt-4 p-3">
        <form action="{{route('product.update')}}" method="post" >
            @csrf
            <input type="hidden" name="id" value="{{$data['product']->id}}">
            <div class="row col-md-12">
                <div class="form-group col-md-4">
                    <label for="">اختار القسم</label>
                    <select clabss="custom-select" name="brand_id" class="form-control">
                        @if ($data['brands']&&$data['brands']->count()>0)
                        @foreach ($data['brands'] as $brand)
                        <option  value="{{$brand->id}}" @if($brand->id==$data['product']->barnd_id)
                          selected
                        @endif>
                          {{$brand->name}}
                        </option>
                    @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">اختار الصنف</label>
                      <select clabss="custom-select" name="category_id[]" class="form-control">
                        @if ($data['product']->categories && $data['product']->categories->count() > 0)
                        @foreach ($data['categories'] as $category)
                        @foreach ($data['product']->categories as $productsCategory)
                    <option  value="{{$category->id}}" @if($productsCategory->pivot->category_id==$category->id)
                            selected
                          @endif>
                          {{ $category->name }}
                          </option>
                    @endforeach
                        @endforeach
                        @else
                        @foreach ( $data['categories'] as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">اختار دلالة البحث</label>
                      <select clabss="custom-select" name="tage_id[]" class="form-control">


                        @if ($data['product']->tages && $data['product']->tages->count() > 0)
                        @foreach ($data['tages'] as $tage)
                        @foreach ($data['product']->tages as $productstage)
                    <option  value="{{$tage->id}}" @if($productstage->pivot->tage_id==$tage->id)
                            selected
                          @endif>
                          {{ $tage->name }}
                          </option>
                    @endforeach
                        @endforeach
                        @else
                        @foreach ( $data['tages'] as $tage )
                        <option value="{{$tage->id}}">{{$tage->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    </div>
            </div>
            <div class="row col-md-12">
                <div class="form-group col-md-6">
                    <label for="">الاسم</label>
                    <input type="text" class="form-control" name="name" value="{{$data['product']->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعرالشراء</label>
                    <input type="number" class="form-control" name="selling" value="{{$data['product']->selling}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="">سعر البيع</label>
                    <input type="number" class="form-control" name="price" value="{{$data['product']->price}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="">الكمية الموجودة</label>
                    <input type="number" class="form-control" name="quantity" value="{{$data['product']->quantity}}">
                </div>
                <div class="form-group col-md-2">
                    <input @if ($data['product']->is_active==1) checked @endif
                    type="checkbox" name="is_active" value="{{$data['product']->is_active}}">
                   {{$data['product']->getActive()}}
                </div>
                <div class="form-group col-md-2">
                    <label>خاص</label>
                    <input @if ('checked') value="1"
                    @else
                        value="0"
                        @endif
                        type="checkbox" id="checkbox" name="specia">
                </div>
                    <div class="form-group col-md-6  hidden">
                        <label for="">نوع العرض</label>
                        <input type="text" class="form-control" name="price_type" value="{{$data['product']->price_type}}">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">سعر العرض</label>
                        <input type="number" class="form-control" name="special_price" value="{{$data['product']->special_price}}">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">بداية العرض</label>
                        <span class="text-primary">{{$data['product']->price_star}}</span>
                        <input type="date" class="form-control" name="price_star">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">نهاية العرض</label>
                        <span class="text-primary">{{$data['product']->price_end}}</span>
                        <input type="date" class="form-control" name="price_end">
                    </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">تعديل المنتوج</button>
        </form>
      </div>
    </div>
    @section('script')
    <script>
        $("#checkbox").click(function() {
            $(".hidden").toggle();
        });
    </script>
    @endsection
    <style>
    .hidden {
        display: none;
    }
    </style>
