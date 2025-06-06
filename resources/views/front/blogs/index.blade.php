@extends('layouts.front')
@section('page-title', 'Blogs')


@section('content')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Blogs</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <section>
            <div class="row shop_wrapper grid_list">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 mb-4">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ route('blogs.show', $blog) }}">
                                    <img src="{{ $blog->image_url }}" alt="">
                                </a>

                            </div>
                            <div class="product_content list_content">
                                <h4 class="product_name"><a href="{{ route('blogs.show', $blog) }}">{{ $blog->name }}</a>
                                </h4>
                                <div class="product_desc">
                                    <p><a href="{{ route('blogs.show', $blog) }}">{!! $blog->short_description !!}</a></p>
                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{-- {{ $blogs->links() }} --}}
                {{ $blogs->links('pagination::bootstrap-4') }} {{-- Laravel 8 uses Bootstrap 4 by default --}}

            </div>
        </section>
    </div>
@endsection
