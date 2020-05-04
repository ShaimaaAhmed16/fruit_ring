@extends('front.app')
@include('front.header')
@section('content')
<div class="container text-right mt-5 fillter">
    <div>
        <a href="{{ route('main', ['sort'=>' num_of_orders']) }}" class="text-black">الاكثر طلبا</a>
        <hr>
    </div>
    <div>
        <a  href="{{ route('main', ['sort'=>' num_of_views']) }}" class="text-black">الاعلى مشاهدة</a>
        <hr>
    </div>

    <div>
        <a href="{{ route('main', ['sort'=>'high_low']) }}" class="text-black">السعر الاكثر فالاقل</a>
        <hr>
    </div>
    <div>
        <a href="{{ route('main', ['sort'=>'low_high']) }}" class="text-black">السعر الاقل فالاكثر</a>
        <hr>
    </div>



</div>
@endsection