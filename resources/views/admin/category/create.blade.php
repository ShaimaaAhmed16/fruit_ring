@extends('admin.home')
@inject('model','App\Models\Category')
@section('page')
    <a href="{{url(route('product.index'))}}">التصنيف</a>
    @endsection
@section('page_title')
   اضافه التصنيف
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
               {!!  Form::model($model,['action'=>'Admin\CategoryController@store',
               'method' => 'post']) !!}


                    @include('admin.category.form')

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
