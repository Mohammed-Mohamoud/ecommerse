
@extends('Admin.layouts.includes')
@section('contents')
@section('title','تعديل الاعلانات')
<div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0 text-center">عرض الاعلانات</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>الاسم</th>
                                        <th>الرابط</th>
                                        <th>الصورة</th>
                                        <th class="bg-info text-center text-light">تعديل</th>
                                        <th class="bg-danger text-center text-light">حذف</th>
                                    </tr>
                        </thead>
                        <tbody>
                            @isset($banners)
                            @foreach ($banners as $banner)
                            <tr class="text-center">
                                <td>{{$banner->address}}</td>
                                <td>{{$banner->name}}</td>
                                <td>{{$banner->slug}}</td>
                                <td>
                                    @if ($banner->photo!=null)
                                    <img src="{{ $banner->photo }}" class="img-thumbnail mx-auto d-block" width="100"
                                    height="100">
                                    @else
                                    <img src="{{asset('Admin/images/on_imagge.png')}}" class="img-thumbnail mx-auto d-block"
                                    width="100" height="100">
                                    @endif
                                   </td>
                                   <td>
                                    <a href="{{route('banner.edite',$banner->id)}}" class="btn btn-info btn-icon-split">
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
     <div class="modal-content">
         <div class="modal-body text-center">سوف يتم حذف هذا الصنف نهائيأ</div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
             <a class="btn btn-primary" href="{{route('banner.delete',$banner->id)}}">موافق</a>
         </div>
     </div>
 </div>
 </div>
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
                <h6 class="mb-0 text-center">تعديل الاعلان</h6>
              </div>
              @include('Admin.alerts.success')
              @include('Admin.alerts.errors')
              <div class="card-body pt-4 p-3">
                <form action="{{route('banner.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$banner->id}}">
                    <div class="form-group text-center">
                        <img src="{{$banner->photo}}" alt="" style="width: 200px">
                        </div>
                    <div class="form-group">
                      <label for="">العنوان</label>
                      <input type="text" name="address" class="form-control" value="{{$banner->address}}">
                       @error('address')
                       <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="">الوصف</label>
                        <input type="text" name="name" class="form-control" value="{{$banner->name}}">
                         @error('name')
                         <small class="text-danger">{{$message}}</small>
                         @enderror
                      </div>
                      <div class="form-group">
                        <label for="">الرابط</label>
                        <input type="text" name="slug" class="form-control" value="{{$banner->slug}}">
                         @error('slug')
                         <small class="text-danger">{{$message}}</small>
                         @enderror
                      </div>
                <div class="form-group">
                  <label for="">الصورة </label>
                  <input type="file" name="photo" class="form-control" value="{{$banner->photo}}">
                  @error('photo')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
               </div>
                </div>
                <button type="submit" class="btn btn-primary">تعديل  الاعلان</button>
                </form>
              </div>
            </div>
          </div>
      </div>

      @endsection
