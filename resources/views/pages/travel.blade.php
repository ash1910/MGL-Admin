@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="{{ url(@$travel_page_header_image ?? '')}}">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h2 class="title">{{@$travel_page_title}}</h2>
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
          <li>{{@$travel_page_title}}</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Navigation -->

    <!-- start: Travel Essential -->
    <section class="travel-essential-page">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="travel_essential_wrap">

              <div class="single_essential">
                <div class="row justify-content-between align-items-center flex-column-reverse flex-lg-row">
                  <div class="col-lg-6 col-xl-5">
                    <div class="essential_content">
                      {!! @$travel_page_how_to_go_content !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="essential_image">
                      <img src="{{ url(@$travel_page_how_to_go_image ?? '')}}" alt="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="single_essential">
                <div class="row justify-content-between  align-items-center flex-column-reverse flex-lg-row-reverse">
                  <div class="col-lg-6 col-xl-5">
                    <div class="essential_content">
                      {!! @$travel_page_where_to_stay_content !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="essential_image">
                      <img src="{{ url(@$travel_page_where_to_stay_image ?? '')}}" alt="">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Travel Essential -->

</main>

@stop