@extends('layouts.home')
@section('content')


<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="{{ url(@$header_img ?? '')}}">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h2 class="title">{{ @$name }}</h2>
          <div class="page_heading_info">
            <span>Area {{ @$area }}</span>
          </div>
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
          <li><a href="/wetlands">Wetlands</a></li>
          <li>{{ @$name }}</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Navigation -->

<!-- start: Haor Overview -->
<section class="haor-overview">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="haor_overview_content text-center">
          <h5 class="subtitle">OVERVIEW</h5>
          <div class="desc">
            <p>{{ @$overview }}</p>
          </div>

          <div class="overview_carousel owl-carousel">
          @foreach ($gallery_items ?? array() as $item)
            <div class="overview_carousel_item">
              <img src="{{ url(@$item['image'] ?? '')}}" alt="">
            </div>
          @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Haor Overview -->

<!-- start: Haor Category -->
<!-- <section class="haor-categories">
  <div class="container">
    <div class="row">
      <div class="col">
        <ul class="categories">
          <li><a href="#">GEOGRAPHIC INFORMATION</a></li>
          <li><a href="#">CONSERVATION EFFORT</a></li>
          <li><a href="#">MAPS</a></li>
          <li><a href="#">TRAVEL ESSENTIALS</a></li>
        </ul>
      </div>
    </div>
  </div>
</section> -->
<!-- end: Haor Category -->

<!-- start: Haor Details -->
<section class="haor-details">
  <div class="container">
    <div class="row">
      <div class="col-xl-7 col-lg-8">
        <div class="details_content">
            {!! @$description !!}
        </div>
      </div>
      <div class="col-lg-4 offset-xl-1">
        <aside class="main-sidebar">

          <div class="sidebar_widget haor-information">
              {!! @$about !!}
          </div>

          <div class="sidebar_widget featured-effect">
            <div class="conversion_effects_item">
              <a href="/bird" class="conversion_effects_item_inner">
                <div class="effect_image">
                  <img src="/assets/images/effects/effect-2.jpg" alt="">
                </div>
                <div class="effect_content">
                  <h3 class="title" style="font-size: 38px;">Bird Sanctuary</h3>
                  <p>Brief introduction to bird sanctuaries, their importance, and their role in bird conservation.
                  </p>
                </div>
              </a>
            </div>
          </div>

        </aside>
      </div>
    </div>
  </div>
</section>
<!-- end: Haor Details -->

<!-- start: Travel Essential -->
<section class="travel-essential">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="travel_essential_content">
          <div class="section_title text-center">
            <h3 class="title">Travel essentials</h3>
          </div>

          <div class="travel_information">
            <a href="/travel" class="travel_information_item">
              <div class="icon"><img src="/assets/images/icons/signpost.svg" alt=""></div>
              <h4 class="title">How to go</h4>
              <span>Transport</span>
            </a>
            <a href="/resort" class="travel_information_item">
              <div class="icon"><img src="/assets/images/icons/house.svg" alt=""></div>
              <h4 class="title">Where to stay</h4>
              <span>Hotels and resorts</span>
            </a>
            <a href="/fish" class="travel_information_item">
              <div class="icon"><img src="/assets/images/icons/anchorsimple.svg" alt=""></div>
              <h4 class="title">What to see</h4>
              <span>BOATING FACILITY</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Travel Essential -->

<!-- start: Haor Navigation -->
<section class="haor-navigation">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="haor_navigation">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="haor_navigation_inner">
                <a href="/wetland-detail/{{ @$prev_haor_id }}" class="navigation_item previous">
                  <span class="label">previous wetland</span>
                  <h2 class="haor_name">{{ @$prev_haor_name }}</h2>

                  <span class="haor_arrow"></span>
                </a>

                <a href="/wetland-detail/{{ @$next_haor_id }}" class="navigation_item next">
                  <span class="label">next wetland</span>
                  <h2 class="haor_name">{{ @$next_haor_name }}</h2>

                  <span class="haor_arrow"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Haor Navigation -->

</main>

@stop