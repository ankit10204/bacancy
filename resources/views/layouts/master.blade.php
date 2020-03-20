<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bacany</title>
    <link href="{{ asset('./css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
     
	  @if(auth()->user())
	    @include('partials.header')
	  @endif

	 <div class="container-fluid" style="margin-bottom: 30px;">
       <div class="row"> 

         @yield('content')
       </div>
     </div>

  <script src="{{ asset('./js/app.js') }}" rel="stylesheet" />
  @yield('scripts')
  
  <script type="text/javascript">
  	setTimeout(function(){
  		$('.alert').hide();
  	},3000)
  </script>
    
</body>
</html>







