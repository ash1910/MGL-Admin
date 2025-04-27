@extends('layouts.home')
@section('content')

<main id="primary" class="site-main">

<!-- start: Page Headings -->
<section class="page-headings" data-bg-image="/assets/images/hero/page-heading.jpg">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_heading_content text-center">
          <h2 class="title">River List</h2>
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
              <li>River List</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Page Navigation -->

    <!-- start: More Haors -->
    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">North West Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'North West Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">North Central Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'North Central Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">North East Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'North East Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">Eastern Hills Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'Eastern Hills Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">South East Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'South East Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="more-haors">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h4 class="title">South West Region</h4>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="haor_lists">
              <ul>
              @foreach ($rivers ?? array() as $item)
                @if($item['region'] == 'South West Region')
                <li><a href="javascript:;">{{ @$item['name'] }}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: More Haors -->

</main>

@stop