@extends('layouts.main')
@section('content')

         <!--  ============================   start Main Content Section  ======================== -->

            <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom" >
                
                <div class="uk-grid" >
                    
                    <div id="tm-right-section"  class="uk-width-large-1-1 uk-width-medium-7-10"  
                    data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
                        
                        <div id="post-data"  class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 20}">
                            <!--   ========  ./ news.Posts ========  -->
                            @include('news.Posts')
                            <!--   ========  ./ news.Posts ========  --> 
                        </div>

                         <div class="uk-margin-large-top uk-margin-bottom">
                            <!--   ========  ./ news.Posts paginate ========  -->
                            {{ $posts->links() }}
                            <!--   ========  ./ news.Posts paginate ========  -->
                        </div>
                    </div>
                </div>
            </div>

         <!--   =========================================  ./ Main Content Section ================  -->
  
@endsection
