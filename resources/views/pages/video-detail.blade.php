@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings page-headings-default">
    </section>
    <!-- end: Page Headings -->

        <!-- start: Page Navigation -->
    <section class="page-navigation">
        <div class="container">
            <div class="row">
            <div class="col">
                <ul class="page_navigations">
                <li><a href="/">Home</a></li>
                <li><a href="/videos">Videos</a></li>
                <li>{{@$video['name']}}</li>
                </ul>
            </div>
            </div>
        </div>
    </section>
    <!-- end: Page Navigation -->

    <!-- start: Haor Details -->
    <section class="haor-details">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="details_content">

            <div style="width: 100%; position: relative;">
                <video src="{{@$video['url']}}" style="width: 100%;" id="topVideo" loop autoplay muted>
                </video>

                <button class="fullscreenVideoBtn" style="position: absolute;
                    width: 40px;
                    height: 40px;
                    right: 10px;
                    bottom: 15px;
                    background-color: var(--ss-color-theme-primary);
                    z-index: 10;
                    border-radius: 6px;"><i class="fullscreenVideoBtnIcon fa-light fa-maximize" style="color: #fff;
                    font-weight: bold;"></i></button>

                <button class="muteVideoBtn" style="position: absolute;
                width: 40px;
                height: 40px;
                right: 60px;
                bottom: 15px;
                background-color: var(--ss-color-theme-primary);
                z-index: 10;
                border-radius: 6px;"><i class="muteVideoBtnIcon fa-light fa-volume fa-volume-mute" style="color: #fff;
                font-weight: bold;"></i></button>

                <button class="playVideoBtn" style="position: absolute;
                    width: 40px;
                    height: 40px;
                    right: 110px;
                    bottom: 15px;
                    background-color: var(--ss-color-theme-primary);
                    z-index: 10;
                    border-radius: 6px;"><i class="playVideoBtnIcon fa-light fa-pause" style="color: #fff;
                    font-weight: bold;"></i></button>
            </div>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Haor Details -->

</main>

@stop