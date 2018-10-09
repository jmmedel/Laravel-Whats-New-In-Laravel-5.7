@extends('layouts.main')

@section('content')
              
 <!--   ==========================================  start Main Content Section =====================================  -->
            <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
                <div class="uk-grid"> 
    <div id="tm-right-section" class="uk-width-large-1-1 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
                        <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-3" data-uk-grid="{gutter: 20}">
                            <!--  ==============================================   Wishlists Section  -->
                            @foreach($Wishlists as $Wishlist)
                            <?php $images = json_decode($Wishlist->product->image,true); ?>
                            <?php $images[0]; ?> 
                            <div>
                                <div class="uk-overlay uk-overlay-hover">
                                     <!--  ==============================================   image Section  -->
                                    <img src="{!! asset(Voyager::image($images[0])) !!}" alt="Image" >
                                    <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                                     <!--  ==============================================   slug Section  -->
                                    <a class="uk-position-cover" href="{{ url('products') }}/{{ $Wishlist->product->slug }}"></a>
                                </div>
                                <div class="uk-panel" >
                                    <!--  ==============================================   product name Section  -->
                                    <h5 class="uk-panel-title">{{ $Wishlist->product->productname }}</h5>
                                                <span class="rating">
                                                    <i class="uk-icon-heart"></i>
                                                </span>
                                                <span class="uk-float-right rating">
                                        <!--  ==============================================   Wishlist destroy FORM ============== -->
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['Wishlist.destroy', $Wishlist->id]]) }}        
                                            <button type="submit" class="btn-delete-icon">
                                            <i class="uk-icon-remove uk-margin-small-right"></i>
                                            </button>
                                            </span>
                                        {{ Form::close() }}
                                        <!--  ==============================================   Wishlist destroy FORM =============== -->
                                    
                                </div>
                            </div>
                           @endforeach
                          <!--  ==============================================   Wishlists Section =============== -->
                        </div>
                    </div>
                </div>
            </div>
         <!--   ===============================================  ./ Main Content Section  ==================== -->
                
@endsection
