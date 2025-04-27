

@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings page-headings-default">
    </section>
    <!-- end: Page Headings -->

    <!-- start: Haor Overview -->
    <section class="haor-overview">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_overview_content text-center">
              <h1 class="title">{{@$terms_conditions_title}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Haor Overview -->

    <!-- start: Haor Details -->
    <section class="haor-details">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="details_content">

              {!! @$terms_conditions_content !!}

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Haor Details -->

</main>

@stop