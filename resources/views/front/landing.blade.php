@extends('layouts.front')

@php

    $categories = \App\Models\Category::all();
    $items = \App\Models\Item::latest()->take(8)->get();

@endphp

@section('content')
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center"
                data-bgimg="{{ asset('front-assets/img/slider/slider1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Vegetables Big Sale</h1>
                                <h2>Fresh Farm Products</h2>
                                <p>
                                    10% certifled-organic mix of fruit and veggies. Perfect for weekly cooking and snacking!
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center"
                data-bgimg="{{ asset('front-assets/img/slider/slider2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Vegetables</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Widest range of farm-fresh Vegetables, Fruits & seasonal produce
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center"
                data-bgimg="{{ asset('front-assets/img/slider/slider3.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Tomatoes</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Natural organic tomatoes make your health stronger. Put your information here
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->


    <!--product area start-->
    <div class="product_area mt-5  mb-64">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Our Categories</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row justify-content-center">
                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html">
                                            <img src="{{ $category->image_url }}" style="height: 250px" alt="">
                                        </a>

                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">
                                            <a href="product-details.html">
                                                {{ $category->name }}
                                            </a>
                                        </h4>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!--product area start-->
    <div class="product_area product_deals mt-5 mb-65">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Recently added items </h2>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_carousel product_column5 owl-carousel">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product14.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product15.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Mauris Vel Tellus</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$48.00</span>
                                            <span class="old_price">$257.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product16.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product17.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Nunc Neque Eros</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$35.00</span>
                                            <span class="old_price">$245.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product18.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product19.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Proin Lectus Ipsum</a>
                                        </h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product20.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product21.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Quisque In Arcu</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$55.00</span>
                                            <span class="old_price">$235.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product15.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product14.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Cas Meque Metus</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product17.jpg') }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ asset('front-assets/img/product/product16.jpg') }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2021/12/15"></div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-tippy="quick view"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box"> <span
                                                            class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a>
                                                </li>
                                                <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true"><span class="lnr lnr-sync"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Aliquam Consequat</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->
@endsection
