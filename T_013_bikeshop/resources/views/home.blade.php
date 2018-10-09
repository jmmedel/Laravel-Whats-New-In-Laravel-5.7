@extends('layouts.main')
@section('content')
<!--   ====================================  start Main Section ===============================  -->
            <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
                <div class="uk-grid">
                    <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">
                        <div class="uk-panel">
                            <ul class="uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">
                                <li class="uk-active">
                                <a href="{{ url('category') }}">Popular Categories</a></li>
                                <!-- ======================    Foreach  Fresh Category =========== --> 
                                 @foreach($freshcategores as $freshcategory)
                                    <!-- ======================    Foreach  Name Category =========== --> 
                                    <li><a href="{{ url('category') }}/{{ $freshcategory->slug }}">{{ $freshcategory->name }}</a></li>
                                 @endforeach
                                 <!-- ======================    Foreach  Fresh Category =========== --> 
                                <li class="uk-parent">
                                    <a href="#">MORE Categories</a>
                                    <ul class="uk-nav-sub">
                                        <!-- ======================    Foreach  ALL Category =========== -->
                                         @foreach($allcategores as $allcategory)
                                            <!-- ======================    Foreach  slug Category =========== -->
                                            <li><a href="{{ url('category') }}/{{ $allcategory->slug }}">{{ $allcategory->name }}</a></li>
                                         @endforeach 
                                         <!-- ======================    Foreach  ALL Category =========== -->
                                    </ul>
                                </li>
                                <li class="uk-nav-divider"></li>
                            </ul>
                            <ul class="uk-nav uk-nav-comments uk-nav-side" data-uk-nav="">
                                <li class="uk-nav-header uk-margin-small-bottom">Latest BLOG</li>
                                <!-- ======================    Foreach  News =========== -->
                                @foreach($news as $new)
                                <li>
                                    <!-- ======================    Foreach  News slug WITH IMAGE =========== -->
                                    <a href="{{ url('news') }}/{{ $new->slug }}">
                <img src="{!! asset(Voyager::image( $new->image )) !!}" alt="Image" 
                class="border-background uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-fade">
                                         <!-- ======================    Foreach  News title  =========== -->
                                         {!! substr($new->title, 0, 90)!!} 
                                         <!-- ======================    Foreach  News body  =========== -->
                                    <div>{!! substr($new->body, 0, 80)!!} </div>
                                    </a>
                                </li>
                                @endforeach
                                <!-- ======================    Foreach  News =========== -->
                            </ul>
                            <div class="uk-panel">
                                <h5 class="uk-panel-header uk-margin-top widget-header">SIMBLE Login</h5>
                                <!-- ======================    Form  SIMBLE Login =========== -->
                                <form class="uk-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <fieldset>
                                        <!-- ======================    Form  E-Mail Address Login =========== -->
                                        <div class="uk-form-row">
                                            <input id="email" placeholder="E-Mail Address" type="email" 
                                            class="uk-width-1-1{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required >
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- ======================    Form  password Login =========== -->
                                        <div class="uk-form-row">
                                            <input id="password" type="password" placeholder="Password" 
                                            class="uk-width-1-1{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                            name="password" required >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- ======================    Form  remember Login =========== -->
                                        <div class="uk-form-row">
                                        <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} > Remember me</label>
                                        </div>
                                        <div class="uk-form-row">
                                            <button class="uk-button uk-button-success uk-width-1-1" type="submit">log in</button>
                            <a href="{{ route('password.request') }}" class="uk-button uk-button-link uk-button-small uk-margin-top ">Forgot Password?</a>
                        <a href="{{ route('register') }}" class="uk-button uk-button-link uk-button-small uk-margin-top uk-text-muted uk-float-right">Sign up</a>
                                        </div>
                                        
                                    </fieldset>
                                </form>
                                <!-- ======================    Form  SIMBLE Login =========== -->
                            </div>
                        </div>
                    </div>
            <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
                        <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-3" data-uk-grid="{gutter:20}">


                           <!-- ======================    Foreach  Products =========== -->
                           @foreach($Products as $Product)
                           <!-- ====================== images   Foreach  Products =========== -->
                           <?php $images = json_decode($Product->image,true); ?>
                           <?php $images[0]; ?> 
                           
                            <div>
                                <div class="uk-overlay uk-overlay-hover">
                                    <!-- ====================== images   Foreach  Products =========== -->
                                    <img src="{!! asset(Voyager::image($images[0])) !!}" alt="Image">
                                    <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                                    <!-- ====================== SLUG URL   Foreach  Products =========== -->
                                    <a class="uk-position-cover" href="{{ url('products') }}/{{ $Product->slug }}"></a>
                                </div>
                                <div class="uk-panel">
                                    <!-- ====================== Product name   Foreach  Products =========== -->
                                    <h5 class="uk-panel-title">{{ $Product->productname }}</h5>
                                    <p>
                                        <span class="rating uk-margin-small-left uk-h4 uk-text-warning">
                                                <!-- ====================== Product reviews   Foreach  Products =========== -->
                                                @if(isset($Product->reviews) && count($Product->reviews) > 0) 
                                                @foreach($Product->reviews as $review)
                                                @if($review->Reviews_one)
                                                <i class="uk-icon-star"></i>
                                                @elseif($review->Reviews_two)
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                @elseif($review->Reviews_three)
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                @elseif($review->Reviews_four)
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                @elseif($review->Reviews_five)
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                @elseif($review->id > 0)
                                                <span class="rating">
                                                 Add Rating 
                                                </span>
                                                @endif
                                                @endforeach
                                                @else 
                                                <span class="rating">
                                                 Add Rating 
                                                </span>
                                                @endif
                                                <!-- ====================== Product reviews   Foreach  Products =========== -->
                                                
                                            </span>
                                            <!-- ====================== Product reviews   strtotime  Products =========== -->
                                        <span class="uk-float-right">{{ date('M j, Y', strtotime($Product->created_at)) }}</span>
                                    </p>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        <div class="uk-margin-large-top uk-margin-bottom">
                            <!-- ====================== PAGINATE  Products =========== -->
                            {{ $Products->links() }}
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--    =================================================== ./ Main Section  ===================================== -->

            
@endsection
