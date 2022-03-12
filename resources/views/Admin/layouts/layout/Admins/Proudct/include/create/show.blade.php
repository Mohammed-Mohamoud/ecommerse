
        <div class="col-md-8 mt-4">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <div class="mb-0 text-center">عرض كل المنتوجات</div>
              </div>
              <div class="card-body pt-4 p-3">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                                      <tr>
                                          <th>الاسم</th>
                                          <th>سعر البيع</th>
                                          <th>الحالة</th>
                                          <th class="bg-info text-center text-light">تعديل</th>
                                          <th class="bg-primary text-center text-light">تفاصل</th>
                                          <th class="bg-danger text-center text-light">حذف</th>
                                      </tr>
                          </thead>
                          <tbody>
                              @isset($products)
                              @foreach ($products as $product)
                              <tr class="text-center">
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->getActive()}}</td>

                                     <td>
                                      <a href="{{route('product.edite',$product->id)}}" class="btn btn-info btn-icon-split">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-edit text-white"></i>
                                          </span>
                                          <span class="text">تعديل</span>
                                      </a>
                                  </td>
                                  <td>
                                    <a href="{{route('product.info',$product->id)}}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye text-white"></i>
                                        </span>
                                        <span class="text"> عرض  </span>
                                    </a>
                                </td>
                                  <td>
                                      <div
                                           class="btn btn-danger btn-icon-split"
                                           data-toggle="modal" data-target="#logoutModal">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-trash text-white"></i>
                                          </span>
                                          <span class="text">حذف</span>
                                      </div>
                                  </td>
                              </tr>
                               <!-- Delete Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-body text-center">سوف يتم حذف هذا المنتوج نهائيأ</div>
           <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
               <a class="btn btn-primary" href="{{route('product.delete',$product->id)}}">موافق</a>
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
<style>
    .table-responsive{
        height: 300px;
    }
</style>
