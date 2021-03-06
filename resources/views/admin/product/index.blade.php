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
                <div style="margin-bottom: 10px">
                     <a href="{{url(route('product.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافه منتج جديد</a>
                </div>
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
                                   <th>الوزن</th>
                                   <th>التصنيف</th>
                                   <th>صوره المنتج</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->name}}</th>
                                        <th>{{$record->price}}</th>
                                        <th>{{$record->wight}}</th>
                                        <th>{{optional($record->category)->name}}</th>
                                        <th><img src="{{asset($record->image)}}" width="60" height="60"></th>
                                        <th>
                                            <a href="{{url(route('product.edit',$record->id))}}" class="btn btn-warning btn-xs" alt="تعديل المنتج"><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                            <button class="btn btn-danger" data-catid={{$record->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                            {{--{!! Form::open(['action'=>['Admin\ProductController@destroy',$record->id],'method'=>'delete']) !!}--}}
                                            {{--<button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>--}}
                                            {{--{!! Form::close() !!}--}}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center" id="myModalLabel">تاكيد الحذف</h4>
                                    </div>
                                    {!! Form::open(['action'=>['Admin\ProductController@destroy',$record->id],'method'=>'delete']) !!}
                                    <div class="modal-body">
                                        <p class="text-center">
                                            هل انت متاكد من الحذف؟
                                        </p>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">لا</button>
                                        <button type="submit" class="btn btn-warning">نعم,حذف</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        لايوجد بيانات
                    </div>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>


@endsection
