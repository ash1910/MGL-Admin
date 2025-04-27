@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings" data-bg-image="/assets/images/hero/page-heading.jpg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="page_heading_content text-center">
              <h1 class="title">All Haors List</h1>
              <div class="page_heading_info">
                <span>Total Haors {{ @$home_statistics_total_haors }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Page Headings -->

@foreach ($district_items ?? array() as $item_dis)
    <section class="exploring-section" id="explore">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title">
              <h2 class="title text-center">{{ @$item_dis['name'] }} District</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- start: Haros of Districts -->
<section class="haors-of-districts" style="padding-bottom: 0;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="haors_of_districts_wrap">
        @foreach ($item_dis['upazilas'] ?? array() as $item)
          <div class="single_district">
            <h3 class="district_name">{{ @$item['name'] }} Upazila</h3>

            <div class="haors_carousel owl-carousel">
            @foreach ($item['haors'] ?? array() as $haor_item)
              <a href="/haor-detail/{{ @$haor_item['id'] }}" class="singele_haor">
                <div class="haor_image">
                  <img src="{{ url(@$haor_item['thumb_img'] ?? '')}}" alt="">
                </div>
                <div class="haor_content">
                  <h4 class="name">{{ @$haor_item['name'] }}</h4>
                  <span class="area">Area: {{ @$haor_item['area'] }}</span>
                </div>
              </a>
            @endforeach
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Haros of Districts -->
@endforeach


</main>

@stop