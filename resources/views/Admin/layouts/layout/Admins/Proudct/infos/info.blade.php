<style>
   .contaner .left{
    float: left;
    color: #cb0c9f;;
    }
  .contaner .right{
    float: right;

    }
</style>
@extends('Admin.layouts.includes')
@section('contents')
@section('title','المنتوجات')
<div class="contaner">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card">

              <div class="card-body pt-4 p-3">
                  <div class="text-center">
                      <img src="{{$products->photo}}" style="width: 100px">
                  </div>
                <div class="right">
                 الاسم
                </div>
               <div class="left">
                 {{$products->name}}
               </div>
        
               <br>
               <div class="right">
                السعر البيع
               </div>
              <div class="left">
                {{$products->price}}
              </div>
              <br>
              <div class="right">
                سعر الشراء
               </div>
              <div class="left">
                {{$products->selling}}
              </div>
              <br>
              <div class="right">
                الكمية الموجودة
               </div>
              <div class="left">
                {{$products->quantity}}
              </div>
              <br>
              <div class="right">
                الحالة
               </div>
              <div class="left">
                {{$products->is_active}}
              </div>
              <br>
              <div class="right">
                المشاهدات
               </div>
              <div class="left">
                {{$products->viewed}}
              </div>
              <br>
              <div class="right">
                 نوع التخفيض
               </div>
              <div class="left">
                {{$products->price_type}}
              </div>
              <br>
              <div class="right">
                سعر التخفيض
               </div>
              <div class="left">
                {{$products->special_price}}
              </div>
              <br>
              <div class="right">
                تاريخ البداية
               </div>
              <div class="left">
                {{$products->price_star}}
              </div>
              <br>
              <div class="right">
                تاريخ النهاية
               </div>
              <div class="left">
                {{$products->price_end}}
              </div>
              <br>
              <div class="right">
                سعر التخفيض
               </div>
              <div class="left">
                {{$products->special_price}}
              </div>
            
            
              
              </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">

              <div class="card-body pt-4 p-3" style="overflow-y: scroll;height: 520px">
                <div class="right">
                 القسم
                </div>
               <div class="left">
                 {{$brand->name}}
               </div>
               <br>
               @foreach ($products->categories as $category)
               <div class="right">
                الصنف
               </div>
              <div class="left">
                {{$category->name}}
              </div>
              <br>
               @endforeach
               @foreach ($products->tages as $tage)
               <div class="right">
                علامة البحث
               </div>
              <div class="left">
                {{$tage->name}}
              </div>
              <br>
               @endforeach
               @foreach ($products->options as $option)
               <div class="right">
                السعر
               </div>
              <div class="left">
                {{$option->price}}
              </div>
              <br>
              <div class="right">
                الخاصية
               </div>
              <div class="left">
                {{$option->attribute}}
              </div>
              <br>
              <div class="text-center">
                  <img src="{{$option->photo}}" style="width: 100px">
              </div>
               @endforeach
               <br>
               <div>
                   <h6 class="text-center text-primary">الوصف</h6>
                   <p class="text-center">{{$products->description}}</p>
               </div>
              </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
              <div class="card-body pt-4 p-3">
                @foreach ($products->productImages as $image)
                <div class="mySlides">
                  <img src="{{$image->photos}}" id="image">
                </div>
                @endforeach
                <div class="row">
                    @foreach ($products->productImages as $image)
                  <div class="column">
                    <img class="demo cursor" src="{{$image->photos}}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
