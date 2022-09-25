 <!--cat subscribe start-->
 @if (Route::currentRouteName()!='home')
 <section class="cta-subscribe bg-dark ptb-120 position-relative overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="subscribe-info-wrap text-center position-relative z-2">
                    <div class="section-heading">
                        <h4 class="h5 text-warning">@lang('web.lets_try')</h4>
                        <h2>@lang('web.start_14_day')</h2>
                        <p>@lang('web.We_can_help')</p>
                    </div>
                    <div class="form-block-banner mw-60 m-auto mt-5">
                        <a href="contact-us.html" class="btn btn-primary">Contact with Us</a>
                        <a href="http://www.youtube.com/watch?v=hAP2QF--2Dg" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn ms-lg-3 ms-md-3 mt-3 mt-lg-0">
                            <i class="fas fa-play"></i> @lang('web.watch_demo')
                        </a>
                    </div>
                    <ul class="nav justify-content-center subscribe-feature-list mt-4">
                        <li class="nav-item">
                            <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.14_day_trial')</span>
                        </li>
                        <li class="nav-item">
                            <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.no_credit_card_required')</span>
                        </li>
                        <li class="nav-item">
                            <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.support_24')</span>
                        </li>
                        <li class="nav-item">
                            <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.cancel_anytime')</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light left-5"></div>
        <div class="bg-circle rounded-circle circle-shape-1 position-absolute bg-warning right-5"></div>
    </div>
</section>
@else
<section class="cta-subscribe pt-60 pb-120 ">
    <div class="container">
        <div class="bg-gradient ptb-120 position-relative overflow-hidden rounded-custom">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="subscribe-info-wrap text-center position-relative z-2">
                        <div class="section-heading">
                            <h4 class="h5 text-warning">@lang('web.lets_try')</h4>
                            <h2>@lang('web.start_14_day')</h2>
                            <p>@lang('web.We_can_help')</p>
                        </div>
                        <div class="form-block-banner mw-60 m-auto mt-5">
                            <a href="contact-us.html" class="btn btn-primary">Contact with Us</a>
                            <a href="http://www.youtube.com/watch?v=hAP2QF--2Dg" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn ms-lg-3 ms-md-3 mt-3 mt-lg-0"> 
                                <i class="fas fa-play"></i> @lang('web.watch_demo')
                            </a>
                        </div>
                        <ul class="nav justify-content-center subscribe-feature-list mt-4">
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.14_day_trial')</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.no_credit_card_required')</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.support_24')</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>@lang('web.cancel_anytime')</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light left-5"></div>
            <div class="bg-circle rounded-circle circle-shape-1 position-absolute bg-warning right-5"></div>
        </div>
    </div>
</section>
@endif
<!--cat subscribe end-->








<!--footer section start-->
<footer class="footer-section">
    <!--footer top start-->
    <!--for light footer add .footer-light class and for dark footer add .bg-dark .text-white class-->
    <div class="footer-top  bg-gradient text-white ptb-120" style="background: url('{{asset("assets/web/img/page-header-bg.svg")}}')no-repeat bottom right">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-8 col-lg-4 mb-md-4 mb-lg-0">
                    <div class="footer-single-col">
                        <div class="footer-single-col mb-4">
                            <img src="{{asset('assets/web/img/logo-white.png')}}" alt="logo" class="img-fluid logo-white">
                            <img src="{{asset('assets/web/img/logo-color.png')}}" alt="logo" class="img-fluid logo-color">
                        </div>
                        <p>Our latest news, articles, and resources, we will sent to
                            your inbox weekly.
                        </p>
                        
                        <form class="newsletter-form position-relative d-block d-lg-flex d-md-flex">
                            <input type="text" class="input-newsletter form-control me-2" placeholder="Enter your email" name="email" required="" autocomplete="off">
                            <input type="submit" value="Subscribe" data-wait="Please wait..." class="btn btn-primary mt-3 mt-lg-0 mt-md-0">
                        </form>
                        <div class="ratting-wrap mt-4">
                            <h6 class="mb-0">10/10 Overall rating</h6>
                            <ul class="list-unstyled rating-list list-inline mb-0">
                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7 mt-4 mt-md-0 mt-lg-0">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                            <div class="footer-single-col">
                                <h3>Primary Pages</h3>
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li><a href="index.html" class="text-decoration-none">Home</a></li>
                                    <li><a href="about-us.html" class="text-decoration-none">About Us</a></li>
                                    <li><a href="services.html" class="text-decoration-none">Services</a></li>
                                    <li><a href="career.html" class="text-decoration-none">Career</a></li>
                                    <li><a href="integrations.html" class="text-decoration-none">Integrations</a>
                                    </li>
                                    <li><a href="integration-single.html" class="text-decoration-none">Integration Single</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                            <div class="footer-single-col">
                                <h3>Pages</h3>
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li><a href="pricing.html" class="text-decoration-none">Pricing</a></li>
                                    <li><a href="blog.html" class="text-decoration-none">Blog</a></li>
                                    <li><a href="blog-single.html" class="text-decoration-none">Blog Details</a></li>
                                    <li><a href="contact-us.html" class="text-decoration-none">Contact</a></li>
                                    <li><a href="career-single.html" class="text-decoration-none">Career Single</a>
                                    </li>
                                    <li><a href="service-single.html" class="text-decoration-none">Services
                                        Single</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                            <div class="footer-single-col">
                                <h3>Template</h3>
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li><a href="contact-us.html" class="text-decoration-none">Contact</a></li>
                                    <li><a href="support.html" class="text-decoration-none">Support</a></li>
                                    <li><a href="support-single.html" class="text-decoration-none">Support Single</a></li>
                                    <li><a href="team.html" class="text-decoration-none">Our Team</a></li>
                                    <li><a href="client-review.html" class="text-decoration-none">Customer Review</a></li>
                                    <li><a href="career-single.html" class="text-decoration-none">Career Single</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--footer top end-->
    
    <!--footer bottom start-->
    <div class="footer-bottom  bg-gradient text-white py-4">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7 col-lg-7">
                    <div class="copyright-text">
                        <p class="mb-lg-0 mb-md-0">&copy; 2021 Quiety Rights Reserved. Designed By <a href="https://themetags.com/" class="text-decoration-none">ThemeTags</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="footer-single-col text-start text-lg-end text-md-end">
                        <ul class="list-unstyled list-inline footer-social-list mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer bottom end-->
</footer>
<!--footer section end-->