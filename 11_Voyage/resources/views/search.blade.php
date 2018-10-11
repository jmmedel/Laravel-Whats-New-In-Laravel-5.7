@extends('layouts.main')
@section('content')
<!--   ===================================  start Main Content Section ============================  -->
<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
    
    <div class="uk-grid">
        <!-- ====================== search NULL =========== -->
        @if(isset($search) == '' )   
        <div class="uk-alert uk-alert-warning uk-container-center" data-uk-alert="">
            <a href="" class="uk-alert-close uk-close"></a>

            <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> NO SEARCH FOUND BEETER GO TO OUR HOME TO SEE MORE THINGS
                <a class="uk-text-contrast" href="{{ url('/') }}">HOME</a></p>
            </div>
            @else
            <div id="tm-right-section" class="uk-width-large-1-1 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
                <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-6" data-uk-grid="{gutter: 20}">
                 <!-- ====================== Products search  =========== -->
                 @foreach($Products as $Product)
                 <?php $images = json_decode($Product->image,true); ?>
                 <?php $images[0]; ?> 
                 
                 <div>
                    <div class="uk-overlay uk-overlay-hover">
                        <img src="{!! asset(Voyager::image($images[0])) !!}" alt="Image">
                        <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                        <a class="uk-position-cover" href="{{ url('products') }}/{{ $Product->slug }}"></a>
                    </div>
                    <div class="uk-panel">
                        
                        <h5 class="uk-panel-title">{{ $Product->productname }}</h5>
                        <p>
                            <span class="rating uk-margin-small-left uk-h4 uk-text-warning">

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
                               
                               
                           </span>
                           <span class="uk-float-right">{{ date('M j, Y', strtotime($Product->created_at)) }}</span>
                       </p>
                   </div>
               </div>
               @endforeach
               <!-- ====================== Products search  =========== -->
           </div>
           <div id="post-data"  class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 20}">
            <!-- ====================== Posts search  =========== -->
            @foreach($posts as $post)
            <div>
                <div class="uk-overlay uk-overlay-hover">
                 <img src="{!! asset(Voyager::image( $post->image )) !!}" alt="Image">
                 <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                 <a class="uk-position-cover" href="{{ url('news') }}/{{ $post->slug }}"></a>
             </div>
             <div class="uk-panel" >
                <h5 class="uk-panel-title">{!! substr($post->title, 0, 90)!!}</h5>
                <p>
                 <a href="{{ url('news') }}/{{ $post->slug }}">READ MORE</a> 
                 <span class="uk-float-right">{{ date('M j, Y', strtotime($post->created_at)) }}</span>
             </p>
         </div>
     </div>                                     
     @endforeach
     <!-- ====================== Posts search  =========== -->
 </div>
 <div class="uk-margin-large-top uk-margin-bottom">
    {{ $Products->links() }}
</div>
</div>
@endif
</div>
</div>
<!--  ==============================   ./ Main Content Section ==========================  -->
@endsection
