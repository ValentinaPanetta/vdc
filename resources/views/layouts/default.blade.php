<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>


<body>
    <div id="app">
        <main id="main" class="container-fluid">
        	@include('includes.navbar')
			
				@yield('content')
			
			

			

		 @include('includes.footer')
        </main>
       
    </div>
    
</body>
</html>