@extends('admin.home')
@section('page_title')
   تواصل معنا
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
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
                                   <th>رقم الهاتف</th>
                                   <th>البريد</th>
                                   <th>الرساله المرسله</th>
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
                                            {{$record->message}}
                                        </th>
                                        <th>
                                            {!! Form::open(['action'=>['Admin\ContactController@destroy',$record->id],'method'=>'delete']) !!}
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
