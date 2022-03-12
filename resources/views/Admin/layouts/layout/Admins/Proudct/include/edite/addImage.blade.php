<div class="col-md-6 mt-4">
    <div class="row">
        @if ( $data['product']->productImages)
            <div class="card col-md-6  mt-4" id="images">
                <form action="{{route('product.edite.Images')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-0 text-center">الصور</div>
              <div class="card-body pt-4 p-3 row">
                  <div class="form-group col-md-12">
                <div id="dpz-multiple-files" class="dropzone dropzone-area">
                    <input type="hidden" name="id" value="{{$data['product']->id}}">
                    @foreach ($data['product']->productImages as $image)
                    <input type="hidden" name="product_image[]" value="{{$data['product']->id}}">
                    @endforeach
                    <div class="dz-message">صور المنتوج</div>
                </div>
        </div>
              </div>
              <button type="submit" class="btn btn-primary col-md-12">اضافة الصور</button>
            </form>
            </div>
            @endif
            <div class="card col-md-6  mt-4">
                <div class="mb-0 text-center">الوصف</div>
                <form action="{{route('product.edite.description')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['product']->id}}">
                    <div class="card-body pt-4 p-3">
                    <textarea name="description" rows="4" class="form-control text-right">
                                   {{$data['product']->description}}
                    </textarea><br>
                <button type="submit" class="btn btn-primary col-md-12">تعديل الوصف</button>
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

