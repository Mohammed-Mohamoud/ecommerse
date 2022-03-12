
@extends('Admin.layouts.includes')
@section('contents')
@section('title','المنتوجات')
<div class="container-fluid">
      <div class="row">
@include('Admin.layouts.layout.Admins.Proudct.include.create.show')
@include('Admin.layouts.layout.Admins.Proudct.include.create.addProduct')
          </div>
        <div class="row">
@include('Admin.layouts.layout.Admins.Proudct.include.create.addImage')
@include('Admin.layouts.layout.Admins.Proudct.include.create.addAttribute')
        </div>
      </div>
@endsection

