<!--   =========================================  ./ foreach POST Content Section ================  -->
@foreach($posts as $post)
<div>
  <div class="uk-overlay uk-overlay-hover">
   <!--   =========================================  ./ foreach image Content ================  -->
   <img src="{!! asset(Voyager::image( $post->image )) !!}" alt="Image">
   <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
   <!--   =========================================  ./ foreach slug Content ================  -->
   <a class="uk-position-cover" href="{{ url('news') }}/{{ $post->slug }}"></a>
 </div>
 <div class="uk-panel" >
  <!--   =========================================  ./ foreach title Content ================  -->
  <h5 class="uk-panel-title">{!! substr($post->title, 0, 90)!!}</h5>
  <p>
   <a href="{{ url('news') }}/{{ $post->slug }}">READ MORE</a> 
   <!--   =========================================  ./ foreach date Content ================  -->
   <span class="uk-float-right">{{ date('M j, Y', strtotime($post->created_at)) }}</span>
 </p>
</div>
</div>                                     
@endforeach
<!--   =========================================  ./ foreach POST Content Section ================  -->