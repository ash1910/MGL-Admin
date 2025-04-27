@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings" data-bg-image="/uploads/images/b96bee9a2cd06a52195a1865260a39d3.jpeg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="page_heading_content text-center">
              <h1 class="title">Wetland List</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Page Headings -->

    <!-- start: Tourism Section -->
    <section class="haor-details">
        <div class="container">
            <div class="row">
            @foreach ($wetlands ?? array() as $item)
            <div class="col-lg-4">
                <div class="tourism">
                <a href="/wetland-detail/{{ @$item['id'] }}" class="tourism_inner">
                    <div class="tourism_img">
                        <img src="{{ url(@$item['thumb_img'] ?? '')}}" alt="">
                    </div>
                    <div class="tourism_content">
                        <h4 class="title">{{ @$item['name'] }}</h4>
                        <p class="desc">Area: {{ @$item['area'] }}</p>
                        <p class="desc">District: {{ @$item['district'] }}</p>
                    </div>
                </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- end: Tourism Section -->


</main>

@stop