@extends('layouts.main')

@section('content')
               <!-- =============================== start Main Content (Media Page Section) ============================= -->

                <div id="tm-media-section" class="uk-block uk-block-small">

                    <div class="uk-container uk-container-center uk-width-8-10">
                        <div class="media-container  uk-container-center">
                            <a class="uk-button uk-button-large uk-button-link uk-text-muted" href="{{ url('/') }}"><i class=" uk-icon-arrow-left uk-margin-small-right"></i> Back</a>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-medium-5-10">
                                <div  class="media-cover mt-50">
                                    <div class="uk-margin" data-uk-slideset="{small: 2, medium: 1, large: 1}">
                                    <div class="uk-slidenav-position uk-margin">
                                        <ul class="uk-slideset uk-grid uk-flex-center">
                                        <!--   ================  Product image Section ================  -->
                                        <?php $images = json_decode($product->image); ?> 
                                        <!--   ================  Product image Section ================  --> 
                                        @if($images != null)
                                        @foreach($images as $image)
                                            <li>
                                                <a>
                                                    <!--   ================  Product image Section ================  -->
                                                   <img src="{!! asset(Voyager::image($image)) !!}" width="700" height="400" >
                                                </a>
                                            </li>
                                        @endforeach
                                        @endif 
                                        <!--   ================  Product image Section ================  -->
                                        </ul>
                                       
                                    </div>
                                <ul class="uk-slideset-nav uk-dotnav uk-dotnav-contrast uk-flex-center uk-margin-top"></ul>
                            </div>
                        </div>
                            <!--   ================  Form Wishlist store Section ================  -->
                            {{ Form::open(['route' => ['Wishlist.store'], 'method' => 'POST']) }}
                            {{ Form::hidden('product_id', $product->id) }}
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-top" type="submit">
                            <i class="uk-icon-heart uk-margin-small-right"></i> Add to Favourites</button>
                            {{ Form::close() }}
                            <!--   ================  Form Wishlist store Section ================  -->

                    <a class="uk-button uk-button-link color-y uk-text-muted uk-button-large uk-width-1-1 uk-margin-top" href="{{ url('contact')}}">
                    <i class="uk-icon-receiver uk-margin-small-right "></i> Contact Us</a>
                            </div>
                            <div class="uk-width-medium-5-10">
                                <div class="">
                                    <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                                        <li class="uk-width-medium-1-3 uk-active"><a href="#">Description</a></li>
                                        <li class="uk-width-medium-1-3"><a href="#">Reviews</a></li>
                                        <li class="uk-width-medium-1-3"><a href="#">book now</a></li>
                                        <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Active</a><div class="uk-dropdown uk-dropdown-small uk-dropdown-up"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul>
                                    </div>

                                    <ul id="media-tabs" class="uk-switcher">

                                         <!--   ======================  start Tab Panel 1 (Reviews Sections) ======================== -->

                                        <li>
                                         <!--   ================   Product Name  ================  -->   
                                        <h2 class="uk-text-contrast uk-margin-large-top">{{ $product->productname}}
                                                <span class="rating uk-margin-small-left uk-h4 uk-text-warning">
                                                <!--   ================ reviews  Product   ================  -->     
                                                @if(isset($reviews) && count($reviews) > 0) 
                                                @foreach($reviews as $review)
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
                                                @endif
                                                @endforeach
                                                @else 
                                                <span class="rating">
                                                 Add Rating 
                                                </span>
                                                @endif
                                                <!--   ================  reviews Product   ================  -->    
                                                
                                                
                                                
                                            </span>
                                        </h2>
                                            <ul class="uk-subnav uk-subnav-line">
                                                <!--   ================ count reviews Product   ================  -->
                                                <li ><i class="uk-icon-star uk-margin-small-right"></i>{{ count($reviews) }} </li>
                                                <!--   ================  created_at Product   ================  -->
                                                <li><i class="uk-icon-clock-o uk-margin-small-right"></i>{{ $product->created_at }}</li>
                                                <!--   ================   Price Product   ================  -->
                                                <li><i class="fas fa-award uk-margin-small-right"></i>$ {{ $product->productprice }}</li>
                                                
                                            </ul>
                                            <hr>
                                            <!--   ================   content Product   ================  -->
                                            <p class="uk-text-muted uk-h4">{{ $product->productcontent }}</p>
                                            <dl class="uk-description-list-horizontal uk-margin-top">
                                                <dt> Wheel Size :</dt>
                                                <dd><ul class="uk-subnav ">
                                                <!--   ================  Wheel Size Product   ================  -->
                                                <li><a href="#">{{ $product->WheelSize }}</a></li>
                                                </ul></dd>
                                                <dt> Model Number : </dt>
                                                <dd><ul class="uk-subnav ">
                                                    <!--   ================  Model Number Product   ================  -->
                                                    <li><a href="#">{{ $product->ModelNumber }}</a></li>
                                                </ul></dd>
                                                <dt> Color : </dt>
                                                <dd><ul class="uk-subnav color-bike">
                                                    <!--   ================  Color Product   ================  -->
                                                    <li><a href="#"> <i style="color: {{ $product->Color }};font-size: 25px;"  class="uk-icon-image"></i></a></li>
                                                </ul></dd>
                                                <dt> CategorY : </dt>
                                                <dd><ul class="uk-subnav">
                                                    <!--   ================  Category Came Product   ================  -->
                                                    <li><a href="#">{{ $product->category->name }}</a></li>
                                                </ul></dd>
                                                 <dt> Wattage : </dt>
                                                <dd><ul class="uk-subnav ">
                                                    <!--   ================  Wattage Product   ================  -->
                                                    <li><a href="#">{{ $product->Wattage }}</a></li>
                                                </ul></dd>
                                                  <dt> Frame Material : </dt>
                                                 <dd><ul class="uk-subnav ">
                                                    <!--   ================  Frame Material Product   ================  -->
                                                    <li><a href="#">{{ $product->FrameMaterial }}</a></li>
                                                </ul></dd>
                                                
                                               
                                                 

                                            </dl>

                                            </li>

                                            <!--  ==========================  ./ Tab Panel 1 ================================ -->

                                          <!--    ========================== start Tab Panel 2  (Reviews Section) =========== -->

                                            <li>
                                                <div class="uk-margin-small-top">
                                                    <h3 class="uk-text-contrast uk-margin-top">Product a Review</h3>
                                                    @guest
                                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                                        <a href="" class="uk-alert-close uk-close"></a>

                                                        <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> Please <a class="uk-text-contrast" href="{{ route('login') }}"> Log in</a> or Sign up to post reviews quicker.</p>
                                                    </div>
                                                    @else
                                                    @endguest
                                                    <!--   ================  review store Product   ================  -->
                                                    {{ Form::open(['route' => ['review.store'], 'method' => 'POST','class' => 'uk-form uk-margin-bottom']) }}
                                                    {{ Form::hidden('product_id', $product->id) }}
                                                    <!--   ================  review store Product   ================  -->
                                                        <div class="uk-form-row">
                                    <textarea class="uk-width-1-1" cols="30" name="Reviews_content" rows="5" placeholder="Type your review here..."></textarea>
                                                            <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                                        </div>
                                                        <div class="uk-margin">
                                                            
                                                            
                                                    <div class="uk-form-controls">
    <label><input value="1" class="uk-radio" name="Reviews_one" type="radio"> <i class="uk-icon-star "></i></label>
    <label><input value="2" class="uk-radio" name="Reviews_two" type="radio"><i class="uk-icon-star "></i><i class="uk-icon-star "></i></label>
    <label><input value="3" class="uk-radio" name="Reviews_three" type="radio"><i class="uk-icon-star "></i><i class="uk-icon-star "></i>
    <i class="uk-icon-star"></i></label>
    <label><input value="4" class="uk-radio" name="Reviews_four" type="radio"><i class="uk-icon-star "></i><i class="uk-icon-star "></i>
    <i class="uk-icon-star"></i><i class="uk-icon-star"></i></label>
    <label><input value="5" class="uk-radio" name="Reviews_five" type="radio">  <i class="uk-icon-star"></i><i class="uk-icon-star "></i>
    <i class="uk-icon-star"></i><i class="uk-icon-star"></i><i class="uk-icon-star"></i></label>

                                                            </div>
                                                        </div>
                                                        <div class="uk-form-row">
                                        <button type="submit" class="uk-button uk-button-large uk-button-success uk-float-right">REVIEW</button>
                                                        
                                                        </div>
                                                    {{ Form::close() }}
                                                    <!--   ================  review store Product   ================  -->
                                                    </div>

                                                    <div  class="uk-scrollable-box uk-responsive-width">
                                                        <ul class="uk-comment-list uk-margin-top">
                                                            <!--   ================ foreach review  Product   ================  -->
                                                             @foreach($reviews as $review)
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
            <!--   ================ image review  Product   ================  -->                                                        
            <img class="uk-comment-avatar uk-border-circle" src="{!! asset(Voyager::image( $review->user->avatar )) !!}" width="50" height="50">
            <!--   ================ user name review  Product   ================  -->
            <h4 class="uk-comment-title">{{ $review->user->name }}</h4>
            <!--   ================ created_at review  Product   ================  -->
            <div class="uk-comment-meta">{{ $review->created_at }}</div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <!--   ================ Reviews content review  Product   ================  -->
                                                                        <p>{{ $review->Reviews_content }}</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            @endforeach
                                                            <!--   ================ foreach review  Product   ================  -->
                                                        </ul>
                                                    </div>
                                                </li>
                                                <!--   ================================  ./ Tab Panel 2 ======================== -->
                                                <!--   ================================  start Tab Panel 3 (Trailer Section) === -->
                                                <li>
                                                <div class="uk-margin-small-top">
                                                <h3 class="uk-text-contrast uk-margin-top">Book It Now</h3>
                                                @guest    
                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                    <a href="" class="uk-alert-close uk-close"></a>
                                <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> Please 
                                <a class="uk-text-contrast" href="{{ route('login') }}"> Log in</a> or Sign up to  BOOK THIS BIKE quicker.</p>
                                                    </div>
                                                     @else
                                                    @endguest
                                                <!--   ================ Form Book Store   ================  -->
                                                {{ Form::open(['route' => ['book.store'], 'method' => 'POST','class' => 'uk-form uk-margin-bottom']) }}
                                                    
                                                        <div class="uk-form-row">
                                                            <textarea class="uk-width-1-1" name="content_book" cols="30" rows="5" placeholder="Type your review here..."></textarea>
                                                            <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                                        </div>
                                                        <div class="uk-form-row">

                                        <button type="submit" class="uk-button uk-button-large uk-button-success uk-float-right">Book IT NOW</button>
                                                        </div>
                                                {{ Form::close() }}
                                                <!--   ================ Form Book Store   ================  -->     
                                                </div>
                                                </li>
                                               <!--  =================   ./ Tab Panel 3   ================= -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <!--  ========================= ./ Main Content (Media Page Section) ========================= -->
                 <!--  =========================   Start Similar Media Section ================================ -->
                        <div class="uk-block ">
                            <div class="uk-container-center uk-container uk-margin-large-bottom">
                                <h3 class="uk-margin-large-bottom uk-text-contrast">You might also like</h3>
                                <div class="uk-margin" data-uk-slideset="{small: 2, medium: 4, large: 5}">
                                    <div class="uk-slidenav-position uk-margin">
                                        <ul class="uk-slideset uk-grid uk-flex-center">
                                    <!--  ========================= foreach  Product Populars ================================ -->        
                                          @foreach($productpopulars as $productpopular)
                                          <?php $images = json_decode($productpopular->image,true); ?>
                                          <?php $images[0]; ?> 
                                            <li>
                                                <a href="{{ url('products') }}/{{ $productpopular->slug }}">
                                                <img src="{!! asset(Voyager::image($images[0])) !!}" width="600" height="400" >
                                                </a>
                                            </li>
                                          @endforeach
                                   <!--  ========================= foreach  Product Populars ================================ -->    


                                        </ul>
                                        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                        <a href="#" class="uk-slidenav uk-slidenav-next uk-slidenav-contrast" data-uk-slideset-item="next"></a>
                                    </div>
                                <ul class="uk-slideset-nav uk-dotnav uk-dotnav-contrast uk-flex-center uk-margin-top"></ul>
                            </div>
                        </div>
                    </div>

                 <!--  ==============================================   ./ Similar Media Section  -->
@endsection
