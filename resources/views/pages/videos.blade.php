@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings" data-bg-image="/assets/images/hero/page-heading.jpg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="page_heading_content text-center">
              <h1 class="title">Video Gallery</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Page Headings -->

    <!-- start: Page Navigation -->
    <section class="page-navigation">
        <div class="container">
            <div class="row">
            <div class="col">
                <ul class="page_navigations">
                <li><a href="/">Home</a></li>
                <li>Videos</li>
                </ul>
            </div>
            </div>
        </div>
    </section>
    <!-- end: Page Navigation -->

    <!-- start: Tourism Section -->
    <section class="haor-details">
    <div class="container">
        <div class="row">
        @foreach ($videos ?? array() as $item)
        <div class="col-lg-4">
            <div class="tourism">
                <a href="/video/{{ @$item['id'] }}" class="tourism_inner">
                    <div class="tourism_img">
                    <img src="{{ url(@$item['thumb_img'] ?? '')}}" alt="">
                    </div>
                    <div class="tourism_content">
                    <h4 class="title">{{ @$item['name'] }}</h4>
                    </div>
                    <button class="playVideoShowBtn" style="position: absolute;
                        width: 80px;
                        height: 80px;
                        left: 50%;
                        top: 50%;
                        margin-top: -40px;
                        margin-left: -40px;
                        background-color: var(--ss-color-theme-primary);
                        z-index: 10;
                        opacity: .5;
                        border-radius: 6px;">
                        <i class="muteVideoBtnIcon fa-light fa-play" style="color: #fff;font-weight: bold; font-size: 40px;"></i></button>
                </a>
            </div>
        </div>
        @endforeach

        </div>
    </div>
    </section>
    <!-- end: Tourism Section -->


</main>

@stop