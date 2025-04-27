@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="{{ url(@$resort_page_header_image ?? '')}}">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h2 class="title">{{@$resort_page_title}}</h2>
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
          <li>{{@$resort_page_title}}</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Navigation -->


    <!-- start: Hotel Lists -->
    <section class="hotel-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-10">
            <div class="hotel_list">
            @foreach ($resort_page_hotel_list ?? array() as $key => $item)
              <div class="hotel_list_item">
                <div class="hotel_image">
                  <img src="{{ url(@$item['image'] ?? '')}}" alt="">
                </div>
                <div class="hotel_content">
                  {!! @$item['content'] !!}
                </div>
                <div class="hotel_contact">
                  {!! @$item['contact'] !!}
                </div>
              </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Hotel Lists -->


</main>

@stop