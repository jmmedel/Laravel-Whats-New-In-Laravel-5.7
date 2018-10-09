<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
    <!-- ====== Meta site ================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- ====== Laravel description site edit delete from admin panel ================== -->
    <meta name="description" content="{!! setting('site.description')  !!}">
    <!-- ====== Laravel author site edit delete from admin panel ====================== -->
    <meta name="author" content="{!! setting('site.author_title') !!}">
    <!-- ====== Laravel keywords site edit delete from admin panel ================== -->
    <meta name="keywords" content="{!! setting('site.keywords') !!}">
    <!-- ====== Laravel robots site edit delete from admin panel ================== -->
    <meta name="robots" content="{!! setting('site.robots') !!}">
     <!-- ====== Laravel favicon icon================== -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- ====== Laravel favicon icon================== -->
    <!-- ====== Laravel title site edit delete from admin panel ================== -->
    <title>{{ setting('site.title') }}</title>
    <!-- ====== apple-touch-icon ================== -->
    <link rel="apple-touch-icon-precomposed" href="assets/img/apple-touch-icon.png">
    <!--  ===============================   Include UIKit CSS  ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <!--  ===================================   Theme CSS =========  -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <!--  ===================================   jquery-louder ===== -->
    <script src="{{ asset('assets/js/jquery-louder.js') }}"></script>
    </head>
    <body>
        <!--   ======================================  start Header Section  ====================== -->
        <!--  ================================   start Top Navbar ================================= -->
        <nav id="tm-topbar" class=" uk-navbar uk-contrast ">
            <div class="uk-container uk-container-center ">
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li>
                        <!-- ==================   social media Facebook ============  -->
                        <a href="{{ setting('social-media.Facebook') }}"><i class="uk-icon-facebook-square uk-icon-small"></i></a>
                    </li>
                    <li>
                        <!-- ==================   social media Twitter =============  -->
                        <a href="{{ setting('social-media.Twitter') }}"><i class="uk-icon-twitter-square uk-icon-small"></i></a>
                    </li>
                    
                    <li>
                        <!-- ==================   social media Instagram ============  -->
                        <a href="{{ setting('social-media.Instagram') }}"><i class="uk-icon-instagram uk-icon-small"></i></a>
                    </li>
                    <li>
                        <!-- ==================   social media Pinterest ============  -->
                        <a href="{{ setting('social-media.Pinterest') }}"><i class="uk-icon-pinterest uk-icon-small"></i></a>
                    </li>
                </ul>
                <div class="uk-navbar-flip uk-hidden-small">
                     <!-- ==================   menu HOME  ============  -->
                     {{ menu('HOME') }}
                     <!-- ==================   menu HOME  ============  -->
                </div>
            </div>
            
        </nav>
        <nav id="tm-header" class="uk-navbar  ">
            <div class="uk-container uk-container-center ">
                <a class="uk-navbar-brand uk-hidden-small" href="{{ url('/') }}">
                <!-- ======================  site.logo  ============  -->     
                <img src="{{ Voyager::image(setting('site.logo')) }}" width="200" height="120"></a>
    <!-- ==================   start Form search =======================================================  -->             
    {!! Form::open(['method'=>'GET','url'=>'search','role'=>'search','class'=>'uk-search uk-margin-small-top uk-margin-left uk-hidden-small']) !!}
                
                    <input class="uk-search-field" type="search" name="search"  placeholder="Search..." autocomplete="off">

                    <div type="submit" class="uk-dropdown uk-dropdown-flip uk-dropdown-search" aria-expanded="false"></div>
    {!! Form::close() !!}
    <!-- ==================   End Form search =========================================================  -->
                   @guest
                    <div class="uk-navbar-flip uk-hidden-small">
                        <div class="uk-button-group">
                            <a class="uk-button uk-button-link uk-button-large" href="{{ route('register') }}">Sign up</a>
                            <a class="uk-button uk-button-success uk-button-large uk-margin-left" href="{{ route('login') }}">
                            <i class="uk-icon-lock uk-margin-small-right"></i> Log in</a>
                        </div>
                    </div>
                    @else
                    <div class="uk-navbar-flip uk-hidden-small">
                    <ul class="uk-navbar-nav">
                    <li class="uk-parent" data-uk-dropdown>
                        <!-- ===============================   Auth::user  =======================  -->
                        <a class="uk-button uk-button-link">{{ Auth::user()->name }}<i class="uk-icon-angle-down uk-margin-small-left"></i></a>
                        <div class="uk-dropdown uk-dropdown-navbar p-0">
                            <ul class="uk-nav uk-nav-navbar m-0 ">
                                        <li><a href="{{ url('/wishlist') }}">Favourites</a> </li> 
                                        <li>
                                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOGOUT</a> </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </ul>
                        </div>
                        <!-- ===============================   logout-form  =======================  -->
                    </li>

                   </ul>
                    </div>

                    @endguest
                    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small uk-icon-medium" data-uk-offcanvas></a>
                    <div class="uk-navbar-flip uk-visible-small">
                        <a href="#offcanvas" class="uk-navbar-toggle uk-navbar-toggle-alt uk-icon-medium" data-uk-offcanvas></a>
                    </div>
                    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">
                    <!-- ===============================   site.logo  =======================  -->    
                    <img src="{{ Voyager::image(setting('site.logo')) }}" width="120"></a>
                </div>
                </div>
            </nav>
            <!-- ========================================  Scripts ============================ -->
            <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!}; </script>
            <!-- ======================================== ./ Header Section ================= ----->
            @yield('content')
            <!-- ========================================   start Footer Section ============    -->
            <footer id="tm-footer" class="uk-block uk-block-secondary uk-block-small ">
                <div class="uk-container-center uk-container">
                    <div class="uk-grid">
                    <div class="uk-width-medium-3-10"><div class="copyright-text">&copy; 2018
                    <!-- ===============================   site.title  =======================  --> 
                    <span class="uk-text-bold">{{ setting('site.title') }}</span></div></div>
                        <div class="uk-width-medium-5-10">
                        <!-- ===============================   menu.Footer  =======================  --> 
                            {{ menu('Footer') }}
                        <!-- ===============================   menu.Footer  =======================  --> 
                        </div>
                            <div class="uk-width-medium-2-10">
                                <div class=" uk-float-right"><ul class="uk-subnav">
                                        <li>
                                            <!-- ==================   social media Facebook ============  -->
                                      <a href="{{ setting('social-media.Facebook') }}"><i class="uk-icon-facebook-square uk-icon-small"></i></a>
                                     </li>
                                        <li>
                                            <!-- ==================   social media Twitter =============  -->
                                            <a href="{{ setting('social-media.Twitter') }}"><i class="uk-icon-twitter-square uk-icon-small"></i></a>
                                        </li>
                                        
                                        <li>
                                            <!-- ==================   social media Instagram ============  -->
                                            <a href="{{ setting('social-media.Instagram') }}"><i class="uk-icon-instagram uk-icon-small"></i></a>
                                        </li>
                                        <li>
                                            <!-- ==================   social media Pinterest ============  -->
                                            <a href="{{ setting('social-media.Pinterest') }}"><i class="uk-icon-pinterest uk-icon-small"></i></a>
                                        </li>
                                </ul></div></div>
                            </div>
                        </div>
                    </footer>

                    <!--     start Offcanvas Menu   -->

                    <div id="offcanvas" class="uk-offcanvas">
                        <div class="uk-offcanvas-bar">
                            <div class="uk-panel">
                            <!-- ==================   start Form search =======================================================  -->
                            {!! Form::open(['method'=>'GET','url'=>'search','role'=>'search','class'=>'uk-search']) !!}
                             <input class="uk-search-field" type="search" name="search"  placeholder="Search..." autocomplete="off">
                             <div type="submit" class="uk-dropdown uk-dropdown-flip uk-dropdown-search" aria-expanded="false"></div>
                            {!! Form::close() !!}
                            <!-- ==================   End Form search =========================================================  -->      
                            </div>
                            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon">
                            <li class="uk-nav-divider"></li>
                            <!-- ======================  menu.Footer  ============  -->
                            {{ menu('Footer') }}
                            <!-- ======================  menu.Footer  ============  -->
                            </ul>
                            <div class="uk-panel uk-text-center">
                                <ul class="uk-subnav">
                                    <li>
                                            <!-- ==================   social media Facebook ============  -->
                                      <a href="{{ setting('social-media.Facebook') }}"><i class="uk-icon-facebook-square uk-icon-small"></i></a>
                                     </li>
                                        <li>
                                            <!-- ==================   social media Twitter =============  -->
                                            <a href="{{ setting('social-media.Twitter') }}"><i class="uk-icon-twitter-square uk-icon-small"></i></a>
                                        </li>
                                        
                                        <li>
                                            <!-- ==================   social media Instagram ============  -->
                                            <a href="{{ setting('social-media.Instagram') }}"><i class="uk-icon-instagram uk-icon-small"></i></a>
                                        </li>
                                        <li>
                                            <!-- ==================   social media Pinterest ============  -->
                                            <a href="{{ setting('social-media.Pinterest') }}"><i class="uk-icon-pinterest uk-icon-small"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--  ===========================   ./ Offcanvas Menu  ===================  -->
                    <!--  ===========================   Include JS ===========================  -->
                    <!--  ===========================   jquery JS ============================  -->
                    <script src="{{ asset('assets/js/jquery.js') }}"></script>
                    <!--  ===========================   uikit.min.js =========================  -->
                    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
                    <!--  =========================== grid.min.js ============================  -->
                    <script src="{{ asset('assets/js/components/grid.min.js') }}"></script>
                    <!--  =========================== slideset.min.js ========================  -->
                    <script src="{{ asset('assets/js/components/slideset.min.js') }}"></script>

                </body>
            </html>



