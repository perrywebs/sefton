@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')

    <!--   hero area start   -->
    <div class="breadcrumb-area contact contact-bg">
        <div class="container">
            <div class="breadcrumb-txt">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-sm-10">
                        <span>Contact Us</span>
                        <h1>Need information? contact us</h1>
                        <ul class="breadcumb">
                            <li><a href="/">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area-overlay"></div>
    </div>
    <!--   hero area end    -->


    <!--    contact form and map start   -->
    <div class="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <span class="section-title">Contact us</span>
                    <h2 class="section-summary">Need information fill form and send us</h2>
                    <form action="/contact" class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-element">
                                    <input name="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-element">
                                    <input name="email" type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-element">
                                    <input name="phone" type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-element">
                                    <input name="subject" type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-element reduced-mb">
                                    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-element no-margin">
                                    <input type="submit" value="Submit" onclick="window.alert('Contact Us from livechat!');" class="submit-btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="map-wrapper">
                        <div id="map"></div>
                        <div class="contact-infos">
                            <div class="single-contact-info">
                                <div class="icon-wrapper">
                                    <i class="fa fa-home"></i>
                                </div>
                                <p>143 castle road 517 district, kiyev port south Canada</p>
                            </div>
                            <div class="single-contact-info">
                                <div class="icon-wrapper">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p>+3 123 456 789</p>
                            </div>
                            <div class="single-contact-info">
                                <div class="icon-wrapper">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <p>info@yourmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    contact form and map end   -->


    <!--    call to action section start    -->
    <div class="cta-section cta-bg">
        <div class="container">
            <div class="cta-content">
                <div class="row">
                    <div class="col-md-9 col-lg-7">
                        <h3>Contact us for help with your finances.</h3>
                    </div>
                    <div class="col-md-3 col-lg-5 contact-btn-wrapper">
                        <a href="/contact" class="boxed-btn contact-btn"><span>Contact Us</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cta-overlay"></div>
    </div>
    <!--    call to action section end    -->


    <!--   partner section start    -->
    <div class="partner-section">
        <div class="container top-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="partner-carousel owl-carousel owl-theme">
                        <div class="single-partner-item">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="assets/img/partners/partner-1.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single-partner-item">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="assets/img/partners/partner-2.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single-partner-item">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="assets/img/partners/partner-3.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single-partner-item">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="assets/img/partners/partner-4.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single-partner-item">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="assets/img/partners/partner-5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   partner section end    -->
@endsection
