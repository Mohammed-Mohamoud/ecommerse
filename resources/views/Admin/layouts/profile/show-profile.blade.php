@extends('Admin.layouts.includes')
@section('contents')
@section('title','صفحة الملف الشخصي')
@isset($dashboard)
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{asset('Admin/assets/img/curved-images/curved0.jpg')}}'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
              @if ($dashboard->photo!=null)
              <img src="{{$dashboard->photo}}"
               alt="..." class="w-100 border-radius-lg shadow-sm">
              @else
              <img src="{{asset('Admin/images/on_imagge.png')}}"
               alt="..." class="w-100 border-radius-lg shadow-sm">
              @endif
              <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
            </a>
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{$dashboard->frist_name .' '.$dashboard->last_name}}
            </h5>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0 text-center">البيانات الشخصية</h6>
              </div>
              <div class="card-body p-3">
                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$dashboard->id}}">
                    <div class="form-group">
                      <label for="">الاسم الاول</label>
                      <input type="text" name="frist_name" class="form-control"
                       value="{{$dashboard->frist_name}}">
                       @error('frist_name')
                       <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                <div class="form-group">
                  <label for="">الاسم الاحير</label>
                  <input type="text" name="last_name" class="form-control"
                    value="{{$dashboard->last_name}}">
                    @error('last_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">الصورة الشخصية</label>
                  <input type="file" name="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                </form>
              </div>
            </div>
          </div>
      <div class="col-12 col-xl-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0 text-center"> اضافة كلمة المرور</h6>
          </div>
          <div class="card-body p-3">
            <form action="{{route('profile.update.password')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$dashboard->id}}">
                <div class="form-group">
                    <label for="">كلمة المرور الجديدة</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                 <div class="form-group">
              <label for="">تأكيد كلمة المرور</label>
              <input type="password" name="password_confirmation" class="form-control">
              @error('password_confirmation')
              <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0 text-center">عرض البيانات الشخصية</h6>
          </div>
          <div class="card-body p-3">
                    @if ($dashboard->photo!=null)
                    <img src="{{$dashboard->photo}}"
                     alt="..." class="w-100 border-radius-lg shadow-sm">
                    @else
                    <img src="{{asset('Admin/images/on_imagge.png')}}"
                     alt="..." class="w-100 border-radius-lg shadow-sm">
                    @endif
                    <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                  </a>
                     <br><br>
                    <h5 class="text-center">
                      {{$dashboard->frist_name .' '.$dashboard->last_name}}
                    </h5>
                    <h5 class="text-center">
                      مدير الموقع
                    </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endisset
<!--   Core JS Files   -->
@endsection
