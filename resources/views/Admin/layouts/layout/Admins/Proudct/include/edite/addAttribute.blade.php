
              @if ($data['product']->options)
<div class="col-md-6 mt-4" id="attributes">
    <div class="card">
        <div class="mb-0 text-center">نوع الخاصية</div>
      <div class="card-body pt-4 p-3">
              @foreach ($data['product']->options as $productoption)
              <form action="{{route('product.edite.attribute')}}" method="post" enctype="multipart/form-data">
                @csrf
              <input type="hidden" name="id" value="{{$productoption->id}}">
              <div class="row col-md-12">
                <div class="form-group col-md-2">
                    <img src="{{$productoption->photo}}" style="width: 50px">
                  </div>
            <div class="form-group col-md-3">
                <label for=""> الخاصية</label>
                 <input type="text" class="form-control" name="attribute" value="{{$productoption->attribute}}">
              </div>
              <div class="form-group col-md-4">
                <label for="">السعر</label>
                <input type="number" class="form-control" name="price" value="{{$productoption->price}}">
              </div>
              <div class="form-group col-md-2">
                <label for="">الصورة</label>
                <input type="file" name="photo" class="form-control" value="{{$productoption->photo}}">
              </div>
              <div class="form-group col-md-1">
                <label for="">اضغط</label>
                <button type="submit" class="btn btn-primary">تم</button>
              </div>
            </div>
            </form>
        @endforeach
    </div>
    </div>
  </div>
  @endif
<style>
    #attributes{
        height: 300px;
        overflow-x: scroll;
    }
</style>
