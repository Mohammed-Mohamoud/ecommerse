
 <div class="col-md-4 mt-4">
    <div class="card">
        <div class="mb-0 text-center">نوع الخاصية</div>
      <div class="card-body pt-4 p-3">
        <form action="{{route('product.create.attribute')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row col-md-12">
            <div class="form-group col-md-4">
                <label for="">اختارالمنتوج</label>
                <select clabss="custom-select" name="product_id" class="form-control">
                    <option selected></option>
                    @if ($products && $products->count() > 0)
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    @endif
                </select>
              </div>
            <div class="form-group col-md-4">
                <label for="">اختار الخاصية</label>
                <select clabss="custom-select" name="attribute_id" class="form-control">
                    <option selected></option>
                    @if ($data['attributes'] && $data['attributes']->count() > 0)
                        @foreach ($data['attributes'] as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    @endif
                </select>
              </div>
            <div class="form-group col-md-4">
                <label for="">نوع الخاصية</label>
                 <input type="text" class="form-control" name="attribute">
              </div>
              <div class="form-group col-md-12">
                <label for="">اختار الصورة</label>
                 <input type="file" name="photo" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">السعر</label>
                 <input type="number" class="form-control" name="price">
              </div>
              <div class="form-group col-md-6">
                <label for="">اضغط هنا</label>
                <button type="submit" class="btn btn-primary">اضافة الخاصية</button>
              </div>
        </div>
    </form>
      </div>
    </div>
  </div>

