@extends('layouts.front')
@section('page-title', 'Home')

@php

    $categories = \App\Models\Category::all();
    $items = \App\Models\Item::latest()->take(8)->get();
    $sliders = \App\Models\Slider::latest()->get();
    $blogs = \App\Models\Blog::latest()->get();

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
                                <div id="slider_content" class="slider_content transition-colors duration-1000">
                                    <h2 style="font-weight: bold">{{ $slider->main_heading }}</h1>
                                    <h3 style="font-weight: bold; text-transform: uppercase; font-size: 20px">{{ $slider->sub_heading }}</h2>
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

    <!-- Blog Carousel Section -->
    <div class="product_area mt-5 mb-64">
        <div class="container">
            <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel"  style="border-radius: 5px; overflow: hidden;">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach ($blogs as $index => $blog)
                        <button type="button"
                                data-bs-target="#blogCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner">
                    @foreach ($blogs as $index => $blog)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none">
                                <div class="position-relative" style="height: 500px; overflow: hidden;">
                                    <img src="{{ $blog->image_url }}" class="d-block w-100 h-100 object-fit-cover" alt="{{ $blog->title }}">

                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex flex-column justify-content-end p-4 text-white">
                                        <div class="mb-2 d-flex align-items-center gap-2 small">
                                            {{-- <span class="badge bg-primary">BI</span> --}}
                                            {{-- <span>{{ Business Insider }}</span> --}}
                                            {{-- <button class="btn btn-sm btn-light btn-outline-dark py-0 px-2">+ Follow</button> --}}
                                            <span>• {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="fw-semibold" style="max-width: 70%;">{{ $blog->title }}</h3>
                                        <div class="d-flex mt-3 gap-4 medium">
                                            <span><i class="bi bi-hand-thumbs-up"></i></span>
                                            <span><i class="bi bi-hand-thumbs-down"></i></span>
                                            <span><i class="bi bi-chat"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Optional: Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
           
        </div>
    </div>



    <!--Blogs area start-->
    <div class="product_area mt-5  mb-64">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>- FEATURED POSTS / PAGES -</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row justify-content-center">
                    @foreach ($blogs as $index => $blog)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <a href="{{ route('blogs.show', $blog->id) }}" style="height: 220px;">
                                    <img src="{{ $blog->image_url }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 220px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <small class="text-muted d-block mb-1">{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</small>
                                    <h5 class="card-title text-uppercase" style="font-size: 1rem; font-weight: bold;">
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-dark text-decoration-none">
                                            {{ $blog->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted" style="font-size: 0.9rem; line-height: 1.5; max-height: 4.5em; overflow: hidden;">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) !!}
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 small text-muted">
                                    <span>Added By {{ $blog->author ?? 'Admin' }}</span>
                                    {{-- • <span>23 comments</span> --}}
                                </div>
                            </div>
                        </div>
                        @php
                            if($index == 2){
                                break; // Limit to 3 featured posts
                            }
                        @endphp
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
                                            <a class="primary_img" href="{{ route('items.show',$item) }}"><img
                                                    src="{{ $item->image_url }}" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name"><a href="{{ route('items.show',$item) }}">{{ $item->name }}</a>
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
@section('scripts')
    <script>
    $(document).ready(function() {
        $('.slider_area').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            nav: false,
            dots: true
        });
    });
</script>
@endsection