@extends('admin.home')
@section('page')
    <a href="{{url(route('link.index'))}}">بيانات التواصل</a>
@endsection
@section('page_title')
تعديل بيانات التواصل
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">

            <div class="card-body text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                {!!  Form::model($model,['action'=>['Admin\LinkController@update',$model->id],'method'=>'PUT',
                'files' =>true
                ]) !!}
                    @csrf
                @include('admin.link.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
