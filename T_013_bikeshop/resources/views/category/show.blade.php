@extends('layouts.main')
@section('content')
<!--   ============== start Main Content Section  =================  -->
<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
    <div class="uk-grid">
        <div id="tm-right-section" class="uk-width-large-1-1 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
            <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter: 20}">
                <!--   ============== Products WITH IMAGE =================  -->
                @foreach($Products as $Product)
                <?php $images = json_decode($Product->image,true); ?>
                <?php $images[0]; ?> 
                <div>
                    <div class="uk-overlay uk-overlay-hover">
                        <!--   ============== Products IMAGE =================  -->
                        <img src="{!! asset(Voyager::image($images[0])) !!}" alt="Image">
                        <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                        <!--   ============== Products URL =================  -->
                        <a class="uk-position-cover" href="{{ url('products') }}/{{ $Product->slug }}"></a>
                    </div>
                    <div class="uk-panel" >
                        <!--   ============== Products NAME =================  -->
                        <h5 class="uk-panel-title">{{ $Product->productname }}</h5>
                        <p>
                            <span class="rating uk-margin-small-left uk-h4 uk-text-warning">
                                <!--   ============== Foreach Products Reviews =================  -->
                                @foreach($Product->reviews as $review) 
                                @if(isset($reviews) != 0) 
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
                                @else 
                                <span class="rating">
                                   Add Rating 
                               </span>
                               @endif
                               @endforeach
                               <!--   ============== END Foreach Products Reviews =================  -->
                           </span>
                           <!--   ============== DATE Products  =================  -->
                           <span class="uk-float-right">{{ date('M j, Y', strtotime($Product->created_at)) }}</span>
                       </p>
                   </div>
               </div>
               @endforeach
           </div>
           <div class="uk-margin-large-top uk-margin-bottom">
            <!--   ============== PAGENATE Products  =================  -->
            {{ $Products->links() }}
        </div>
    </div>
</div>
</div>
<!--   ================================ END Main Content Section  ========================================  -->
@endsection