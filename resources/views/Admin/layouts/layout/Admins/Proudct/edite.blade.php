
@extends('Admin.layouts.includes')
@section('contents')
@section('title','المنتوجات')
<div class="container-fluid">
      <div class="row">
            @include('Admin.layouts.layout.Admins.Proudct.include.edite.addProduct')
            @include('Admin.layouts.layout.Admins.Proudct.include.edite.show')
          </div>
        <div class="row">
            @include('Admin.layouts.layout.Admins.Proudct.include.edite.addImage')
            @include('Admin.layouts.layout.Admins.Proudct.include.edite.addAttribute')
        </div>
      </div>
@endsection



