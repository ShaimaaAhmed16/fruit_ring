@extends('admin.home')
@section('page_title')
    عرض الستخدم
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!!  Form::open(['action'=>['Admin\ClientController@show',$record->id],'method'=>'put']) !!}
                <div class="row ">
                    <div class="col-12   order-md-first mt-3 mt-md-0 ">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->full_name}}</p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            :  الاسم بالكامل
                                        </p>
                                    </div>

                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->phone}}</p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            :  رقم الهاتف
                                        </p>
                                    </div>

                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->email}}</p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold ">
                                            :  البريد الالكتروني
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-9">
                                        @if($record->image)
                                            <p class="m-0"><img  style="height: 100px;width: 100px;" src="{{asset($record->image)}}" ></p>
                                        @else
                                            <p class="m-0">لايوجد صوره</p>
                                        @endif

                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold ">
                                            :  صوره المستخدم
                                        </p>
                                    </div>

                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row ">
                                    <div class="col-12 col-md-9 ">
                                        <p class="m-0">{{$record->address}}</p>
                                    </div> <div class="col-12 col-md-3  text-right">
                                        <p class="m-0 font-weight-bold ">
                                            : العنوان
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
