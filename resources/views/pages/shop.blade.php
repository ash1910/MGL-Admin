@extends('layouts.shop')
@section('content')
	<link rel='stylesheet' id='fusion-dynamic-css-css' href='assets/css/477e315240222b384bd56838cd967f38.min.css?ver=5.7.4' type='text/css' media='all' />

	<div id="sliders-container"></div>
	  <div class="fusion-page-title-bar fusion-page-title-bar-breadcrumbs fusion-page-title-bar-center">
        <div class="fusion-page-title-row">
          <div class="fusion-page-title-wrapper">
            <div class="fusion-page-title-captions">
              <div class="fusion-page-title-secondary">
                <div class="fusion-breadcrumbs">
                  <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a itemprop="url" href="/">
                      <span itemprop="title">Home</span>
                    </a>
                  </span>
                  <span class="fusion-breadcrumb-sep">/</span>
                  <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <span itemprop="title" class="breadcrumb-leaf">Products</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <main id="main" role="main" class="clearfix " style="">
        <div class="fusion-row" style="">
          <div class="woocommerce-container">
            <section id="content" class="full-width" style="width: 100%;">
              <header class="woocommerce-products-header"></header>
              <div class="woocommerce-notices-wrapper"></div>
              <form class="woocommerce-ordering" method="get">
                <select name="orderby" class="orderby" aria-label="Shop order">
                  <option value="menu_order" selected='selected'>Default sorting</option>
                  <option value="popularity">Sort by popularity</option>
                  <option value="rating">Sort by average rating</option>
                  <option value="date">Sort by latest</option>
                  <option value="price">Sort by price: low to high</option>
                  <option value="price-desc">Sort by price: high to low</option>
                </select>
                <input type="hidden" name="paged" value="1" />
              </form>
              <ul class="products clearfix products-3">

              @foreach ($shop_book_items ?? array() as $item)
                <li class="product-grid-view product type-product post-2001 status-publish first instock product_cat-sports-books has-post-thumbnail shipping-taxable product-type-external">
                  <div class="fusion-clean-product-image-wrapper ">
                    <div class="fusion-image-wrapper fusion-image-size-fixed" aria-haspopup="true">
                      <img width="353" height="533" src="{{ url(@$item['image'] ?? '') }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" loading="lazy" />
                      <div class="fusion-rollover">
                        <div class="fusion-rollover-content">
                          <div class="cart-loading">
                            <a href="https://maplesportsbooks.com">
                              <i class="fusion-icon-spinner"></i>
                              <div class="view-cart">View Cart</div>
                            </a>
                          </div>
                          <div class="fusion-product-buttons">
                            <a href="{{ @$item['url'] }}" data-quantity="1" class="button product_type_external" data-product_id="2001" data-product_sku="" aria-label="Buy On Amazon" rel="nofollow">Buy On Amazon</a>
                            <span class="fusion-rollover-linebreak"> /</span>
                            <a href="{{ @$item['url'] }}" class="show_details_button"> Details</a>
                          </div>
                          <a class="fusion-link-wrapper" href="{{ @$item['url'] }}" aria-label="A Guy Like Me: Fighting to Make the Cut"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fusion-product-content">
                    <div class="product-details">
                      <div class="product-details-container">
                        <h3 class="product-title">
                          <a href="{{ @$item['url'] }}"> {{ @$item['title'] }}</a>
                        </h3>
                        <div class="fusion-price-rating">
                          <span class="price">
                            <span class="woocommerce-Price-amount amount">
                              <!-- <span class="woocommerce-Price-currencySymbol">&#36;</span> -->{{ @$item['price'] }} </span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
            @endforeach

               
              </ul>
            </section>
          </div>
        </div>



      </main>

@stop