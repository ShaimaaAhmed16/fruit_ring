@extends('front.app')
@include('front.header')
@section('content')


    <section class=" pt-5 container-menu">
        <div class="container">
            <div class="row">
                <div class="col-12 ml-5">
                    {!! Form::open(['action'=>'Front\MainController@index','method'=>'get']) !!}
                    <div class="searchContainer w-75 float-left ml-5 col-10" >
                        <i class="fa fa-search searchIcon"></i>
                        <input class="bg-gray searchBox form-control" type="search" name="name">
                    </div>
                    <button class="btn  mt-1 ml-2 col-1" type="submit"><i class="fa fa-search"></i></button>

                        {!! Form::close() !!}
                </div>
            </div>
            <div class="row pt-2 pb-1">
                @foreach($categories as $category)
                <div class="col-4 text-center">
                    {!! Form::open(['action'=>'Front\MainController@index','method'=>'get']) !!}

                    <input class=" form-control" type="hidden" name="category_id" value="{{$category->id}}">
                    <button type="submit" class="text-white border-0 bg-gray" style="background-color:#8cc540">
                        <i class="fab fa-pagelines"></i><br>
                        <span>{{$category->name}}</span>
                    </button>

                    {!! Form::close() !!}
                </div> @endforeach

            </div>
        </div>

    </section>

    <section class="container mt-2 filter card">
        <div class="row p-2">
            <div class="col-6">
                <a href="{{route('main')}}"><i class="fas fa-th-large mr-2"></i></a>
                <a href="{{route('index')}}"><i class="fas fa-th-list text-light-green"></i></a>


            </div>
            <div class="col-6 text-right">
                <a href="{{route('filter')}}"><i class="fas fa-filter mr-2"></i>
                    <span>فلتر</span></a>

            </div>
        </div>
    </section>

    @if(count($rows))
    <div id="" class="container mt-2 content">
        @foreach($rows as $row)
            <div class="card mb-2">
            <div class="row p-2">
               @if(auth('client-web')->user())
                    <div class="col-4">
                    <a href="#"><i class="fab fa-opencart"></i></a><br>
                    <form action="{{url('add-cart')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <input type="hidden" name="name" value="{{$row->name}}">
                        <input type="hidden" name="price" value="{{$row->price}}">
                        <button type="submit" class="btn bg-light-green mt-4">شراء الآن</button>
                    </form>
                    </div>

                   @else
                    <div class="col-4">
                        <a href="#"><i class="fab fa-opencart"></i></a><br>
                        <button class="btn bg-light-green mt-4 myBtn2"> شراء الآن</button>
                    </div>
                   @endif
                <div class="col-4 text-right">
                    <h5>{{$row->name}}</h5>
                    <small>
                        ريال
                        {{$row->price}}
                    </small><br>
                    <span class="ml-4">{{$row->wight}}</span>
                    <span class="text-light-green">{{$row->price}}ريال</span>
                </div>
                <div class="col-4 text-right">
                    <a href="{{url('favorite/'.$row->id)}}">
{{--                        {{dd()}}--}}
{{--                        {{dd(auth('client-web')->user()->products()->find($row->id))}}--}}
                        <i class="
                        @if(auth('client-web')->user()->products()->find($row->id))
                            fas
                        @else
                            far
                        @endif
                            fa-heart"></i>
                    </a>
                    <a href="{{route('details',$row->id)}}">
                    <img src="{{asset($row->image)}}" alt="" width="120">
                    </a>
                </div>
            </div>
        </div>
        @endforeach

{!! $rows->render() !!}

    </div>

    @else
        <div class="alert alert-danger text-center mt-5" role="alert">
            لا يوجد منتجات بهذا الاسم
        </div>
    @endif


@endsection
