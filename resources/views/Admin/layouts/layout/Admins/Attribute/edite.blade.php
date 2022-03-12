
@extends('Admin.layouts.includes')
@section('contents')
@section('title','جميع الاصناف')
<div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0 text-center">عرض الخواص</h6>
            </div>
            <div class="card-body pt-4 p-3" style="height: 480px ;overflow-x: scroll">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                    <tr>
                                        <th>اسم الخاصية</th>
                                        <th class="bg-info text-center text-light">تعديل</th>
                                        <th class="bg-danger text-center text-light">حذف</th>
                                    </tr>
                        </thead>
                        <tbody>
                            @isset($attributes)
                            @foreach ($attributes as $attribute)
                            <tr class="text-center">
                                <td>{{$attribute->name}}</td>
                                   <td>
                                    <a href="{{route('attribute.edite',$attribute->id)}}" class="btn btn-info btn-icon-split">
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
         <div class="modal-body text-center">سوف يتم حذف هذه الصفة نهائيأ</div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
             <a class="btn btn-primary" href="{{route('attribute.delete',$attribute->id)}}">موافق</a>
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
                <h6 class="mb-0 text-center">تعديل الخواص</h6>
              </div>
              @include('Admin.alerts.success')
              @include('Admin.alerts.errors')
              <div class="card-body pt-4 p-3">
                  @isset($attribute)
                <form action="{{route('attribute.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$attribute->id}}">
                    <div class="form-group">
                      <label for="">اسم الخاصية</label>
                      <input type="text" name="name" class="form-control" value="{{$attribute->name}}">
                       @error('name')
                       <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">تعديل الخاصية</button>
                </form>
                @endisset
              </div>
            </div>
          </div>
      </div>
<!--   Core JS Files   -->

@endsection

