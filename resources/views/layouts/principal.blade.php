<!doctype <!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>@yield('pageTitle')</title>
</head>
<body style="background-color: #5d90ff;">
    <ul>
        <li style="float:right"><a class="active" href="#about">Cerrar sessión</a></li>
    </ul>
    <!-- 
    <nav class="navbar navbar-default container">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">En</a></li>
            <li><a href="#">Es</a></li>
          </ul>
        </div>
      </div>
    </nav>
 
    <div class="jumbotron container">
        <p>{{ trans('welcome.home') }}</p>
    </div>
    -->
    @yield('content')
</body>
</html>