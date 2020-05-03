@extends('admin.home')
@section('page')
    <a href="{{url(route('category.index'))}}">التصنيف</a>
@endsection
@section('page_title')
تعديل التصنيف
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
                {!!  Form::model($model,['action'=>['Admin\CategoryController@update',$model->id],
                'method'=>'PUT' ]) !!}
                    @csrf
                @include('admin.category.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
