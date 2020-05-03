@extends('front.app')
@include('front.header')
@section('content')
    <div class="container shopcart">
        <section class="d-flex justify-content-between mt-5 pl-4">
            <button type="button" class="btn" data-toggle="modal" data-target="#Modal">
                إفراغ السلة
            </button>
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            هل أنت متأكد
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn" data-dismiss="modal">إلغاء</button>
                            <a href="{{route('empty')}}" type="button" class="btn">متأكد </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @if (Cart::count() > 0)
                <label class="mt-2 pr-2"> عدد المنتجات : {{Cart::count()}} </label>
        </section>

        @foreach (Cart::content() as $item)
        <section class="text-center mt-5">
            <div class="card">
                <div class="row">
                    <div class="col-2">
                        <div class="card m-2 true">
                            <span class="pt-1 pb-1">&#10004;</span>
                        </div>
                        {{--<a href="{{url('remove/'.$item->rowId)}}" class="p-3">--}}
                            {{--<i class="fas fa-trash-alt text-dark"></i>--}}
                        {{--</a>--}}
                        <form action="{{url('remove/'.$item->rowId)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="border-0 btn-light"><i class="fas fa-trash-alt text-dark"></i></button>
                        </form>
                    </div>
                    <div class="col-5">
                        <div class="btn-group mr-2 mt-2">
                            <form action="{{url('update-quantity/'.$item->rowId)}}" method="get">
                                @csrf
                                {{--{{ method_field('patch') }}--}}
                                <select class="quantity" data-id="rowId " data-productQuantity="quantity " name="quantity">
                                    @for ($i = 1; $i <10 + 1 ; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }} >{{ $i }}</option>
                                    @endfor
                                </select>
                                <button type="submit" ><i class="fas fa-pencil-alt"></i></button>
                            </form>

                        </div>
                    </div>
                    <div class="col-5 d-flex justify-content-around">
                        <h5 class="pt-3">{{$item->name}}</h5>
                        <div class="img mt-2">
                            <img src="{{asset($item->model->image)}}" alt="" width="50" height="50" class="p-1">
                        </div>


                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <span>
                            السعر : {{$item->price}}  ر.س
                        </span>
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="col-6 mb-1">
                        <span>
                            الوزن :  {{$item->model->wight}}
                        </span>
                        <i class="fas fa-weight fa-2x ml-2"></i>
                    </div>
                </div>
            </div>
        </section>

        @endforeach
        <form method="get" action="{{route('addorder')}}">
        <section class="text-center mt-5">
            <div><p class="bg-success text-white pl-5 pr-5 pt-1 pb-1" >ر.س{{Cart::subtotal()}} المجموع الكلي</p></div>
        </section>
            <button type="submit" class="bg-success text-white pl-5 pr-5 pt-1 pb-1 w-100 border-0" style="margin-bottom: 70px">ارسال الطلب</button>
        </form>
    @else
        <section class="text-center mt-5">
            <label class="bg-red text-white pl-5 pr-5 pt-1 pb-1">لايوجد منتجات فى السلة</label>
        </section>
        @endif


    </div>
@endsection