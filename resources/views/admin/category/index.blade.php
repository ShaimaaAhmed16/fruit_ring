@extends('admin.home')
@section('page_title')
    التصنيف
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <a href="{{url(route('category.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافه التصنيف</a>

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
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->name}}</th>
                                        <th>
                                            <a href="{{url(route('category.edit',$record->id))}}" class="btn btn-primary btn-xs" alt="تعديل التصنيف"><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                            {!! Form::open(['action'=>['Admin\CategoryController@destroy',$record->id],'method'=>'delete']) !!}
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
