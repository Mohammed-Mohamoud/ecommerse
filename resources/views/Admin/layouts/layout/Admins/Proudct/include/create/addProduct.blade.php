<div class="col-md-4 mt-4">
    <div class="card">

        <div class="mb-0 text-center">اضافة منتوج جديد</div>

      @include('Admin.alerts.success')
      @include('Admin.alerts.errors')
      <div class="card-body pt-4 p-3">
        <form action="{{route('product.create')}}" method="post" >
            @csrf
            <div class="row col-md-12">
                <div class="form-group col-md-4">
                    <label for="">اختار القسم</label>
                    <select clabss="custom-select" name="brand_id" class="form-control">
                        <option selected></option>
                        @if ($data['brands'] && $data['brands']->count() > 0)
                            @foreach ($data['brands'] as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="">اختار الصنف</label>
                      <select clabss="custom-select" name="category_id" class="form-control">
                        <option selected></option>
                        @if ($data['categories']  && $data['categories']->count() > 0)
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">اختار دلالة البحث</label>
                      <select clabss="custom-select" name="tage_id" class="form-control">
                        <option selected></option>
                        @if ($data['tages'] && $data['tages']->count() > 0)
                            @foreach ($data['tages'] as $tage)
                                <option value="{{ $tage->id }}">{{ $tage->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
            </div>
            <div class="row col-md-12">
                <div class="form-group col-md-6">
                    <label for="">الاسم</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعرالشراء</label>
                    <input type="number" class="form-control" name="selling">
                </div>
                <div class="form-group col-md-4">
                    <label for="">سعر البيع</label>
                    <input type="number" class="form-control" name="price">
                </div>

                <div class="form-group col-md-4">
                    <label for="">الكمية الموجودة</label>
                    <input type="number" class="form-control" name="quantity">
                </div>
                <div class="form-group col-md-2">
                    <label>الحالة</label>
                    <input @if ('checked') value="1"
                    @else
                        value="0"
                        @endif
                        type="checkbox" name="is_active">

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
                        <input type="text" class="form-control" name="price_type">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">سعر العرض</label>
                        <input type="number" class="form-control" name="special_price">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">بداية العرض</label>
                        <input type="date" class="form-control" name="price_star">
                    </div>
                    <div class="form-group col-md-6 hidden">
                        <label for="">نهاية العرض</label>
                        <input type="date" class="form-control" name="price_end">
                    </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">اضافة المنتوج</button>
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
