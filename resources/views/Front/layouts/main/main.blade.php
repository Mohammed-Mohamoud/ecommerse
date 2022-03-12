
@extends('Front.App.app')
@section('contents')
@section('title','الصفحة الرئسية')
@include('Front.include.navbar')
<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
 @include('Front.layouts.main.banner1')
 @include('Front.layouts.main.carousel')

        <!--BANNER-->
@include('Front.layouts.main.banner')

@include('Front.layouts.main.category')

@include('Front.layouts.main.product.product')


    </div>

</main>
@endsection
