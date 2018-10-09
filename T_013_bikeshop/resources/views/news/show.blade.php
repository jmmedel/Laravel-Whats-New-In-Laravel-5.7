@extends('layouts.main')
@section('content')
         <!-- ============================================      start Main Content (Media Page Section) ========================   -->
                <div id="tm-media-section" class="uk-block uk-block-small">

                    <div class="uk-container uk-container-center uk-width-8-10">
                        <div class="media-container  uk-container-center">
                            <a class="uk-button uk-button-large uk-button-link uk-text-muted" href="{{ url('news') }}">
                            <i class=" uk-icon-arrow-left uk-margin-small-right"></i> Back</a>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-medium-10-10">
                                <div  class="media-cover">
                                    <!--   ================  Post image Section ================  -->
                                    <img src="{!! asset(Voyager::image( $post->image )) !!}" width="100%" alt="{{ $post->seo_title }}" class="uk-scrollspy-inview uk-animation-fade">
                                </div>
                                
                            </div>
                            <div class="uk-width-medium-10-10">
                                <div class="">
                                    <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                                        <li class="uk-width-medium-1-2 uk-active"><a href="#">Description</a></li>
                                        <li class="uk-width-medium-1-2"><a href="#">Comments</a></li>
                                        <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false">
                                            <a>Active</a>
                                            <div class="uk-dropdown uk-dropdown-small uk-dropdown-up">
                                                <ul class="uk-nav uk-nav-dropdown"></ul>
                                                <div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    <ul id="media-tabs" class="uk-switcher">
                                         <!--   ==================  start Tab Panel 1 (Reviews Sections) ================================ -->
                                        <li>
                                            <!--   ==================  Post Title ================================ -->
                                            <h2 class="uk-text-contrast uk-margin-large-top">{{ $post->title }}</h2>
                                            <ul class="uk-subnav uk-subnav-line">
                                        <!--   ==================  Post Date ================================ -->
                                        <li><i class="uk-icon-clock-o uk-margin-small-right"></i>{{ date('M j, Y', strtotime($post->created_at)) }}</li>
                                        <!--   ==================  Post Category ================================ -->
                                        <li><i class="fas fa-award uk-margin-small-right"></i>Category : {{ $post->category->name  }}</li>
                                            </ul>
                                            <hr>
                                            <!--   ==================  Post Body ================================ -->
                                            <p class="uk-text-muted uk-h4">{{ $post->body }}</p>                                        
                                            </li>
                                            <!--    ./ Tab Panel 1  ============================================= -->
                                            <!--     start Tab Panel 2  (Reviews Section) ======================= -->

                                            <li>
                                                <div class="uk-margin-small-top">
                                                    <h3 class="uk-text-contrast uk-margin-top">Type Comment</h3>
                                                      @guest
                                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                                        <a href="" class="uk-alert-close uk-close"></a>
                                                <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> 
                                                Please <a class="uk-text-contrast" href=""> Log in</a> or Sign up to post reviews quicker.</p>
                                                    </div>
                                                    @else
                                                    @endguest
                                                    <!--   ================== FORM comments store ================================ -->
                                                    {{ Form::open(['route' => ['comments.store'], 'method' => 'POST','class' => 'uk-form uk-margin-bottom']) }}
                                                    {{ Form::hidden('post_id', $post->id) }}
                                                        <div class="uk-form-row">
                      <textarea name="Comment_content" class="uk-width-1-1" cols="30" rows="5" placeholder="Type your Comment here..."></textarea>
                      <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                                        </div>
                                                        <div class="uk-form-row">
                                                <button type="submit" class="uk-button uk-button-large uk-button-success uk-float-right">Comment</button>
                                                        </div>
                                                   {{ Form::close() }}
                                                   <!--   ================== FORM comments store ================================ -->
                                                    </div>
                                                    <div  class="uk-scrollable-box uk-responsive-width " >
                                                        <ul class="uk-comment-list uk-margin-top" >
                                                            <!--   ================== foreach comments  ================================ -->
                                                            @foreach($comments as $comment)
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                             <!--   ================== image comments  ================================ -->                           
            <img class="uk-comment-avatar uk-border-circle" src="{!! asset(Voyager::image( $comment->user->avatar )) !!}" width="50" height="50" alt="">
                                                            <!--   ================== name comments  ================================ --> 
                                                            <h4 class="uk-comment-title">{{ $comment->user->name }}</h4>
                                                            <!--   ================== date comments  ================================ --> 
                                                            <div class="uk-comment-meta">{{ date('M j, Y', strtotime($comment->created_at)) }}</div>
                                                            </header>
                                                                    <div class="uk-comment-body">
                                                                        <!--   ================== Comment_content ================================ --> 
                                                                        <p>{{ $comment->Comment_content }}</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            @endforeach
                                                            <!--   ================== foreach comments  ================================ -->
                                                        </ul>
                                                    </div>
                                                </li>
                                               <!--   ==========================  ./ Tab Panel 2 ============================ -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <!-- ============================ ./ Main Content (Media Page Section) ========================= -->
                 <!--  ==========================  Start Similar Media Section ================================== -->
                        <div class="uk-block">
                            <div class="uk-container-center uk-container uk-margin-large-bottom">
                                <h3 class="uk-margin-large-bottom uk-text-contrast">You might also like</h3>
                                <div class="uk-margin" data-uk-slideset="{small: 2, medium: 5, large: 4}">
                                    <div class="uk-slidenav-position uk-margin">
                                        <ul class="uk-slideset uk-grid uk-flex-center">
                                        <!--   ================== Foreach Posts Populars  ================================ -->
                                           @foreach($postspopulars as $postspopular)
                                            <li>
                                                 <!--   ===================== Foreach Posts Populars slug ================================ -->
                                                 <a href="{{ url('news') }}/{{ $postspopular->slug }}">
                                                    <!--   ================== Foreach Posts Populars image ================================ -->
                                                    <img src="{!! asset(Voyager::image( $postspopular->image )) !!}"  alt="" width="600" height="400">
                                                </a>
                                            </li>
                                          @endforeach
                                        <!--   ================== Foreach Posts Populars  ================================ -->
                                        </ul>
                                        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                        <a href="#" class="uk-slidenav uk-slidenav-next uk-slidenav-contrast" data-uk-slideset-item="next"></a>
                                    </div>
                                <ul class="uk-slideset-nav uk-dotnav uk-dotnav-contrast uk-flex-center uk-margin-top"></ul>
                            </div>
                        </div>
                    </div>
                 <!--   ===========================================  ./ Similar Media Section ========================================= -->
@endsection
