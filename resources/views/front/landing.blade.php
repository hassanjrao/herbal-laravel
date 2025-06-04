@extends('layouts.front')
@section('page-title', 'Home')

@php

    $categories = \App\Models\Category::all();
    $items = \App\Models\Item::latest()->take(8)->get();
    $sliders = \App\Models\Slider::latest()->get();

@endphp

@section('content')
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            @foreach ($sliders as $slider)
                <div class="single_slider d-flex align-items-center"
                    data-bgimg="{{ $slider->image_url }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider_content">
                                    <h1>{{ $slider->main_heading }}</h1>
                                    <h2>{{ $slider->sub_heading }}</h2>
                                    <p>
                                       {{ $slider->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                                        <a class="primary_img" href="{{ route('categories.show', $category->id) }}">
                                            <img src="{{ $category->image_url }}" style="height: 250px" alt="">
                                        </a>

                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">
                                            <a href="{{ route('categories.show', $category->id) }}">
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
                            @foreach ($items as $item)
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{ $item->image_url }}" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name"><a href="product-details.html">{{ $item->name }}</a>
                                            </h4>
                                            <p><a href="#">{{ $item->category->name }}</a></p>
                                        </figcaption>
                                    </figure>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->
@endsection
