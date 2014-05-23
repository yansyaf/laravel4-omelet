<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
 
	<title>
		@section('title')
			Omelet :: 
		@show
	</title>	

	@section('header')	    
	    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
	    <!-- {{ HTML::style('css/main.css')}} -->
	@show

</head>
 
<body>
	@section('navbar')
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Laravel-4-Omelet</a>
	        </div>
	    <div class="navbar-collapse collapse">
	      <ul class="nav navbar-nav">
	        <li class="active">{{ HTML::link('/', 'Home') }}</li>
            @if (Auth::check() && Auth::user()->hasRole('Admin'))
            <li><a href="{{{ URL::to('admin') }}}">Administration</a></li>
            @endif	        
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
    		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>{{{ Auth::user()->username }}}</strong></a>
    			<ul class="dropdown-menu">                    
                    <li><a href="{{{ URL::to('user') }}}">My Profile</a></li>
                    <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                </ul>
            </li>
            @else
            <li>{{ HTML::link('user/create', 'Create') }}</li>   
            <li>{{ HTML::link('user/login', 'Login') }}</li>
	        @endif
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</div>
	@show

	<div class="container" style="margin-top: 40px;">
		@yield('content')
	</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

</body>

</html>