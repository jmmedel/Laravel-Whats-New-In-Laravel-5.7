@extends('layouts.main')
@section('content')

            <nav class="uk-navbar uk-navbar-secondary  uk-hidden-small">
            <div class="uk-container-center uk-container">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a>Contact Us</a></li>
                </ul>
                </div>
            </nav>
            <!-- ================================== start Main Content (Media Page Section) ========================== -->
                <div id="tm-media-section" class="uk-block uk-block-small">

                    <div class="uk-container uk-container-center uk-width-8-10">

                      

                        <div class="uk-grid mt-50">
                            <div class="uk-width-medium-10-10">
                                <div  class="media-cover">
                    <!-- ================================== IMAGE CONTACT (Media Page Section) ========================== -->
                    <img src="{{ Voyager::image(setting('contact.IMAGECONTACT')) }}" 
                    width="100%" alt="Image" class="uk-scrollspy-inview uk-animation-fade">
                                </div>
                                
                            </div>
                            <div class="uk-width-medium-10-10">
                                <div class="">
                                    <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                                        <li class="uk-width-medium-1-2 uk-active"><a href="#">Information</a></li>
                                        <li class="uk-width-medium-1-2"><a href="#">Message</a></li>
                                        <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Active</a>
                                        <div class="uk-dropdown uk-dropdown-small uk-dropdown-up"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div>
                                    </li>
                                    </ul>
                                    </div>

                                    <ul id="media-tabs" class="uk-switcher">

                                         <!-- ======================    start Tab Panel 1 (contact Sections)   =========== -->

                                        <li>
                                            <h2 class="uk-text-contrast uk-margin-large-top">we hope to hear you! </h2>
                                            <ul class="uk-subnav uk-subnav-line">
                                                <!-- ======================    start Tab Panel 1 (contact Sections)   =========== -->
                                                <li><i class="uk-icon-home uk-margin-small-right"></i>ADRESS {{ setting('contact.adress') }}</li>
                                                <!-- ======================    start Tab Panel 1 (contact Sections)   =========== -->
                                                <li><i class="uk-icon-phone uk-margin-small-right"></i>Phone {{ setting('contact.Phone') }}</li>
                                                <!-- ======================    start Tab Panel 1 (contact Sections)   =========== -->
                                                <li><i class="uk-icon-bell uk-margin-small-right"></i>Email {{ setting('contact.Email') }}</li>
                                            </ul>
                                            <hr>
                                            <!-- ======================    start Tab Panel 1 (contact Sections)   =========== -->
                                            <p class="uk-text-muted uk-h4">{{ setting('site.description') }}</p>
                                            </li>
                                            <!--  ======================  ./ Tab Panel 1 ==================================== -->
                                            <!-- =======================  start Tab Panel 2  (Reviews Section) ============== -->
                                            <li>
                                                <!-- ======================    session('message')   =========== -->
                                                  @if(session('message'))
                        <div class="uk-alert uk-alert-warning" data-uk-alert="">
                        <a href="" class="uk-alert-close uk-close"></a>
                        <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i><a class="uk-text-contrast">{{ session('message') }}</p>
                        </div>
                                                  @endif
                                                  <!-- ======================    session('message')   =========== -->
                                                <div class="uk-margin-small-top">
                                                    <h3 class="uk-text-contrast uk-margin-top">Leave your message</h3>
                                                    <!-- ======================    FORM  Contact =========== -->     
                                                    <form class="uk-form uk-margin-bottom" method="POST" action="/contact">
                                                        {{ csrf_field() }}
                                                        <div class="uk-form-row">
                                                            <!-- ======================  name  FORM  Contact =========== --> 
                                                            <input class="uk-width-1-1" id="name" placeholder="Your name" name="name" required>
                                                        </div>
                                                        <div class="uk-form-row">
                                                        <!-- ====================== email   FORM  Contact =========== --> 
                                                        <input class="uk-width-1-1" id="email" placeholder="john@example.com" name="email" required>
                                            
                                            
                                                        </div>
                                                        <div class="uk-form-row">
                                                           <!-- ======================  messages  FORM  Contact =========== --> 
                                            <textarea id="message" placeholder="Type your messages here" name="message" required class="uk-width-1-1" cols="30" rows="5" ></textarea>
                                            
                                                        </div>
                                                      <!-- ======================   button  FORM  Contact =========== --> 
                                                        <div class="uk-form-row">
                                    <button value="Send" class="uk-button uk-button-large uk-button-success uk-float-right" type="submit">SEND</button>
                                                           
                                                        </div>
                                                    </form>
                                                    <!-- ======================    FORM  Contact =========== --> 
                                                    </div>
                                                   
                                                </li>
                                               <!--   =================================  ./ Tab Panel 2 ========================== -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- ============================================= ./ Main Content (Media Page Section) ==================== -->

                @endsection