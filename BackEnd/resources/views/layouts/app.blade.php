<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="http://0.0.0.0:5173/resources/js/preview.js"></script>

    <!-- Scripts -->

    @vite(['resources/css/chat.css', 'resources/css/dashboard.css','resources/css/reqpickup.css','resources/css/pickuphistory.css', 'resources/css/account.css','resources/sass/app.scss','resources/js/app.js','resources/css/custom.css'])
</head>
<body>
    <div id="app">
        @guest
            <nav class="navbar navbar-expand-md navbar-light bg-white auth-nav">
                <a class="clean-text" href="/"><p class="bi bi-arrow-left back-button"><span class="back-text">Back</span></p></a>
            </nav>
            <main class="py-4 bg-auth fullscreen">
                @yield('content')
            </main>
        @else
            <main class="py-4 dashboard-bg fullscreen">
                <div class="c_home-frame10">
                    <div class="row">
                        <div class="col-sm-2">
                            <!-- sidenav -->
                            <div class="c_home-frame11 sidenav">
                                <div class="c_home-frame12">
                                    <img src="{{url('/side-nav-img/a73b3fd065ddf5e12e342e654b7003da.svg')}}" alt="ellipse" width="50" height="50" class="c_home-ellipse"/>
                                    <div class="c_home-text100">
                                        <p class="c_home-text101">B3Transporter</p>
                                    </div>
                                </div>
                                <div class="c_home-frame13">
                                    <div class="c_home-frame14">
                                        <div class="c_home-frame15">
                                            <div class="c_home-text102">
                                                <p class="c_home-text103">Menu</p>
                                            </div>
                                        </div>
                                        
                                        <div class="c_home-frame16">
                                            @if ($data[4]== 'dashboard')
                                            <a href="/dashboard" class="c_home-frame18 clean-text-only active">
                                            @else
                                            <a href="/dashboard" class="c_home-frame18 clean-text-only">
                                            @endif
                                                <img
                                                    src="{{url('/side-nav-img/09b26093ea34dd521ef7f9fbd62cef47.svg')}}" alt="instance" class="c_home-instance11 icon-side-nav"
                                                />
                                                <div class="c_home-text106">
                                                    <p class="c_home-text107">Dashboard</p>
                                                </div>
                                            </a>
                                            @if($data[0]->role == 'admin')
                                                @if ($data[4]== 'newrequest') 
                                                <a href="/newrequest" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/newrequest" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/e862f2227b23983ae87ee9bbcba82f8f.svg')}}" alt="instance" class="c_home-instance11 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">Pickup List</p>
                                                    </div>
                                                </a>
                                            @elseif($data[0]->role == 'employee')
                                                @if ($data[4]== 'newrequest') 
                                                <a href="/newrequest" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/newrequest" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/e862f2227b23983ae87ee9bbcba82f8f.svg')}}" alt="instance" class="c_home-instance11 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">New Requests</p>
                                                    </div>
                                                </a>
                                            @else($data[0]->role == 'customer')
                                                @if ($data[4]== 'requestpickup')
                                                <a href="/requestpickup" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/requestpickup" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/e862f2227b23983ae87ee9bbcba82f8f.svg')}}" alt="instance" class="c_home-instance11 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">Request Pickup</p>
                                                    </div>
                                                </a>
                                            @endif
                                            @if($data[0]->role == 'admin')
                                                @if ($data[4]== 'thirdsidebar')
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/9b92f2697e79975e2710b70d01a3841e.svg')}}" alt="instance" class="c_home-instance12 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">My Employees</p>
                                                    </div>
                                                </a>
                                            @elseif($data[0]->role == 'employee')
                                                @if ($data[4]== 'thirdsidebar')
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/9b92f2697e79975e2710b70d01a3841e.svg')}}" alt="instance" class="c_home-instance12 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">My Pickup</p>
                                                    </div>
                                                </a>
                                            @elseif($data[0]->role == 'customer')
                                                @if ($data[4]== 'thirdsidebar')
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only active">
                                                @else
                                                <a href="/thirdsidebar" class="c_home-frame18 clean-text-only">
                                                @endif
                                                    <img
                                                        src="{{url('/side-nav-img/9b92f2697e79975e2710b70d01a3841e.svg')}}" alt="instance" class="c_home-instance12 icon-side-nav"
                                                    />
                                                    <div class="c_home-text106">
                                                        <p class="c_home-text107">My Request</p>
                                                    </div>
                                                </a>
                                            @endif 
                                            @if ($data[4]== 'pickuphistory')
                                            <a href="/pickuphistory" class="c_home-frame18 clean-text-only active">
                                            @else
                                            <a href="/pickuphistory" class="c_home-frame18 clean-text-only">
                                            @endif
                                                <img src="{{url('/side-nav-img/87c1b5bffd3a483bdc3a2bf17f805b18.svg')}}" alt="instance" class="c_home-instance13 icon-side-nav"
                                                />
                                                <div class="c_home-text106">
                                                    <p class="c_home-text107">Pickup History</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <img src="{{url('/side-nav-img/f1aee3bb0e48961e9a60be4690e71460.svg')}}" alt="vector" width="223" height="3" class="c_home-vector"
                                    />
                                    <div class="c_home-frame21">
                                        <div class="c_home-frame22">
                                            <div class="c_home-text112">
                                                <p class="c_home-text113">Account</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="c_home-frame23">
                                        <div class="c_home-frame16">
                                            @if ($data[4]== 'account')
                                            <a href="/account" class="c_home-frame18 clean-text-only active">
                                            @else
                                            <a href="/account" class="c_home-frame18 clean-text-only">
                                            @endif
                                                <img src="{{url('/side-nav-img/f82e99f986135dcf208bf67edca31f81.svg')}}" alt="instance" class="c_home-instance14 icon-side-nav"/>
                                                <div class="c_home-text114">
                                                    <p class="c_home-text115">Account</p>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- <div class="c_home-frame25">
                                            <img src="{{url('/side-nav-img/e183e16cf128caf5e4614e256083010b.svg')}}" alt="instance" class="c_home-instance15 icon-side-nav"/>
                                            <div class="c_home-text116">
                                                <p class="c_home-text117">Settings</p>
                                            </div>
                                        </div> -->
                                        <div class="c_home-frame16">
                                            <a href="{{ route('logout') }}" class="c_home-frame18 clean-text-only"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <img src="{{url('/side-nav-img/f0ec7aabd3863fd53d451a0d647282de.svg')}}" alt="instance" class="c_home-instance16 icon-side-nav"/>
                                                <div class="c_home-text114">
                                                    <p class="c_home-text115">{{ __('Logout') }}</p>
                                                </div>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 gap25 container-content">
                            <!-- Navbar -->
                            <div class="c_home-frame27">
                                <div class="c_home-frame28">
                                    <img src="{{url('/side-nav-img/b3d0527622ed8eaeebdbca38654d77b4.svg')}}" alt="instance" width="24" height="24" class="c_home-instance17"/>
                                    <div class="c_home-text120">
                                        <p class="c_home-text121">Seacrh</p>
                                    </div>
                                </div>
                                <div class="c_home-frame29">
                                    <button type="button" class="btn btn-light position-relative">
                                        <img src="{{url('/side-nav-img/09b8cdf60666ea11fe62a89e8ee3f801.svg')}}" alt="instance" width="24" height="24" class="c_home-instance18"/>
                                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            99+
                                        </span> -->
                                    </button>
                                </div>
                                <div class="c_home-frame30">
                                    @if($data[0]->role == 'employee')
                                        <button type="button" onclick="window.location.href='/newrequest'" class="btn btn-light position-relative">
                                            <img src="{{url('/side-nav-img/623f2a6d34e04988292c1e1d691945d4.svg')}}" alt="instance" width="24" height="24" class="c_home-instance19"/>
                                            @php ($count = App\Http\Controllers\Controller::get_notif_count($data[0]))
                                            @if($count != 0)
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{$count}} 
                                                    <!-- <span class="visually-hidden">unread messages</span> -->
                                                </span>
                                            @endif
                                        </button>
                                    @elseif($data[0]->role == 'customer')
                                        <button type="button" onclick="window.location.href='/thirdsidebar'" class="btn btn-light position-relative">
                                            <img src="{{url('/side-nav-img/623f2a6d34e04988292c1e1d691945d4.svg')}}" alt="instance" width="24" height="24" class="c_home-instance19"/>
                                            @php ($count = App\Http\Controllers\Controller::get_notif_count($data[0]))
                                            @if($count != 0)
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{$count}} 
                                                    <!-- <span class="visually-hidden">unread messages</span> -->
                                                </span>
                                            @endif
                                        </button>
                                    @endif
                                </div>
                                <img src="{{url('/side-nav-img/f3fceaea752c20528b55545434992ba7.png')}}" alt="rectangle" width="46" height="46" class="c_home-rectangle"/>
                            </div>
                            <div class="c_home-frame31">
                                <!-- <div class="c_home-frame60"></div> -->

                                @yield('content')
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </main>
        @endguest
    </div>
    <!-- @vite(['resources/js/map.js', 'resources/js/preview.js']) -->
</body>
</html>
