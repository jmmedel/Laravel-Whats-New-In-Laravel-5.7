@extends('layouts.app')

@section('content')
<!-- ============================================= START Main Content ================================================= -->
<div class="uk-overlay uk-text-center uk-vertical-align  min-h min-w">
    <!-- =============== TO CHANGE  background video THIS IS THE PLACE ================== -->
    <iframe data-uk-cover src="{{ setting('site.backgroundvideo') }}?autoplay=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;loop=1&amp;modestbranding=1&amp;wmode=transparent" width="560" height="615" frameborder="0" allowfullscreen=""></iframe>
    <div class="uk-vertical-align  uk-overlay-panel uk-overlay-background">
        <div class=" uk-vertical-align-middle uk-text-center  uk-width-medium-3-10 uk-width-large-2-10 uk-container-center">

            <div class="uk-margin-large-bottom  uk-animation-reverse uk-animation-scale uk-animation-hover">
                <img class="uk-margin uk-margin-remove" width="200" height="40" alt="logo" src="{{ Voyager::image(setting('site.logo')) }}"/>
            </div>
            <!-- =============== TO CHANGE  alert HAVE THIS IS THE PLACE ================== -->
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form class="uk-form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                <h2 class="uk-margin-large-bottom uk-text-muted">{{ __('Reset Password') }}</h2>
                <div class="uk-form-row">
                    <div class="uk-form-icon uk-form-icon-flip uk-width-1-1">

                       <input id="email" type="email" placeholder="Email" class="uk-width-1-1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                       @if ($errors->has('email'))
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <i class="uk-icon-envelope"></i>
                </div>                   
            </div>
            <div class="uk-form-row">
               <button type="submit" class="uk-width-1-1 uk-button uk-button-danger uk-button-large">
                   {{ __('Send Password Reset Link') }}
               </button>

           </div>

       </form>
   </div>
</div>
</div>
<!-- ============================================= END Main Content ================================================= -->


@endsection

