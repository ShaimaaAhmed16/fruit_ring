@extends('admin.home')
@inject('model','App\Models\Client')
@section('page_title')
    عرض المستخدمين
@endsection
@section('content')
    <!-- Main content -->
    <section class="content ">
        <!-- Default box -->
        <div class="card">
            <div class="row margin-bottom">
                <div class="col-sm-6 ">
                    <a href="{{url(route('client.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافه مستخدم جديد</a>

                </div>
                <div class="text-right col-sm-6">
                    {!! Form::open(['action'=>'Admin\ClientController@index','method'=>'get']) !!}
                    <input type="text" name="name" placeholder="الاسم" class="text-right">
                    <button class="btn btn-primary " type="submit"><i class="fa fa-search"></i> بحث</button>
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="card-body ">
                <div class="mt-3 text-right">
                    @include('flash::message')
                </div>
                @if(count($records))
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>الاسم</th>
                                   <th>رقم الهاتف</th>
                                   <th>البريد</th>
                                   <th>الصوره</th>
                                   <th>عرض</th>
                                   <th>الحاله</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr id="removable{{$record->id}}">
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->full_name}}</th>
                                        <th>{{$record->phone}}</th>
                                        <th>{{$record->email}}</th>
                                        <th>
                                            @if($record->image)
                                            <img  style="height: 70px;width: 70px;" src="{{asset($record->image)}}" >
                                             @else
                                            <span>لايوجد صوره</span>
                                                @endif
                                        </th>
                                        <th> <a href="{{url(route('client.show',$record->id))}}" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                                        </th>
                                        <th>
                                            @if($record->status == 0)
                                                <a href="client/{{$record->id}}/active" class="btn btn-danger btn-xs">منتظر</a>
                                                @else
                                                <a href="client/{{$record->id}}/deactive" class="btn btn-success btn-xs" >مفعل</a>
                                                @endif
                                        </th >
                                        <th>
                                            <a href="{{url(route('client.edit',$record->id))}}" class="btn btn-primary btn-xs" alt="تعديل المنتج"><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                    {{--<a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>--}}
                                            {!! Form::open(['action'=>['Admin\ClientController@destroy',$record->id],'method'=>'delete']) !!}

                                            <button class="btn btn-danger btn-xs destroy"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        لا يوجد مستخدم بهذا الاسم
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
