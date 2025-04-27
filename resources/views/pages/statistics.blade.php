@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="{{ url(@$statistics_page_header_image ?? '')}}">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h2 class="title">{{@$statistics_page_title}}</h2>
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
          <li>{{@$statistics_page_title}}</li>
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
            <p>{{ @$statistics_page_overview }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Haor Overview -->

<!-- start: Haor Details -->
<section class="haor-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="details_content">
            {!! @$statistics_page_content !!}
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1">
        <aside class="main-sidebar">

          <div class="sidebar_widget haor-information">
            {!! @$statistics_page_right_content !!}
          </div>

        </aside>
      </div>
    </div>
  </div>
</section>
<!-- end: Haor Details -->

</main>

@stop