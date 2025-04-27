@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings" data-bg-image="/assets/images/hero/page-heading.jpg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="page_heading_content text-center">
              <h1 class="title">Photo Gallery</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Page Headings -->

<!-- start: Haros of Districts -->
<section class="haors-of-districts" style="padding-bottom: 0;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="haors_of_districts_wrap">
        @foreach ($g_cats ?? array() as $item)
          <div class="single_district">
            <h3 class="district_name">{{ @$item['name'] }}</h3>

            <div class="haors_carousel owl-carousel">
            @foreach ($item['galleries'] ?? array() as $gallery_item)
              <a class="singele_haor gallery_img" href="{{ url(@$gallery_item['image'] ?? '')}}">
                <div class="haor_image">
                  <img src="{{ url(@$gallery_item['image'] ?? '')}}" alt="">
                </div>
                <div class="haor_content">
                  <h4 class="name">{{ @$gallery_item['name'] }}</h4>
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


</main>

@stop