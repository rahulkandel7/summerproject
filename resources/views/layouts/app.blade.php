<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="ipbdrl3wwnqx1jxml1p56t4s9ny243" />

        <title>Homie Nepal</title>

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!--Font Awesome  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>

        <!-- Wow css -->
        <link rel="stylesheet" href="{{ asset('css/wow/animate.css') }}">

        @yield('css')

        <style>
            #loading{
                position:fixed;
                width: 100%;
                height: 100vh;
                background: rgb(249, 250, 251);
                z-index: 9999999;
            }
            .facebook:hover{
                color:#4267B2;
            }

            .instagram:hover{
                color:#8a3ab9;
            }
        </style>


    </head>
    <body class="antialiased bg-gray-50" style="font-family: 'Poppins',serif" >

        <div id="loading">
            <center class="mt-56 animate-pulse">
                <img id="myImage" src="{{ asset('images/LOGO.svg') }}" class="w-96">
            </center>
        </div>
        @if (Session::has('sucess'))
        <div class="w-6/12 rounded-lg absolute right-0 top-4 bg-green-600 text-white px-3 py-2 wow fadeIn hidee" data-wow-delay="2s">
            {{ Session::get('sucess') }}
        </div>
        @endif

        <nav class=" flex flex-wrap items-center justify-between w-11/12 mx-auto py-4 md:py-0 px-4 text-lg text-gray-700 ">
            <div class="mt-2">
                <a href="{{ route('home') }}">
                    <img src="{{asset('images/LOGO.svg')}}" class="w-24">
                </a>
            </div>
        
            <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block" fill="none"        viewBox="0 0 24 24" stroke="currentColor" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        
            <div class="hidden w-full md:flex md:items-center md:w-auto menu">
                <ul
                    class=" pt-4 text-base text-gray-700 md:flex md:justify-between md:items-center md:pt-0">
                    <li>
                    <a class="md:p-4 py-2 block hover:text-primary {{  request()->routeIs('home') ? 'text-primary font-semibold' : 'text-teritory' }}" href="{{ route('home') }}"
                        >Home</a
                    >
                    </li>

                    

                    @auth
                            @if (Auth::user()->type == "landlord")
                            <li x-data="{isOpen:false}">
                                <div class=" inline-block relative ">
                                    <button class=" md:p-4 py-2 hover:text-primary {{  request()->routeIs('tenant') ? 'text-primary font-semibold' : 'text-teritory' }} {{  request()->routeIs('landlord') ? 'text-primary font-semibold' : 'text-teritory' }}  md:px-4 rounded inline-flex items-center" @click="isOpen= !isOpen" @click.away = "isOpen= false">
                                    <span class="mr-1">Services</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class=" absolute text-gray-700 pt-1 shadow-lg w-72 z-50" x-show="isOpen" 
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        >
                                        
                                        <li >
                                            <a class="rounded-b hover:bg-gray-100 {{ request()->routeIs('landlord') ? 'bg-gray-100' : 'bg-white' }}  text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('landlord') }}" >
                                                <p class="font-semibold text-primary">
                                                Rent Out Your Place<span class="italic text-xs pl-2">(For Landlord)</span>
                                                </p>
                                                <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                                    Why Homie Nepal To Rent Your Place
                                                </p>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (Auth::user()->type == "tenant")
                            <li x-data="{isOpen:false}">
                                <div class=" inline-block relative ">
                                    <button class=" md:p-4 py-2 hover:text-primary {{  request()->routeIs('tenant') ? 'text-primary font-semibold' : 'text-teritory' }} {{  request()->routeIs('landlord') ? 'text-primary font-semibold' : 'text-teritory' }}  md:px-4 rounded inline-flex items-center" @click="isOpen= !isOpen" @click.away = "isOpen= false">
                                    <span class="mr-1">Services</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class=" absolute text-gray-700 pt-1 shadow-lg w-72 z-50" x-show="isOpen" 
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        >
                                        <li>
                                        <a class="rounded-t hover:bg-gray-100 {{ request()->routeIs('tenant') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('tenant') }}" >
                                            <p class="font-semibold text-primary">
                                                Find a Place to Rent<span class="italic text-xs pl-2">(For Tenant)</span>
                                            </p>
                                            <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                                Why Homie Nepal To Find a Place To Rent
                                            </p>
                                        </a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endauth

                    @guest
                        <li x-data="{isOpen:false}">
                            <div class=" inline-block relative ">
                                <button class=" md:p-4 py-2 hover:text-primary {{  request()->routeIs('tenant') ? 'text-primary font-semibold' : 'text-teritory' }} {{  request()->routeIs('landlord') ? 'text-primary font-semibold' : 'text-teritory' }}  md:px-4 rounded inline-flex items-center" @click="isOpen= !isOpen" @click.away = "isOpen= false">
                                <span class="mr-1">Services</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                </button>
                                <ul class=" absolute text-gray-700 pt-1 shadow-lg w-72 z-50" x-show="isOpen" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90"
                                    >
                                    <li>
                                    <a class="rounded-t hover:bg-gray-100 {{ request()->routeIs('tenant') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('tenant') }}" >
                                        <p class="font-semibold text-primary">
                                            Find a Place to Rent<span class="italic text-xs pl-2">(For Tenant)</span>
                                        </p>
                                        <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                            Why Homie Nepal To Find a Place To Rent
                                        </p>
                                    </a>
                                    </li>
                                    <li >
                                        <a class="rounded-b hover:bg-gray-100 {{ request()->routeIs('landlord') ? 'bg-gray-100' : 'bg-white' }}  text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('landlord') }}" >
                                            <p class="font-semibold text-primary">
                                            Rent Out Your Place<span class="italic text-xs pl-2">(For Landlord)</span>
                                            </p>
                                            <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                                Why Homie Nepal To Rent Your Place
                                            </p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                    @endguest

                    <li x-data="{isOpen:false}">
                        <div class=" inline-block relative ">
                            <button class=" md:p-4 py-2 hover:text-primary {{  request()->routeIs('tfaq') ? 'text-primary font-semibold' : 'text-teritory' }} {{  request()->routeIs('lfaq') ? 'text-primary font-semibold' : 'text-teritory' }}  md:px-4 rounded inline-flex items-center" @click="isOpen= !isOpen" @click.away = "isOpen= false">
                            <span class="mr-1">FAQ's</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                            </button>
                            <ul class=" absolute text-gray-700 pt-1 shadow-lg w-72 z-50" x-show="isOpen" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                >
                                <li>
                                <a class="rounded-t hover:bg-gray-100 {{ request()->routeIs('tfaq') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('tfaq') }}" >
                                    <p class="font-semibold text-primary">
                                        Tenant
                                    </p>
                                    <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                        Our Tenant FAQ's
                                    </p>
                                </a>
                                </li>
                                <li >
                                    <a class="rounded-b hover:bg-gray-100 {{ request()->routeIs('lfaq') ? 'bg-gray-100' : 'bg-white' }}  text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('lfaq') }}" >
                                        <p class="font-semibold text-primary">
                                        Landlord
                                        </p>
                                        <p class="font-sm text-gray-500 " style="font-size: .8rem">
                                        Our Landlord FAQ's
                                        </p>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li>
                    <a
                        class="md:p-4 py-2 block hover:text-primary {{  request()->routeIs('blog') ? 'text-primary font-semibold' : 'text-teritory' }}"
                        href="{{ route('blog') }}"
                        >Blogs</a
                    >
                    </li>

                    @auth
                        @if(Auth::user()->type == 'admin')
                        
                            <li>
                                <a
                                    class="md:p-4 py-2 block hover:text-primary {{  request()->routeIs('dashboard') ? 'text-primary font-semibold' : 'text-teritory' }}"
                                    href="{{ route('dashboard') }}"
                                    >Dashboard</a
                                >
                                </li>
                        @endif
                    @endauth
                    

                    {{-- <li>
                        <a class="border-secondary md:px-4 md:py-1 py-1 block md:mt-3 text-sm border rounded-full hover:border-0 hover:bg-secondary hover:text-white text-center">For Landlord</a>
                    </li> --}}
                    @auth
                        {{-- <li>
                            <a
                            class="md:p-4 py-2 block hover:text-primary {{  request()->routeIs('login') ? 'text-primary font-semibold' : 'text-teritory' }} text-xl"
                            href="">
                            {{-- <i class="fas fa-heart"></i> --}}
                            {{-- <i class="far fa-heart"></i>
                            </a>
                        </li>  --}}

                        <li x-data="{isOpen:false}">
                            <div class=" inline-block relative ">
                                <p class="md:p-4 py-2 block text-xl" @click="isOpen= !isOpen" @click.away = "isOpen= false">
                                    <img src="/storage/{{Auth::user()->photo}}" class="w-12 h-12 rounded-full">
                                </p>
                                <ul class=" absolute text-gray-700 pt-1 shadow-lg w-56 md:right-1" x-show="isOpen" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90"
                                    >
                                    <li>
                                      <a class="rounded-t hover:bg-gray-100 {{ request()->routeIs('userview') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('userview',Auth::user()->id) }}" >
                                          <p class="font-semibold text-primary">
                                            <i class="fas fa-user mr-2"></i> Profile
                                          </p>
                                          
                                      </a>
                                    </li>

                                    @if (Auth::user()->type == 'landlord')
                                        <li>
                                            <a class=" hover:bg-gray-100 {{ request()->routeIs('listings.index') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('listings.index') }}" >
                                                <p class="font-semibold text-primary">
                                                    <i class="fas fa-house-user mr-2"></i> My Listings
                                                </p>
                                            </a>
                                        </li>

                                        <li>
                                            <a class=" hover:bg-gray-100 {{ request()->routeIs('listings.create') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('listings.create') }}" >
                                                <p class="font-semibold text-primary">
                                                    <i class="fas fa-plus-circle mr-2"></i> Add Listings
                                                </p>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- <li>
                                        <a class=" hover:bg-gray-100 {{ request()->routeIs('tfaq') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap" href="{{ route('tfaq') }}" >
                                            <p class="font-semibold text-primary">
                                                <i class="fas fa-heart mr-2"></i> Favroites
                                            </p>
                                            
                                        </a>
                                    </li> --}}
                                    @if (Auth::user()->type != 'admin')
                                        <li class="cursor-pointer">
                                            <a class="rounded-b hover:bg-gray-100 {{ request()->routeIs('convert.store') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap"  >
                                                <p class="font-semibold text-primary">
                                                    <form action="{{ route('convert.store') }}" method="POST" class="inline-block">
                                                        @csrf
                                                        <i class="fas fa-toggle-off mr-2 inline-block"></i> 
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        <input type="submit" value="Switch Account" class="bg-transparent font-semibold text-primary cursor-pointer">
                                                    </form>
                                                </p>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="cursor-pointer">
                                        <a class="rounded-b hover:bg-gray-100 {{ request()->routeIs('logout') ? 'bg-gray-100' : 'bg-white' }} text-primary py-2 px-4 block whitespace-no-wrap"  >
                                            <p class="font-semibold text-primary">
                                                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <i class="fas fa-sign-out-alt mr-2 inline-block"></i> 
                                                    <input type="submit" value="logout" class="bg-transparent font-semibold text-primary cursor-pointer">
                                                </form>
                                            </p>
                                            
                                        </a>
                                      </li>
                                    
                                </ul>
                              </div>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a
                            class="md:p-4 py-2 block hover:text-primary {{  request()->routeIs('login') ? 'text-primary font-semibold' : 'text-teritory' }}"
                            href="{{ route('login') }}"
                            >Login</a>                        
                        </li>
                    @endguest

                    {{-- <li>
                        <a
                            class="md:p-4 py-2 block hover:text-primary "
                            href="#"
                            >I am LandLord</a
                        >
                    </li> --}}
                    
                </ul>
            </div> 
        </nav>
  
        @yield('main')

        <footer>
            <div class="w-full bg-primary">
                <div class="w-11/12 grid mx-auto grid-cols-1 md:grid-cols-3 lg:grid-cols-5">
                    <div class="py-4">
                        <div class="lg:flex lg:justify-center lg:items-center">
                            <div class=" rounded-lg bg-white p-2 w-20  ">
                                <img src="{{asset('images/LOGO.svg')}}" class="md:w-20">
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm pt-2 lg:text-center">
                            Gaindakot-2, Nawalpur
                        </p>
                        <p class="text-gray-300 text-sm pt-1 lg:text-center">
                            +977-9745374282
                        </p>
                        <p class="text-gray-300 text-sm pt-1 lg:text-center">
                            homienepal@gmail.com
                        </p>
                    </div>

                    <div class="py-4">
                        <h3 class="text-white font-extrabold text-xl mt-2">Homie Nepal</h3>
                        <ul class="text-white font-light text-sm mt-3">
                            {{-- <li>
                                <a href="" class="hover:text-secondary">Carrers</a>
                            </li> --}}
                            <li class="mt-2">
                                <a href="" class="hover:text-secondary">Terms & Conditions</a>
                            </li>
                            <li class="mt-2">
                                <a href="{{ route('work') }}" class="hover:text-secondary">How Homie Nepal Work</a>
                            </li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h3 class="text-white font-extrabold text-xl mt-2">Tenant</h3>
                        <ul class="text-white font-light text-sm mt-3">
                            <li>
                                <a href="{{ route('howtorent') }}" class="hover:text-secondary">How To Rent</a>
                            </li>
                            <li class="mt-2">
                                <a href="{{ route('tfaq') }}" class="hover:text-secondary">FAQ's</a>
                            </li>
                            <li class="mt-2">
                                <a href="{{ route('blog') }}" class="hover:text-secondary">Blogs</a>
                            </li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h3 class="text-white font-extrabold text-xl mt-2">LandLord</h3>
                        <ul class="text-white font-light text-sm mt-3">
                            <li>
                                <a href="{{ route('howtorentout') }}" class="hover:text-secondary">How To Rent Out</a>
                            </li>
                            <li class="mt-2">
                                <a href="{{ route('lfaq') }}" class="hover:text-secondary">FAQ's</a>
                            </li>
                            <li class="mt-2">
                                <a href="" class="hover:text-secondary">Help Center</a>
                            </li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h3 class="text-white font-extrabold text-xl mt-2">Support</h3>
                        <ul class="text-white font-light text-sm mt-3">
                            <li class="mt-2">
                                <a href="{{ route('contact') }}" class="hover:text-secondary">Contact Us</a>
                            </li>

                            <li class="text-xl">
                                <a href="https://www.facebook.com/HomieeNepal/"><i class="fab fa-facebook mt-3  facebook"></i></a>

                                <a href="https://www.instagram.com/homienepal"><i class="fab fa-instagram mt-3 ml-3 instagram"></i></a>
                            </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </footer>
  
  

    @yield('js')

       <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
        <script>
            setTimeout('document.getElementById("loading").style.display="none"', 2000);  // 2 seconds
        </script>
        <script>
        const button = document.querySelector('#menu-button');
        const menu = document.querySelector('.menu');


        button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        });

            $(function(){
            setTimeout(function(){
                $(".hidee").fadeOut(1000);}, 4000);
            });
    </script>

    <!-- Wow js -->
    <script src="{{ asset('js/wow/wow.min.js') }}"></script>

    <script>

        wow = new WOW(
        {
            animateClass: 'animated',
            offset:       0,
            callback:     function(box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
        );
        wow.init();
        
    
    </script>

    </body>
</html>
