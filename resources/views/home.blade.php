<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NZ4HSB2B');</script>
        <!-- End Google Tag Manager -->

        <!-- Google tag (gtag.js) -->
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SL2RL1X1PM');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Primary Meta Tags -->
        <title>{{ $settings['seo']['meta_title'] ?? config('app.name', 'Edges Gate') }}</title>
        <meta name="title" content="{{ $settings['seo']['meta_title'] ?? config('app.name', 'Edges Gate') }}">
        <meta name="description" content="{{ $settings['seo']['meta_description'] ?? 'Your gate for endless software development. We craft innovative web, mobile, and software solutions.' }}">
        <meta name="keywords" content="{{ $settings['seo']['meta_keywords'] ?? 'software development, web design, mobile apps, digital solutions' }}">
        <meta name="author" content="{{ $settings['general']['site_name'] ?? 'Edges Gate' }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $settings['seo']['meta_title'] ?? config('app.name', 'Edges Gate') }}">
        <meta property="og:description" content="{{ $settings['seo']['meta_description'] ?? 'Your gate for endless software development. We craft innovative web, mobile, and software solutions.' }}">
        <meta property="og:image" content="{{ $settings['seo']['og_image'] ?? asset('images/perview.png') }}">
        <meta property="og:site_name" content="{{ $settings['general']['site_name'] ?? 'Edges Gate' }}">
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ $settings['seo']['meta_title'] ?? config('app.name', 'Edges Gate') }}">
        <meta property="twitter:description" content="{{ $settings['seo']['meta_description'] ?? 'Your gate for endless software development. We craft innovative web, mobile, and software solutions.' }}">
        <meta property="twitter:image" content="{{ $settings['seo']['og_image'] ?? asset('images/perview.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Theme Color -->
        <meta name="theme-color" content="#3db98a">
        <meta name="msapplication-TileColor" content="#3db98a">

        @vite(['resources/front/css/main.css'])
    </head>
    <body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ4HSB2B"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navbar -->
    <div class="x-navbar" x-data="layout" :class="scrolled ? 'bg-white x-shadow-light x-active' : ''">
      <div class="container mx-auto transition-all duration-300 !px-0">
        <nav class="navbar rounded-box flex w-full items-center justify-between gap-2 shadow-base-300/20 shadow-sm transition-all duration-300">
            <div class="navbar-start max-md:w-1/2">
                <a class="link text-base-content link-neutral text-xl font-bold no-underline" href="#">
                    <img src="{{ asset('images/logo-dark.svg') }}" x-show="scrolled" alt="logo" class="md:h-[50px] h-[50px] w-auto max-h-full object-contain">
                    <img src="{{ asset('images/logo-light.svg') }}" x-show="!scrolled" alt="logo" class="md:h-[50px] h-[50px] w-auto max-h-full object-contain">
                </a>
            </div>

            <div class="navbar-center max-md:hidden">
                <ul class="menu menu-horizontal p-0 font-medium x-navbar-menu">
                  <li><a href="#">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#projects">Projects</a></li>
                  <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>

            <div class="navbar-end items-center gap-4 md:hidden flex">
                <div class="dropdown relative inline-flex md:hidden order-last" @click.outside="show = false">
                  <button @click="toggle()" type="button" class="dropdown-toggle btn btn-secondary btn-circle btn-outline" aria-haspopup="menu" :aria-expanded="show" aria-label="Dropdown">
                      <span class="icon-[ph--list] size-5" x-show="!show"></span>
                      <span class="icon-[ph--x] size-5" x-show="show"></span>
                  </button>
                  <ul class="dropdown-menu min-w-60 absolute top-full right-0 mt-2 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
                      role="menu"
                      aria-orientation="vertical"
                      :class="show ? 'opacity-100 visible' : 'opacity-0 invisible'"
                    >
                      <li><a @click="show = false" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200" href="#">Home</a></li>
                      <li><a @click="show = false" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200" href="#about">About</a></li>
                      <li><a @click="show = false" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200" href="#services">Services</a></li>
                      <li><a @click="show = false" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200" href="#projects">Projects</a></li>
                      <li><a @click="show = false" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200" href="#contact">Contact Us</a></li>
                  </ul>
                </div>
            </div>
        </nav>
      </div>
    </div>

    <!-- Hero -->
    <section class="relative md:h-[760px] h-auto md:py-0 py-16 flex items-center justify-end overflow-hidden" id="home">
      <img src="{{ asset('images/hero.png') }}" alt="hero-bg" class="absolute inset-0 w-full h-full object-cover z-10">
      <img src="{{ asset('images/hero-arrow.svg') }}" alt="hero-arrow" class="absolute bottom-0 start-0 md:h-52 h-32 w-auto object-contain z-0">

      <div class="w-fit max-w-full ms-auto relative z-10 md:-mt-32 mt-10 text-center relative z-20">
        <div class="">
          <h1 class="hero-title w-fit bg-white text-primary px-3 pb-2 leading-[130%] 2xl:text-[96px] xl:text-[72px] lg:text-[50px] md:text-[40px] text-[20px] relative md:-end-14 -end-4 w-fit ms-auto overflow-hidden">
            your gate for non endless
          </h1>
          <div class="ms-auto w-fit relative -end-4 text-start">
            <div class="text-white 2xl:text-[64px] xl:text-[50px] lg:text-[40px] md:text-[32px] text-[20px] w-fit my-2 hero-subtitle overflow-hidden">software development</div>
            <a href="#contact" class="btn btn-outline btn-light text-white border-white hover:bg-white/30 md:btn-lg btn-sm rounded-none ms-1 hero-button overflow-hidden">Get Started</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    @if($services->count() > 0)
    <section class="md:py-20 py-10" id="services">
      <div class="container overflow-hidden">
        <h2 class="x-title services-title split-text">Services</h2>

        <div class="md:mt-[26px] mt-4 relative">
          <!-- Slider main container -->
          <div class="swiper services-slider !overflow-visible x-services-slider-style">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              @foreach($services as $service)
              <div class="swiper-slide md:max-w-[438px] max-w-[400px]">
                <div class="x-service-card hover-3d">
                  <div class="x-service-card__img">
                    @if($service->image)
                      <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}">
                    @else
                      <img src="{{ asset('images/content-creator.gif') }}" alt="{{ $service->name }}">
                    @endif
                  </div>
                  <h3 class="x-service-card__title">{{ $service->name }}</h3>
                  <p class="x-service-card__description">{{ $service->description }}</p>
                </div>
              </div>
              @endforeach
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">
              <svg width="70" height="70" viewBox="0 0 70 70" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7183 27.2557C19.992 26.311 22.3065 25.3373 24.6556 24.5845C24.8475 24.5092 25.5841 25.8876 25.5433 25.9166C23.3739 27.0939 21.1699 28.0503 18.9251 29.0357C17.9946 29.4531 16.2329 29.9101 15.2612 30.7866C16.0048 31.0549 16.7892 31.2942 17.5736 31.5334C17.2372 30.975 16.8951 30.2364 16.8951 30.2364C24.6922 27.9964 33.0976 27.4718 41 29.5157C47.0546 31.0342 53.6946 33.9774 56.5822 39.8398C56.9532 40.6191 55.6532 38.9668 55.5199 38.6935C54.0703 35.7971 49.2947 33.9198 46.4305 32.8294C43.4676 31.6867 40.3937 30.9913 37.2322 30.6039C31.1475 29.9049 24.9971 30.6647 19.0436 31.9595C20.136 32.2863 21.1993 32.5724 22.3033 32.8295C22.9192 33.0046 23.1498 34.6207 23.5972 34.7317C20.5233 34.0363 17.595 33.1144 14.661 32.0123C14.295 31.8433 13.3376 30.4995 13.3672 30.1101C13.3982 28.4304 16.4447 27.7947 17.7183 27.2557Z" fill="currentColor"/>
              </svg>
            </div>
            <div class="swiper-button-next">
              <svg width="70" height="70" viewBox="0 0 70 70" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.0164 27.2557C49.7426 26.311 47.4281 25.3373 45.079 24.5845C44.8871 24.5092 44.1506 25.8876 44.1913 25.9166C46.3607 27.0939 48.5648 28.0503 50.8095 29.0357C51.74 29.4531 53.5017 29.9101 54.4734 30.7866C53.7298 31.0549 52.9454 31.2942 52.161 31.5334C52.4975 30.975 52.8395 30.2364 52.8395 30.2364C45.0424 27.9964 36.6371 27.4718 28.7347 29.5157C22.68 31.0342 16.04 33.9774 13.1525 39.8398C12.7814 40.6191 14.0814 38.9668 14.2148 38.6935C15.6644 35.7971 20.4399 33.9198 23.3041 32.8294C26.267 31.6867 29.3409 30.9913 32.5024 30.6039C38.5871 29.9049 44.7376 30.6647 50.691 31.9595C49.5987 32.2863 48.5353 32.5724 47.4313 32.8295C46.8154 33.0046 46.5848 34.6207 46.1374 34.7317C49.2113 34.0363 52.1397 33.1144 55.0736 32.0123C55.4396 31.8433 56.397 30.4995 56.3675 30.1101C56.3364 28.4304 53.2899 27.7947 52.0164 27.2557Z" fill="currentColor"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- CTA -->
    <section class="md:py-20 py-16 relative scroll-up-fade" id="cta">
      <img src="{{ asset('images/bg-1.png') }}" alt="cta-bg" class="absolute inset-0 md:w-full h-full object-cover z-0">

      <div class="container relative z-10">
        <div class="text-center">
          <h2 class="md:text-5xl md:tex-[40px] text-3xl text-white font-bold font-primary">{{ $settings['general']['cta_title'] ?? 'Ready to start ?' }}</h2>
          <p class="font-content text-white font-light my-7">
            {{ $settings['general']['cta_description'] ?? 'Transform Your Ideas into Digital Solutions. Explore our portfolio of innovative
            software, web, and mobile projects, and let’s build the future together.Transform
            Your Ideas into Digital Solutions. Explore our portfolio of innovative software, web,
            and mobile projects, and let’s build the future together.' }}
          </p>
          <a href="#contact" class="btn h-[40px] text-sm bg-white border-[2px] border-primary/30 rounded-none btn-outline font-content">Contact Us</a>
        </div>
      </div>

      <img src="{{ asset('images/scroll-up.gif') }}" alt="cta-arrow" class="absolute bottom-0 md:translate-y-1/4 translate-y-1/2 end-[50%] translate-x-1/2 h-20 w-auto object-contain z-0">
    </section>

    <!-- About Us -->
    <section class="md:py-20 py-10" id="about">
      <div class="container overflow-hidden">
        <h2 class="x-title about-title split-text">About Us</h2>

        <div class="md:mt-[70px] mt-12 relative">
          <div class="flex gap-x-20 gap-y-6 items-center overflow-hidden w-full max-w-full md:flex-row flex-col">
            <div class="md:w-[336px] w-full">
              <img src="{{ asset('images/logo-icon.svg') }}" alt="about-us" class="md:w-full w-32 mx-auto object-cover">
            </div>

            <div class="w-full max-w-full">
              <h2 class="font-secondary md:mb-6 mb-4 text-3xl" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">{{ $settings['general']['about_us_title'] ?? 'Solving Problems Throw Software Development' }}</h2>
              <p class="font-content text-base font-light" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                {{ $settings['general']['about_us_description'] ?? 'Transform Your Ideas into Digital Solutions. Explore our portfolio of innovative
                software, web, and mobile projects, and let’s build the future together.Transform
                Your Ideas into Digital Solutions. Explore our portfolio of innovative software, web,
                and mobile projects, and let’s build the future together.' }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Projects -->
    @if($projects->count() > 0)
    <section class="md:py-20 py-10" id="projects">
      <div class="container overflow-hidden">
        <h2 class="x-title projects-title split-text">Our Projects</h2>

        <div class="md:mt-[26px] mt-4 relative">
          <!-- Slider main container -->
          <div class="swiper projects-slider !overflow-visible x-projects-slider-style">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              @foreach($projects as $project)
              <div class="swiper-slide md:max-w-[668px] max-w-[400px]">
                <div class="x-project-card">
                  <div class="x-project-card__img">
                    @if($project->image)
                      <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
                    @else
                      <img src="{{ asset('images/project-1.png') }}" alt="{{ $project->name }}">
                    @endif
                  </div>
                  <div class="x-project-card__content">
                    <h3 class="x-project-card__title">{{ $project->name }}</h3>
                    <p class="x-project-card__tag">{{ $project->tag }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">
              <svg width="70" height="70" viewBox="0 0 70 70" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7183 27.2557C19.992 26.311 22.3065 25.3373 24.6556 24.5845C24.8475 24.5092 25.5841 25.8876 25.5433 25.9166C23.3739 27.0939 21.1699 28.0503 18.9251 29.0357C17.9946 29.4531 16.2329 29.9101 15.2612 30.7866C16.0048 31.0549 16.7892 31.2942 17.5736 31.5334C17.2372 30.975 16.8951 30.2364 16.8951 30.2364C24.6922 27.9964 33.0976 27.4718 41 29.5157C47.0546 31.0342 53.6946 33.9774 56.5822 39.8398C56.9532 40.6191 55.6532 38.9668 55.5199 38.6935C54.0703 35.7971 49.2947 33.9198 46.4305 32.8294C43.4676 31.6867 40.3937 30.9913 37.2322 30.6039C31.1475 29.9049 24.9971 30.6647 19.0436 31.9595C20.136 32.2863 21.1993 32.5724 22.3033 32.8295C22.9192 33.0046 23.1498 34.6207 23.5972 34.7317C20.5233 34.0363 17.595 33.1144 14.661 32.0123C14.295 31.8433 13.3376 30.4995 13.3672 30.1101C13.3982 28.4304 16.4447 27.7947 17.7183 27.2557Z" fill="currentColor"/>
              </svg>
            </div>
            <div class="swiper-button-next">
              <svg width="70" height="70" viewBox="0 0 70 70" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.0164 27.2557C49.7426 26.311 47.4281 25.3373 45.079 24.5845C44.8871 24.5092 44.1506 25.8876 44.1913 25.9166C46.3607 27.0939 48.5648 28.0503 50.8095 29.0357C51.74 29.4531 53.5017 29.9101 54.4734 30.7866C53.7298 31.0549 52.9454 31.2942 52.161 31.5334C52.4975 30.975 52.8395 30.2364 52.8395 30.2364C45.0424 27.9964 36.6371 27.4718 28.7347 29.5157C22.68 31.0342 16.04 33.9774 13.1525 39.8398C12.7814 40.6191 14.0814 38.9668 14.2148 38.6935C15.6644 35.7971 20.4399 33.9198 23.3041 32.8294C26.267 31.6867 29.3409 30.9913 32.5024 30.6039C38.5871 29.9049 44.7376 30.6647 50.691 31.9595C49.5987 32.2863 48.5353 32.5724 47.4313 32.8295C46.8154 33.0046 46.5848 34.6207 46.1374 34.7317C49.2113 34.0363 52.1397 33.1144 55.0736 32.0123C55.4396 31.8433 56.397 30.4995 56.3675 30.1101C56.3364 28.4304 53.2899 27.7947 52.0164 27.2557Z" fill="currentColor"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- <div class="sticky inset-0 pointer-events-none overflow-hidden z-0 flex items-center justify-center">
      <div class="h-fit w-fit top-[-50%] relative">
        <div class="bg-black h-[100vh] w-screen aspect-square" id="circle-reveal"></div>
      </div>
    </div> -->

    <!-- Contact -->
    <section class="py-14 relative z-10 bg-black" id="contact">
      <div class="container">
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
          <div class="md:col-span-2 col-span-1">
            <div class="bg-primary md:px-[36px] md:py-[83px] p-6 rounded-3xl h-full">

            <div class="split-text">
                <h2 class="text-white md:text-3xl text-2xl font-bold leading-[160%] contact-title split-text">
                    Have <span class="text-black">Question, Project, Consultant</span> or Any thing? <span class="text-[#FFCACA]">Don't hesitate</span> we are here.
                </h2>
            </div>

              <form class="md:mt-[60px] mt-10" x-data="contactForm" @submit.prevent="submit">
                <!-- Success Message -->
                <div x-show="success" x-transition class="mb-6 p-4 bg-black/20 border border-black/30 rounded-lg">
                  <p class="text-white font-medium" x-text="successMessage"></p>
                </div>

                <!-- Error Message -->
                <div x-show="errorMessage && !success" x-transition class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-lg">
                  <p class="text-white font-medium" x-text="errorMessage"></p>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-x-8 gap-y-[47px]">

                  <div class="x-input-group">
                    <label class="x-input-label">Your Name</label>
                    <input
                      type="text"
                      class="x-input"
                      :class="errors.name ? 'border-red-500' : ''"
                      placeholder="Enter Your Name Here"
                      x-model="form.name"
                      required
                    >
                    <p x-show="errors.name" class="text-red-300 text-sm mt-1" x-text="errors.name?.[0]"></p>
                  </div>

                  <div class="x-input-group">
                    <label class="x-input-label">Email / Phone</label>
                    <input
                      type="text"
                      class="x-input"
                      :class="errors.email_or_phone ? 'border-red-500' : ''"
                      placeholder="Enter Contact Email or Phone"
                      x-model="form.email_or_phone"
                      required
                    >
                    <p x-show="errors.email_or_phone" class="text-red-300 text-sm mt-1" x-text="errors.email_or_phone?.[0]"></p>
                  </div>

                  <div class="x-input-group md:col-span-2">
                    <label class="x-input-label">Your Message</label>
                    <textarea
                      class="x-input min-h-[100px]"
                      :class="errors.message ? 'border-red-500' : ''"
                      placeholder="Enter Your Message"
                      x-model="form.message"
                      rows="3"
                    ></textarea>
                    <p x-show="errors.message" class="text-red-300 text-sm mt-1" x-text="errors.message?.[0]"></p>
                  </div>

                  <div class="md:col-span-2">
                    <button
                      type="submit"
                      class="btn btn-neutral btn-outline btn-lg border-black rounded-full font-inter w-[197px] max-w-full flex justify-between !h-[70px] !p-[10px]"
                      :disabled="loading"
                      :class="loading ? 'opacity-70 cursor-not-allowed' : ''"
                    >
                      <span class="px-4 text-xl text-black" x-text="loading ? 'Sending...' : 'Submit'"></span>
                      <svg x-show="!loading" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="50" height="50" rx="25" fill="black"/>
                        <path d="M34.0001 17V30C34.0001 30.2652 33.8947 30.5196 33.7072 30.7071C33.5196 30.8946 33.2653 31 33.0001 31C32.7349 31 32.4805 30.8946 32.293 30.7071C32.1054 30.5196 32.0001 30.2652 32.0001 30V19.4137L17.7076 33.7075C17.5199 33.8951 17.2654 34.0006 17.0001 34.0006C16.7347 34.0006 16.4802 33.8951 16.2926 33.7075C16.1049 33.5199 15.9995 33.2654 15.9995 33C15.9995 32.7346 16.1049 32.4801 16.2926 32.2925L30.5863 18H20.0001C19.7349 18 19.4805 17.8946 19.293 17.7071C19.1054 17.5196 19.0001 17.2652 19.0001 17C19.0001 16.7348 19.1054 16.4804 19.293 16.2929C19.4805 16.1054 19.7349 16 20.0001 16H33.0001C33.2653 16 33.5196 16.1054 33.7072 16.2929C33.8947 16.4804 34.0001 16.7348 34.0001 17Z" fill="#3DB98A"/>
                      </svg>
                      <!-- Loading spinner -->
                      <div x-show="loading" class="w-[50px] h-[50px] min-w-[50px] flex items-center justify-center bg-black rounded-full">
                        <svg class="animate-spin h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                      </div>
                    </button>
                  </div>

                </div>
              </form>

            </div>
          </div>
          <div class="">
            <div class="flex flex-col gap-6">

              <div class="x-contact-info" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                <div class="x-contact-info__title">
                  <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="63" height="63" rx="31.5" stroke="#DADADA"/>
                    <path d="M47.7625 16.0921C47.5689 15.9249 47.3332 15.8137 47.081 15.7705C46.8288 15.7272 46.5696 15.7536 46.3313 15.8468L14.6657 28.239C14.2169 28.4135 13.8369 28.7291 13.583 29.1382C13.3291 29.5473 13.215 30.0279 13.2578 30.5075C13.3007 30.9871 13.4981 31.4398 13.8205 31.7974C14.1429 32.1551 14.5727 32.3984 15.0453 32.4906L23.25 34.1015V43.25C23.2484 43.7483 23.3965 44.2356 23.6751 44.6487C23.9537 45.0619 24.35 45.3818 24.8125 45.5671C25.2744 45.7557 25.7823 45.801 26.2703 45.6971C26.7582 45.5931 27.2036 45.3448 27.5485 44.9843L31.5047 40.8812L37.7813 46.375C38.2341 46.7766 38.8182 46.9989 39.4235 47C39.6887 46.9997 39.9523 46.9581 40.2047 46.8765C40.6171 46.7457 40.9881 46.509 41.2806 46.1902C41.5731 45.8714 41.777 45.4815 41.8719 45.0593L48.2141 17.4687C48.2708 17.2199 48.2588 16.9603 48.1792 16.7178C48.0997 16.4753 47.9556 16.259 47.7625 16.0921ZM38.2094 21.7171L24.211 31.7421L16.461 30.2218L38.2094 21.7171ZM25.75 43.25V35.8312L29.6235 39.2281L25.75 43.25ZM39.4266 44.5L26.5078 33.1718L45.1016 19.8453L39.4266 44.5Z" fill="#DADADA"/>
                  </svg>
                  <span>TELEGRAM</span>
                </div>

                <a href="{{ $settings['social']['telegram'] ?? '#' }}" target="_blank" class="x-contact-info__action">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="currentColor"/>
                    <path d="M29.0001 12V25C29.0001 25.2652 28.8947 25.5196 28.7072 25.7071C28.5196 25.8946 28.2653 26 28.0001 26C27.7349 26 27.4805 25.8946 27.293 25.7071C27.1054 25.5196 27.0001 25.2652 27.0001 25V14.4137L12.7076 28.7075C12.5199 28.8951 12.2654 29.0006 12.0001 29.0006C11.7347 29.0006 11.4802 28.8951 11.2926 28.7075C11.1049 28.5199 10.9995 28.2654 10.9995 28C10.9995 27.7346 11.1049 27.4801 11.2926 27.2925L25.5863 13H15.0001C14.7349 13 14.4805 12.8946 14.293 12.7071C14.1054 12.5196 14.0001 12.2652 14.0001 12C14.0001 11.7348 14.1054 11.4804 14.293 11.2929C14.4805 11.1054 14.7349 11 15.0001 11H28.0001C28.2653 11 28.5196 11.1054 28.7072 11.2929C28.8947 11.4804 29.0001 11.7348 29.0001 12Z" fill="black"/>
                  </svg>

                  <span>Join Chat</span>
                </a>
              </div>

              <div class="x-contact-info" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                <div class="x-contact-info__title">
                  <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M43.7501 20.1833C42.2219 18.6402 40.4018 17.4166 38.3959 16.5839C36.3901 15.7513 34.2386 15.3261 32.0667 15.3333C22.9667 15.3333 15.5501 22.75 15.5501 31.85C15.5501 34.7667 16.3167 37.6 17.7501 40.1L15.4167 48.6667L24.1667 46.3667C26.5834 47.6833 29.3001 48.3833 32.0667 48.3833C41.1667 48.3833 48.5834 40.9667 48.5834 31.8667C48.5834 27.45 46.8667 23.3 43.7501 20.1833ZM32.0667 45.5833C29.6001 45.5833 27.1834 44.9167 25.0667 43.6667L24.5667 43.3667L19.3667 44.7333L20.7501 39.6667L20.4167 39.15C19.046 36.9618 18.3183 34.4321 18.3167 31.85C18.3167 24.2833 24.4834 18.1167 32.0501 18.1167C35.7167 18.1167 39.1667 19.55 41.7501 22.15C43.0294 23.4231 44.0433 24.9376 44.7328 26.6056C45.4223 28.2735 45.7737 30.0618 45.7667 31.8667C45.8001 39.4333 39.6334 45.5833 32.0667 45.5833ZM39.6001 35.3167C39.1834 35.1167 37.1501 34.1167 36.7834 33.9667C36.4001 33.8333 36.1334 33.7667 35.8501 34.1667C35.5667 34.5833 34.7834 35.5167 34.5501 35.7833C34.3167 36.0667 34.0667 36.1 33.6501 35.8833C33.2334 35.6833 31.9001 35.2333 30.3334 33.8333C29.1001 32.7333 28.2834 31.3833 28.0334 30.9667C27.8001 30.55 28.0001 30.3333 28.2167 30.1167C28.4001 29.9333 28.6334 29.6333 28.8334 29.4C29.0334 29.1667 29.1167 28.9833 29.2501 28.7167C29.3834 28.4333 29.3167 28.2 29.2167 28C29.1167 27.8 28.2834 25.7667 27.9501 24.9333C27.6167 24.1333 27.2667 24.2333 27.0167 24.2167H26.2167C25.9334 24.2167 25.5001 24.3167 25.1167 24.7333C24.7501 25.15 23.6834 26.15 23.6834 28.1833C23.6834 30.2167 25.1667 32.1833 25.3667 32.45C25.5667 32.7333 28.2834 36.9 32.4167 38.6833C33.4001 39.1167 34.1667 39.3667 34.7667 39.55C35.7501 39.8667 36.6501 39.8167 37.3667 39.7167C38.1667 39.6 39.8167 38.7167 40.1501 37.75C40.5001 36.7833 40.5001 35.9667 40.3834 35.7833C40.2667 35.6 40.0167 35.5167 39.6001 35.3167Z" fill="#DADADA"/>
                    <rect x="0.5" y="0.5" width="63" height="63" rx="31.5" stroke="#DADADA"/>
                  </svg>
                  <span>WHATSAPP</span>
                </div>

                <a href="{{ $settings['social']['whatsapp'] ?? '#' }}" target="_blank" class="x-contact-info__action">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="currentColor"/>
                    <path d="M29.0001 12V25C29.0001 25.2652 28.8947 25.5196 28.7072 25.7071C28.5196 25.8946 28.2653 26 28.0001 26C27.7349 26 27.4805 25.8946 27.293 25.7071C27.1054 25.5196 27.0001 25.2652 27.0001 25V14.4137L12.7076 28.7075C12.5199 28.8951 12.2654 29.0006 12.0001 29.0006C11.7347 29.0006 11.4802 28.8951 11.2926 28.7075C11.1049 28.5199 10.9995 28.2654 10.9995 28C10.9995 27.7346 11.1049 27.4801 11.2926 27.2925L25.5863 13H15.0001C14.7349 13 14.4805 12.8946 14.293 12.7071C14.1054 12.5196 14.0001 12.2652 14.0001 12C14.0001 11.7348 14.1054 11.4804 14.293 11.2929C14.4805 11.1054 14.7349 11 15.0001 11H28.0001C28.2653 11 28.5196 11.1054 28.7072 11.2929C28.8947 11.4804 29.0001 11.7348 29.0001 12Z" fill="black"/>
                  </svg>

                  <span>Join Chat</span>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="md:pt-[133px] pt-20 relative overflow-hidden bg-black">
      <div class="container relative z-10">

        <!-- Footer Header -->
        <div class="flex justify-center flex-col md:pb-[60px] pb-10 w-[500px] mx-auto text-center max-w-full">
          <div class="text-primary">Get Start ?</div>

          <h2 class="md:text-[64px] text-4xl text-white leading-[150%] py-5 footer-title">
            Let’s Work Together
          </h2>

          <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ $settings['social']['facebook'] }}" target="_blank" class="x-social-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
              </svg>
              <span>Facebook</span>
            </a>
            <!-- <div class="x-social-item">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4249 7.33V8.74417C10.721 8.29306 11.1292 7.92658 11.6095 7.68059C12.0898 7.4346 12.6258 7.31753 13.1649 7.34083C16.0441 7.34083 16.6666 9.14083 16.6666 11.4825V16.25H13.9999V12.0233C13.9999 11.015 13.7966 9.71833 12.2266 9.71833C10.7041 9.71833 10.4441 10.8158 10.4441 11.9483V16.25H7.78573V7.33H10.4249ZM5.99989 5.08833C5.99956 5.3525 5.92126 5.6107 5.77479 5.83054C5.62833 6.05039 5.42022 6.22211 5.17656 6.32417C4.933 6.4254 4.66483 6.45188 4.40617 6.40024C4.14751 6.3486 3.91007 6.22117 3.72406 6.03417C3.5377 5.84705 3.41082 5.60901 3.35939 5.34997C3.30795 5.09094 3.33425 4.82248 3.43498 4.57836C3.53572 4.33423 3.70638 4.12534 3.92551 3.97795C4.14465 3.83056 4.40247 3.75125 4.66656 3.75C4.84208 3.75 5.01587 3.78465 5.17796 3.85197C5.34006 3.91929 5.48726 4.01795 5.61114 4.14229C5.73502 4.26663 5.83313 4.41421 5.89984 4.57655C5.96655 4.7389 6.00055 4.91282 5.99989 5.08833Z" fill="white"/>
                <path d="M5.99992 7.34082H3.33325V16.25H5.99992V7.34082Z" fill="white"/>
              </svg>
              <span>Linkedin</span>
            </div>
            <div class="x-social-item">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_46_113)">
                <mask id="mask0_46_113" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                <path d="M0 0H20V20H0V0Z" fill="white"/>
                </mask>
                <g mask="url(#mask0_46_113)">
                <path d="M14.6 2.93701H17.0537L11.6937 9.07873L18 17.4376H13.0629L9.19314 12.369L4.77029 17.4376H2.31429L8.04686 10.8662L2 2.93815H7.06286L10.5554 7.57015L14.6 2.93701ZM13.7371 15.9656H15.0971L6.32 4.33244H4.86171L13.7371 15.9656Z" fill="white"/>
                </g>
                </g>
                <defs>
                <clipPath id="clip0_46_113">
                <rect width="20" height="20" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <span>Twitter - X</span>
            </div>
            <div class="x-social-item">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.50008 1.6665H13.5001C16.1667 1.6665 18.3334 3.83317 18.3334 6.49984V13.4998C18.3334 14.7817 17.8242 16.0111 16.9178 16.9175C16.0113 17.8239 14.782 18.3332 13.5001 18.3332H6.50008C3.83341 18.3332 1.66675 16.1665 1.66675 13.4998V6.49984C1.66675 5.21796 2.17597 3.98858 3.0824 3.08215C3.98882 2.17573 5.2182 1.6665 6.50008 1.6665ZM6.33341 3.33317C5.53777 3.33317 4.7747 3.64924 4.21209 4.21185C3.64949 4.77446 3.33341 5.53752 3.33341 6.33317V13.6665C3.33341 15.3248 4.67508 16.6665 6.33341 16.6665H13.6667C14.4624 16.6665 15.2255 16.3504 15.7881 15.7878C16.3507 15.2252 16.6667 14.4622 16.6667 13.6665V6.33317C16.6667 4.67484 15.3251 3.33317 13.6667 3.33317H6.33341ZM14.3751 4.58317C14.6513 4.58317 14.9163 4.69292 15.1117 4.88827C15.307 5.08362 15.4167 5.34857 15.4167 5.62484C15.4167 5.9011 15.307 6.16606 15.1117 6.36141C14.9163 6.55676 14.6513 6.6665 14.3751 6.6665C14.0988 6.6665 13.8339 6.55676 13.6385 6.36141C13.4432 6.16606 13.3334 5.9011 13.3334 5.62484C13.3334 5.34857 13.4432 5.08362 13.6385 4.88827C13.8339 4.69292 14.0988 4.58317 14.3751 4.58317ZM10.0001 5.83317C11.1052 5.83317 12.165 6.27216 12.9464 7.05356C13.7278 7.83496 14.1667 8.89477 14.1667 9.99984C14.1667 11.1049 13.7278 12.1647 12.9464 12.9461C12.165 13.7275 11.1052 14.1665 10.0001 14.1665C8.89501 14.1665 7.8352 13.7275 7.0538 12.9461C6.2724 12.1647 5.83341 11.1049 5.83341 9.99984C5.83341 8.89477 6.2724 7.83496 7.0538 7.05356C7.8352 6.27216 8.89501 5.83317 10.0001 5.83317ZM10.0001 7.49984C9.33704 7.49984 8.70115 7.76323 8.23231 8.23207C7.76347 8.70091 7.50008 9.3368 7.50008 9.99984C7.50008 10.6629 7.76347 11.2988 8.23231 11.7676C8.70115 12.2364 9.33704 12.4998 10.0001 12.4998C10.6631 12.4998 11.299 12.2364 11.7678 11.7676C12.2367 11.2988 12.5001 10.6629 12.5001 9.99984C12.5001 9.3368 12.2367 8.70091 11.7678 8.23207C11.299 7.76323 10.6631 7.49984 10.0001 7.49984Z" fill="white"/>
              </svg>
              <span>Instagram</span>
            </div> -->
          </div>
        </div>

        <!-- Footer Content -->
        <div class="flex flex-wrap flex-row justify-between w-full md:gap-0 gap-10">

          <div class="w-96 max-w-full" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
            <img
              src="{{ asset('images/logo-light.svg') }}"
              loading="lazy"
              alt="logo"
              class="h-[40px] max-w-full"
            />
          </div>

          <div class="w-96 max-w-full" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
            <h3 class="md:text-[26px] text-xl font-bold text-white flex items-center gap-2 md:mb-6 mb-4">Quick Links</h3>
            <ul class="x-footer-list">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>

          <div class="w-96 max-w-full" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
            <h3 class="md:text-[20px] text-xl font-bold text-white flex items-center gap-2 md:mb-6 mb-4">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 8C15.0111 8 14.0444 8.29325 13.2221 8.84265C12.3999 9.39206 11.759 10.173 11.3806 11.0866C11.0022 12.0002 10.9031 13.0055 11.0961 13.9755C11.289 14.9454 11.7652 15.8363 12.4645 16.5355C13.1637 17.2348 14.0546 17.711 15.0245 17.9039C15.9945 18.0969 16.9998 17.9978 17.9134 17.6194C18.827 17.241 19.6079 16.6001 20.1573 15.7779C20.7068 14.9556 21 13.9889 21 13C21 11.6739 20.4732 10.4021 19.5355 9.46447C18.5979 8.52678 17.3261 8 16 8ZM16 16C15.4067 16 14.8266 15.8241 14.3333 15.4944C13.8399 15.1648 13.4554 14.6962 13.2284 14.1481C13.0013 13.5999 12.9419 12.9967 13.0576 12.4147C13.1734 11.8328 13.4591 11.2982 13.8787 10.8787C14.2982 10.4591 14.8328 10.1734 15.4147 10.0576C15.9967 9.94189 16.5999 10.0013 17.1481 10.2284C17.6962 10.4554 18.1648 10.8399 18.4944 11.3333C18.8241 11.8266 19 12.4067 19 13C19 13.7956 18.6839 14.5587 18.1213 15.1213C17.5587 15.6839 16.7956 16 16 16ZM16 2C13.0836 2.00331 10.2877 3.1633 8.22548 5.22548C6.1633 7.28766 5.00331 10.0836 5 13C5 16.925 6.81375 21.085 10.25 25.0312C11.794 26.8144 13.5318 28.4202 15.4312 29.8188C15.5994 29.9365 15.7997 29.9997 16.005 29.9997C16.2103 29.9997 16.4106 29.9365 16.5788 29.8188C18.4747 28.4196 20.2091 26.8139 21.75 25.0312C25.1812 21.085 27 16.925 27 13C26.9967 10.0836 25.8367 7.28766 23.7745 5.22548C21.7123 3.1633 18.9164 2.00331 16 2ZM16 27.75C13.9338 26.125 7 20.1562 7 13C7 10.6131 7.94821 8.32387 9.63604 6.63604C11.3239 4.94821 13.6131 4 16 4C18.3869 4 20.6761 4.94821 22.364 6.63604C24.0518 8.32387 25 10.6131 25 13C25 20.1537 18.0662 26.125 16 27.75Z" fill="white"/>
              </svg>
              <span>Egypt, Cairo</span>
            </h3>
            <ul class="x-footer-list">
              <li><a href="mailto:{{ $settings['contact']['email'] ?? '#' }}">{{ $settings['contact']['email'] ?? '#' }}</a></li>
              <li><a href="tel:{{ $settings['contact']['phone'] ?? '#' }}">{{ $settings['contact']['phone'] ?? '#' }}</a></li>
            </ul>
          </div>

        </div>
      </div>

      <img src="{{ asset('images/footer.svg') }}" alt="footer-bg" class="w-full flex relative md:mt-[-250px] mt-0 z-0">
    </footer>

    @vite(['resources/front/js/main.js'])
    </body>
</html>
