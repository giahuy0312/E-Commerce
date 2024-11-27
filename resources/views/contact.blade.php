@extends('layout.main')

@include('layout.header')






<!--// Header -->

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>@lang('lang.contactus')</h2>
            <ul>
                    <li><a href="index.html">@lang('lang.trangchu')</a></li>
                    <li>@lang('lang.about')</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->

<!-- Page Content -->
<main class="page-content">

    <!-- Contact Area -->
    <div class="tm-section tm-contact-area tm-padding-section bg-white">
        <div class="container">
            <div class="tm-contact-blocks">
                <div class="row mt-30-reverse justify-content-center">

                    <!-- Contact block -->
                    <div class="col-lg-4 col-md-6  mt-30">
                        <div class="tm-contact-block text-center">
                            <i class="ion-android-call"></i>
                            <h6>@lang('lang.callus')</h6>
                            <p>@lang('lang.phone') : <a href="tel:+1900 111 999">1900 111 999</a></p>
                            <p>@lang('lang.phone') : <a href="tel:+1900 111 999">1900 111 999</a></p>
                        </div>
                    </div>
                    <!--// Contact block -->

                    <!-- Contact block -->
                    <div class="col-lg-4 col-md-6  mt-30">
                        <div class="tm-contact-block text-center">
                            <i class="ion-location"></i>
                            <h6>@lang('lang.ourlocat')</h6>
                            <p>7415 Transcanadienne, Suite 100 St. Laurent, Quebec, Canada H45T 1Z22</p>
                        </div>
                    </div>
                    <!--// Contact block -->

                    <!-- Contact block -->
                    <div class="col-lg-4 col-md-6  mt-30">
                        <div class="tm-contact-block text-center">
                            <i class="ion-email"></i>
                            <h6>@lang('lang.email')</h6>
                            <p><a href="mailto:thangvipprolk301@gmail.com">thangvipprolk301@gmail.com</a></p>
                            <p><a href="mailto:tranquangthang3160@gmail.com">tranquangthang3160@gmail.com</a></p>
                        </div>
                    </div>
                    <!--// Contact block -->

                </div>
            </div>
            <div class="tm-contact-forms tm-padding-section-top">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="tm-sectiontitle text-center">
                            <h3>@lang('lang.sendusmess')</h3>
                            <p>@lang('lang.sendusmess1')
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form id="tm-contactform" action="{{route('contact.send')}}"
                            class="tm-contact-forminner tm-form" method="POST">
                            @csrf
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-name">@lang('lang.username')</label>
                                    <input type="text" id="contact-form-name" placeholder="@lang('lang.ipname')" name="name"
                                        required>
                                    @error('name')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-email">@lang('lang.email')</label>
                                    <input type="email" id="contact-form-email" placeholder="surose@example.com"
                                        name="email" required>
                                    @error('email')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-phone">@lang('lang.phone')</label>
                                    <input type="text" id="contact-form-phone" placeholder="@lang('lang.ipphone')"
                                        name="phone" required>
                                    @error('phone')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-subject">@lang('lang.subject')</label>
                                    <input type="text" id="contact-form-subject" placeholder="@lang('lang.ipsubject')"
                                        name="subject" required>
                                    @error('subject')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="tm-form-field">
                                    <label for="contact-form-message">@lang('lang.mess')</label>
                                    <textarea cols="30" rows="5" id="contact-form-message"
                                        placeholder="Write your message" name="message" required> </textarea>
                                </div>
                                <div class="tm-form-field text-center">
                                    <button name="submit" class="tm-button" type="submit">@lang('lang.sendmess')</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messages" hidden></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--// Contact Area -->

</main>
<!--// Page Content -->


@include('layout.footer')