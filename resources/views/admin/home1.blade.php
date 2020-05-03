@inject('client','App\Models\Client')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>الثمار الوطنيه جده</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('Admin')}}">
    {{--<!-- Ionicons --><link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">--}}

    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700 ')}}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block " >
                <a href="{{url('/home')}}" class="nav-link"><i class="fa fa-home"></i>الرئسيه</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-3 " >
                <!-- user login dropdown start-->
                <li class="dropdown  mr-5" >
                    <ul data-toggle="dropdown" class="dropdown-toggle " href="#"  >

                            {{--<img src="{{asset($client->image)}}" class="img-circle " alt="image" style="width: 30px;height: 30px">--}}

                        <span class="username">{{auth()->guard('web')->user()->name}}</span>
                        <b class="caret"></b>
                    </ul>
                    <ul class="dropdown-menu extended logout text-center mr-1">
                        <li><a href="#"><i class="fa fa-key"></i>تعديل كلمه السر</a></li><hr>
                        <li><a href="{{route('logout.admin')}}"><i class="fa fa-arrow"></i>تسجيل خروج</a></li><hr>
                    </ul>
                </li>

            </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('front/images/tt.png')}}"  width="50"
                 alt="Logo"
                 class="brand-image img-circle elevation-3" >
            <span class="brand-text font-weight-light">الثمار الوطنيه جده</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{--<div class="image">--}}
                    {{--<img src="{{asset($client->image)}}" class="img-circle " alt="Image">--}}
                {{--</div>--}}
                <div class="info">
                    <a href="#" class="d-block">{{auth()->guard('web')->user()->name}}</a>
                </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <div class="btn-group">
                        <p type="button" class="btn btn-light dropdown-toggle text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            مستخدمين
                        </p>
                        <div class="dropdown-menu">
                            <a href="{{url('client')}}"  class="dropdown-item"><i class="fa fa-key"></i>عرض المستخدمين</a>
                            <a href="{{url(route('client.create'))}}" class="dropdown-item"><i class="fa fa-key"></i>اضافه مستخدم</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <p type="button" class="btn btn-light dropdown-toggle text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            التصنيف
                        </p>
                        <div class="dropdown-menu">
                            <a href="{{route('category.index')}}"  class="dropdown-item"><i class="fa fa-key"></i>عرض التصنيف</a>
                            <a href="{{route('category.create')}}" class="dropdown-item"><i class="fa fa-key"></i>اضافه التصنيف</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <p type="button" class="btn btn-light dropdown-toggle text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        منتجات
                        </p>
                        <div class="dropdown-menu">
                            <a href="{{route('product.index')}}"  class="dropdown-item"><i class="fa fa-key"></i>عرض المنتجات</a>
                            <a href="{{route('product.create')}}" class="dropdown-item"><i class="fa fa-key"></i>اضافه منتج</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <p type="button" class="btn btn-light dropdown-toggle text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            بيانات التواصل
                        </p>
                        <div class="dropdown-menu">
                            <a href="{{route('link.index')}}"  class="dropdown-item"><i class="fa fa-key"></i>عرض بيانات التواصل</a>
                            <a href="{{route('link.create')}}" class="dropdown-item"><i class="fa fa-key"></i>اضافه بيانات التواصل</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <p type="button" class="btn btn-light dropdown-toggle text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            التواصل بنا
                        </p>
                        <div class="dropdown-menu">
                            <a href="{{route('contact.index')}}"  class="dropdown-item"><i class="fa fa-key"></i>عرض رسائل التواصل بنا</a>

                        </div>
                    </div>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 ">
                      <h1 class="float-left mr-1"></i>@yield('page')</h1>
                       <p class="mt-1">@yield('small_title')</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active ">@yield('page_title')</li>
                            <li class="breadcrumb-item active"> </i>@yield('page')</li>
                            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="fa fa-home"></i>الرئسيه</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->
            @yield('content')
        <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('Admin')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="{{asset('admin/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<script src="{{asset('js/lightbox.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

@stack('scripts')
<script>
    function printData()
    {
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('button').on('click',function(){
        printData();
    })
</script>
</body>
</html>
