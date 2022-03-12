
@extends('Admin.layouts.includes')
@section('contents')
@section('title','جميع الاصناف')
<div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0 text-center">عرض الاصناف</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                    <tr>
                                        <th>اسم الصنف</th>
                                        <th>اسم الفرع</th>
                                        <th>الصورة</th>
                                        <th class="bg-info text-center text-light">تعديل</th>
                                        <th class="bg-danger text-center text-light">حذف</th>
                                    </tr>
                        </thead>
                        <tbody>
                            @isset($categories)
                            @foreach ($categories as $category)
                            <tr class="text-center">
                                <td>{{$category->name}}</td>
                                <td>{{$category->Parents->name ?? '---'}}</td>
                                <td>
                                    @if ($category->photo!=null)
                                    <img src="{{ $category->photo }}" class="img-thumbnail mx-auto d-block" width="100"
                                    height="100">
                                    @else
                                    <img src="{{asset('Admin/images/on_imagge.png')}}" class="img-thumbnail mx-auto d-block"
                                    width="100" height="100">
                                    @endif
                                   </td>
                                   <td>
                                    <a href="{{route('category.edite',$category->id)}}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit text-white"></i>
                                        </span>
                                        <span class="text">تعديل</span>
                                    </a>
                                </td>
                                <td>
                                    <a
                                         class="btn btn-danger btn-icon-split"
                                          data-toggle="modal" data-target="#logoutModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash text-white"></i>
                                        </span>
                                        <span class="text">حذف</span>
                                    </a>
                                </td>
                            </tr>
                                                        <!-- Delete Modal-->
                   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                     <div class="modal-dialog" role="document">
                      <div class="modal-content text-center">
                        <div class="modal-body">سوف يتم حذف هذا الصنف نهائيأ</div>
                            <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                 <a class="btn btn-primary" href="{{route('category.delete',$category->id)}}">موافق</a>
             </div>
         </div>
     </div>
      </div>
     <!-- Delete Modal-->
                            @endforeach
                            @endisset
                        </tbody>

                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0 text-center">تحديث الصنف</h6>
              </div>
              @include('Admin.alerts.success')
              @include('Admin.alerts.errors')
              @isset($category)
              <div class="card-body pt-4 p-3">
                <form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$categorys->id}}">
                    <div class="form-group text-center">
                      @if ($category->photo!=null)
                      <img src="{{$categorys->photo}}" alt="" style="width: 200px">  
                    @else
                    <img src="{{asset('Admin/images/on_imagge.png')}}" alt="" style="width: 200px">
                      @endif

                    

                      </div>
                    <div class="form-group">
                      <label for="">اسم الصنف</label>
                      <input type="text" name="name" class="form-control" value="{{$categorys->name}}">
                       @error('name')
                       <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                <div class="form-group">
                  <label for="">الصورة الشخصية</label>
                  <input type="file" name="photo" class="form-control" value="{{$categorys->photo}}">
                  @error('photo')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
               </div>
                </div>
                @endisset
                <div class="form-group">
                    <label>
                        صنف فرعي
                        <input type="checkbox" id="checkbox">
                    </label>
                </div>
                @isset($categories)
                <div class="form-group hidden" id="show_data">
                    <div class="form-group">
                        <label for="">اختار الصنف </label>
                        <select name="parent_id" class="form-control">
                            @if ($categories&&$categories->count()>0)
                            <option value=""></option>
                            @foreach ($categories as $category)
                            <option  value="{{$categorys->id}}" @if($category->id==$categorys->parent_id)
                              selected
                            @endif>
                              {{$category->name}}
                            </option>
                        @endforeach
                            @endif
                        </select>
                      </div>
                </div>
                @endisset
                <button type="submit" class="btn btn-primary">تعديل الصنف</button>
                </form>
              </div>
            </div>
          </div>
      </div>
<!--   Core JS Files   -->
@endsection
@section('script')
<script>
    $("#checkbox").click(function() {
        $("#show_data").toggle();
    });
</script>
@endsection
<style>
.hidden {
    display: none;
}
.table-responsive{
height: 450px;
}
</style>
