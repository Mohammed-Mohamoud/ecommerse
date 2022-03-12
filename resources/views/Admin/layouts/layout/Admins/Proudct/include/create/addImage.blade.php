<div class="col-md-8 mt-4">

    <div class="row">

            <div class="card col-md-6" id="images">
                <form action="{{route('product.create.Images')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-0 text-center">الصور</div>
              <div class="card-body pt-4 p-3 row">
                <div class="form-group col-md-4">
                    <label for="">اختارالمنتوج</label>
                    <select clabss="custom-select" name="id" class="form-control">
                        <option selected></option>
                        @if ($products && $products->count() > 0)
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group col-md-7">
                <div id="dpz-multiple-files" class="dropzone dropzone-area">
                    <div class="dz-message">صور المنتوج</div>
                </div>
        </div>
              </div>
              <button type="submit" class="btn btn-primary col-md-12">اضافة الصور</button>
            </form>
            </div>

            <div class="card col-md-6">

                <div class="mb-0 text-center">الوصف</div>
                <form action="{{route('product.create.description')}}" method="post">
                    @csrf
                    <div class="card-body pt-4 p-3">
                    <div class="form-group col-md-6">
                        <label for="">اختارالمنتوج</label>
                        <select clabss="custom-select" name="id" class="form-control">
                            <option selected></option>
                            @if ($products && $products->count() > 0)
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>

                    <label for="">الوصف</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control">

                    </textarea>
                <button type="submit" class="btn btn-primary col-md-12">اضافة  الوصف</button>
                </form>
              </div>
        </div>
    </div>
</div>
<style>
    #images{
        height: 310px;
        overflow-x: scroll;
    }
</style>
