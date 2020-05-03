@extends('admin.home')
@section('page_title')
   عرض منتجات
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <a href="{{url(route('product.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافه منتج جديد</a>

                <div class="mt-3 text-right">
                    @include('flash::message')
                </div>

                @if(count($records))
                    <div class="row">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>الاسم</th>
                                   <th>السعر</th>
                                   <th>اسم المستخدم</th>
                                   <th>عرض</th>
                                   <th>حاله الطلب</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->name}}</th>
                                        <th>{{$record->total}}</th>
                                        <th>{{optional($record->client)->name}}</th>
                                        <th> <a href="{{url(route('order.show',$record->id))}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                        </th>
                                        <th>
                                            @if($record->status == 0)
                                                <a href="order/{{$record->id}}/active" class="btn btn-danger btn-xs">منتظر</a>
                                            @else
                                                <a href="order/{{$record->id}}/deactive" class="btn btn-success btn-xs" >مفعل</a>
                                            @endif
                                        </th >
                                        <th>
                                            {!! Form::open(['action'=>['Admin\OrderController@destroy',$record->id],'method'=>'delete']) !!}
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        No data
                    </div>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
