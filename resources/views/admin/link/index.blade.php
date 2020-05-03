@extends('admin.home')
@section('page_title')
    بيانات التواصل
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="row margin-bottom">
                <div class="col-sm-6 ">
                    <a href="{{url(route('link.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافه بيانات التواصل</a>
                </div>
            </div>
            <div class="card-body">

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
                                   <th>رقم التلفون</th>
                                   <th>البريد</th>
                                   <th>رقم الواتس</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->name}}</th>
                                        <th>{{$record->phon}}</th>
                                        <th>{{$record->email}}</th>
                                        <th>
                                            {{$record->watsUp}}
                                        </th>
                                        <th>
                                            <a href="{{url(route('link.edit',$record->id))}}" class="btn btn-primary btn-xs" alt="تعديل "><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                            {!! Form::open(['action'=>['Admin\LinkController@destroy',$record->id],'method'=>'delete']) !!}
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
