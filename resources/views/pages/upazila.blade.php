@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="{{ url(@$header_img ?? '')}}">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h1 class="title">Haors of {{ @$name }} Upazila</h1>
          <div class="page_heading_info">
            <span>Total Haors {{ @$total_haor }}</span>
            <span>Area {{ @$area }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Headings -->

    <section class="exploring-section" id="explore">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title ">
              <h3 class="title text-center">Exploring the Haors of {{ @$name }} Upazila</h3>
              {!! @$description !!}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- start: More Haors -->
    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">Haors of {{ @$name }} Upazila</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($haor_items ?? array() as $id => $name)
                <li><a href="/haor-detail/{{ @$id }}">{{ @$name }}</a></li>
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: More Haors -->

<!-- start: Haor Navigation -->
<section class="haor-navigation">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="haor_navigation">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="haor_navigation_inner">
                <a href="/upazila/{{ @$prev_upazila_id }}" class="navigation_item previous">
                  <span class="label">previous upazila</span>
                  <h2 class="haor_name">{{ @$prev_upazila_name }}</h2>

                  <span class="haor_arrow"></span>
                </a>

                <a href="/upazila/{{ @$next_upazila_id }}" class="navigation_item next">
                  <span class="label">next upazila</span>
                  <h2 class="haor_name">{{ @$next_upazila_name }}</h2>

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