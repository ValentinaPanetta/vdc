<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('includes.head')

</head>


<body>
    <div id="app">
        <main id="main" class="container-fluid">

            @include('includes.navbar')

            

            <div id="hero" class="h-100 ">
                <div class="sub-hero">
                    <img src="/backgrounds/sub-hero1.jpg" class="img-fluid w-100 my-3" style="
                    width: 100%;
                    opacity: 0.9;">
           
                    <div class="divoverimg t-shadow text-white ">
                       <h1 class=" text-center overimg">Start your new career now</h1>
                       <h3>Education can change your life</h3>
                       <h2 class=""><a href="{{ url('about') }}">Boarding at any time</a></h2>
                    </div>
                
                </div>

                 <div class="sub-hero">
                    <img src="/backgrounds/sub-hero2.jpg" class="img-fluid w-100 my-3" style="
                    width: 100%;
                    opacity: 0.9;">
           
                    <div class="divoverimg t-shadow text-white ">
                       <h1 class=" text-center overimg">Test: Which course is my match?</h1>
                       <!-- <h3>Consultings</h3> -->
                       <h2 class=""><a class="text-white" href="{{ url('courses') }}">See all courses</a></h2>
                    </div>
                
                </div>

                 <div class="sub-hero">
                    <img src="/backgrounds/sub-hero3.jpg" class="img-fluid w-100 my-3" style="
                    width: 100%;
                    opacity: 0.9;">
           
                    <div class="divoverimg t-shadow text-white ">
                       <h1 class=" text-center overimg">Free individual support by your VDC coach</h1>
                       <h3><a class="text-white" href="{{ url('#') }}">Call the VDC Coach</a></h3>
                       <h2 class=""><a class="text-white" href="{{ url('contact') }}">Send a Message</a></h2>
                    </div>
                
                </div>
               
                    
            </div>
            @yield('account')
            @yield('video')



            <div id="references" class="w-100 shadow rounded" >
                <h1 class="text-white text-center p-4">References</h1>
                <div class="row ">
                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img1.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center  my-5">Lorem Ipsum</h3>
                            <p class="text-white p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>

                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img2.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center my-5">Lorem Ipsum</h3>
                            <p class="text-white p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>

                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img3.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center   my-5">Lorem Ipsum</h3>
                            <p  class="text-white  p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div id="blog" class="w-100 shadow my-5 rounded">
                <a class="text-white" href="{{ url('blog') }}">
                    <h1 class="text-white text-center p-4">Latest Posts</h1>
                </a>
                <div class="row">
                    @foreach ($post as $post)
                        <div class="p-3 col-lg-4 ">
                            <div class="bg-light-c p-2">
                                <a href="{{ url('/blog/'.$post->id) }}">
                                    <h3 class="text-center  my-5">{{ $post->title }}</h3>
                                </a>
                                @if ($post->image != null)
                                <div class="text-center">
                                    <img class=" img-fluid rounded shadow " src="{{ $post->image}}" style="max-height: 17em;">
                                </div>
                                @else
                                    <h1 class="virgolette text-center p-2 m-3">#</h1>
                                @endif
                                <p class="text-white p-3">
                             "{{ str_limit($post->content, $limit = 160, $end = '...') }}"
                                </p>
                                    
                            </div>
                        </div>
                    @endforeach
              
                </div>  <!-- Row                   ends here -->
            </div>
            
            <!-- Parntner Companies Slideshow -->
            <div class="w-100 my-3 slideshow-cont">
                <div class="mySlides" id="slide_1">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                        <a class="py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/bfi1.png">
                            </div>
                        </a>
                    </div>                       
                </div>

                <div class="mySlides" id="slide_2">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/waff.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                    </div>                        
                </div>

                <div class="mySlides" id="slide_3">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/waff.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                    </div>                   
                </div>
                <a class="prev"><i class="fas fa-chevron-left"></i></a>
                <a class="next"><i class="fas fa-chevron-right"></i></a> 
            </div>

            @include('includes.footer')
        </main>


    </div>
    
</body>
</html>
