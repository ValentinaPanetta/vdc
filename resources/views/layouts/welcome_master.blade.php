<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('includes.head')

</head>


<body>
    <div id="app">
        <main class="container-fluid">

            @include('includes.navbar')

            @yield('account')

            <div id="hero" class=" border border-alert">
                <img src="http://qnimate.com/wp-content/uploads/2014/03/images2.jpg" class="img-fluid w-100 " style="height: 40em; width: 100%;">
            </div>

            @yield('video')

            <div id="green" class=" row px-3">
                <div class="col-lg-4 p-3">
                    <div class="border border-success" style="height: 20em;">
                        <h2 class="text-success">Intro consulting</h2>
                    </div>
                </div>
                <div class="col-lg-4 p-3">
                    <div class="border border-success" style="height: 20em;">
                        <h2 class="text-success">Intro courses</h2>
                    </div>
                </div>

                <div class="col-lg-4 p-3">
                    <div class="border border-success" style="height: 20em;">
                        <h2 class="text-success">Intro career</h2>
                    </div>
                </div>

            </div>


            <div id="references" class="w-100 border border-danger" style="height: 20em;">
                <h2 class="text-danger text-center">references</h2>
            </div>
            <div id="blog" class="w-100 border border-primary my-3" style="height: 20em;">
                <h2 class="text-primary text-center">blog</h2>
            </div>
            <div id="partners" class="w-100 border border-info " style="height: 20em;">
                <h2 class="text-info text-center">partners</h2>
            </div>

        
            @include('includes.footer')
        </main>
    </div>
    
</body>
</html>
