
@extends('Admin.layouts.includes')
@section('contents')
@section('title','جميع الاصناف')
<div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0 text-center">عرض الاقسام</h6>
            </div>
            <div class="card-body pt-4 p-3" style="height: 480px ;overflow-x: scroll">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                    <tr>
                                        <th>اسم القسم</th>
                                        <th class="bg-info text-center text-light">تعديل</th>
                                        <th class="bg-danger text-center text-light">حذف</th>
                                    </tr>
                        </thead>
                        <tbody>
                            @isset($brands)
                            @foreach ($brands as $brn)
                            <tr class="text-center">
                                <td>{{$brn->name}}</td>
                                   <td>
                                    <a href="{{route('brand.edite',$brn->id)}}" class="btn btn-info btn-icon-split">
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
         <div class="modal-body text-center">سوف يتم حذف هذا القسم نهائيأ</div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
             <a class="btn btn-primary" href="{{route('brand.delete',$brn->id)}}">موافق</a>
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
                <h6 class="mb-0 text-center">تعديل القسم</h6>
              </div>
              @include('Admin.alerts.success')
              @include('Admin.alerts.errors')
              <div class="card-body pt-4 p-3">
                  @isset($brand)
                <form action="{{route('brand.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <div class="form-group">
                      <label for="">اسم القسم</label>
                      <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                       @error('name')
                       <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">تعديل القسم</button>
                </form>
                @endisset
              </div>
            </div>
          </div>
      </div>
<!--   Core JS Files   -->

@endsection

