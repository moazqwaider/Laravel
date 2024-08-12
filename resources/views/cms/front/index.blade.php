<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>X TECH CO.</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="1x/Artboard 1-8.png" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">

        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto"
                style="padding-left: {{ app()->getLocale() == 'ar' ? '386px;' : '0px' }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">{{ trans('front_trans.home') }}<br></a></li>
                    <li><a href="#about">{{ trans('front_trans.about') }}</a></li>
                    <li><a href="#services">{{ trans('front_trans.services') }}</a></li>
                    <li><a href="#features">{{ trans('front_trans.featuers') }}</a></li>
                    <li><a href="#team">{{ trans('front_trans.team') }}</a></li>
                    <li><a href="#contact">{{ trans('front_trans.contact') }}</a></li>
                    @php
                        $currentLocale = app()->getLocale();
                    @endphp

                    <li class="dropdown"><a
                            href="#"><span>{{ $currentLocale == 'en' ? 'English' : 'العربية' }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown {{ $currentLocale == 'ar' ? 'me-2' : '' }}"></i></a>
                        <ul>
                            <!-- <li><a href="#">العربية<i class="bi bi-flag"></i></a></li> -->

                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode !== $currentLocale)
                                    <li class="dropdown">
                                        <a hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <span>{{ $properties['native'] }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted" href="#">{{ trans('front_trans.start') }}</a>
        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 class="Wauto">{{ $home->title }}</h1>
                        {{-- <p>Innovative solutions empowering business success through cutting-edge technology. Streamline operations, engage customers, and unlock growth with
              <span style="font-weight: bold; color: black;">X Tech</span> --}}
                        <p>{{ $home->description }}</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">{{ trans('front_trans.start') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section>
        <!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                </div>

            </div>

        </section>
        <!-- /Clients Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ trans('front_trans.about') }}</h2>
                <p>{{ trans('front_trans.about_detailes') }}</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ $aboutUs->title }}</h3>
                        <p>
                            {{ $aboutUs->description }}
                        </p>
                        {{-- <a href="#" class="about-btn align-self-center align-self-xl-start"><span>About us</span> <i
                class="bi bi-chevron-right"></i></a> --}}
                    </div>

                    <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-broadcast"></i>
                                <h4><a href="" class="stretched-link">{{ $aboutCard[0]->card_title }}</a></h4>
                                <p>{{ $aboutCard[0]->card_description }}</p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-clock-history"></i>
                                <h4><a href="" class="stretched-link">{{ $aboutCard[1]->card_title }}</a></h4>
                                <p>{{ $aboutCard[1]->card_description }}</p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-people"></i>
                                <h4><a href="" class="stretched-link">{{ $aboutCard[2]->card_title }}</a></h4>
                                <p>{{ $aboutCard[2]->card_description }}</p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-check2-circle"></i>
                                <h4><a href="" class="stretched-link">{{ $aboutCard[3]->card_title }}</a></h4>
                                <p>{{ $aboutCard[3]->card_description }}</p>
                            </div><!-- Icon-Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ trans('front_trans.services') }}</h2>
                <p></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <i class="{{ $services[0]->icon }}"></i>
                            <h4><a href="" class="stretched-link">{{ $services[0]->title }}</a></h4>
                            <p>{{ $services[0]->description }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <i class="{{ $services[1]->icon }}"></i>
                            <h4><a href="" class="stretched-link">{{ $services[1]->title }}</a></h4>
                            <p>{{ $services[1]->description }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <i class="{{ $services[2]->icon }}"></i>
                            <h4><a href="" class="stretched-link">{{ $services[2]->title }}</a></h4>
                            <p>{{ $services[2]->description }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <i class="{{ $services[3]->icon }}"></i>
                            <h4><a href="" class="stretched-link">{{ $services[3]->title }}</a></h4>
                            <p>{{ $services[3]->description }}</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section>
        <!-- /Services Section -->

        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ trans('front_trans.featuers') }}</h2>
                <p>{{ trans('front_trans.features_description') }}</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="features-item">
                            <i class="{{ $featuers[0]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #ffbb2c;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[0]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="features-item">
                            <i class="{{ $featuers[1]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #5578ff;"> </i>
                            <h3><a href="" class="stretched-link">{{ $featuers[1]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="features-item">
                            <i class="{{ $featuers[2]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #e80368;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[2]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-item">
                            <i class="{{ $featuers[3]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #e361ff;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[3]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="features-item">
                            <i class="{{ $featuers[4]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #47aeff;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[4]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="features-item">
                            <i class="{{ $featuers[5]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #ffa76e;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[5]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="features-item">
                            <i class="{{ $featuers[6]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #11dbcf;"></i>
                            <h3><a href="" class="stretched-link">{{ $featuers[6]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
                        <div class="features-item">
                            <i class="{{ $featuers[7]->icon }} {{ app()->getLocale() == 'ar' ? 'mx-2' : '' }}"
                                style="color: #4233ff;"></i>
                            <h3> <a href="" class="stretched-link">{{ $featuers[7]->title }}</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                </div>

            </div>

        </section>
        <!-- /Features Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ trans('front_trans.team') }}</h2>
                <p>{{ trans('front_trans.team_description') }}</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="team-member">
                                <div class="member-img">
                                    <img src="{{ Storage::url('images/'.$team->image) }}" style="height: 100%" class="img-fluid"
                                        alt="">
                                    {{-- <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div> --}}
                                </div>
                                <div class="member-info">
                                    <h4>{{$team->name}}</h4>
                                    <span>{{$team->description}}</span>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach
                    <!-- End Team Member -->

                </div>

            </div>

        </section>
        <!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ trans('front_trans.contact') }}</h2>
                <p>{{ trans('front_trans.contact_description') }}</p>
            </div><!-- End Section Title -->

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>{{ trans('front_trans.address') }}</h3>
                                <p>{{ trans('front_trans.address_detailes') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>{{ trans('front_trans.call_Us') }}</h3>
                                <p>{{ trans('front_trans.call_Us_detailes') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>{{ trans('front_trans.email') }}</h3>
                                <p>{{ trans('front_trans.email_detailes') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-7">
                        <form action="#" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ trans('front_trans.your_Name') }}" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="{{ trans('front_trans.your_Email') }}" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject"
                                        placeholder="{{ trans('front_trans.subject') }}" required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="{{ trans('front_trans.message') }}"
                                        required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">{{ trans('front_trans.send_message') }}</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright text-center ">
                @if(app()->getLocale() == 'en')
                <p>© <span>Copyright</span> <strong class="px-1 sitename">X tech</strong> <span>All Rights
                    Reserved</span></p>
                    @else
                    <p>© <span>حقوق النشر</span> <strong class="px-1 sitename">X Tech</strong> <span>جميع الحقوق محفوظة</span></p>

                @endif

            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
