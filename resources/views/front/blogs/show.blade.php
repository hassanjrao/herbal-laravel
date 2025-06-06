@extends('layouts.front')
@section('page-title', 'Blog' . ' - ' . $blog->name)

@section('styles')
    <style>
        .alphabet-nav a {
            font-weight: bold;
            color: #005984;
            margin: 0 5px;
        }

        .alphabet-nav {
            background-color: #e9f3f8;
            padding: 10px;
            border-radius: 4px;
        }

        .page-title {
            font-weight: bold;
            font-size: 1.8rem;
        }

        .social-icons img {
            height: 24px;
            margin-left: 10px;
            cursor: pointer;
        }

        .breadcrumb {
            background: none;
            padding-left: 0;
        }

        .badge-nih {
            background-color: #666;
            color: white;
            font-size: 0.65rem;
            padding: 2px 4px;
            border-radius: 3px;
            margin-left: 5px;
        }

        .supplement-link {
            color: #007bff;
            text-decoration: none;
        }

        .supplement-link:hover {
            text-decoration: underline;
        }

        .supplement-section h5 {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
            font-weight: bold;
        }

        .supplement-blog {
            margin-bottom: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Blog</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <!-- Breadcrumb -->

        <section>
            <!-- Page Title and Social Icons -->
            <div class="d-flex justify-content-between align-blogs-center mb-3">
                <h1 class="page-title">{{ $blog->title }}</h1>

            </div>
            <hr>


            <!-- Description -->
            <p class="mt-3">
                {!! $blog->description !!}
            </p>
        </section>
        <div class="d-flex justify-content-between align-blogs-center mb-3">
            <span><b>Last updated:</b> {{ $blog->updated_at->format('F j, Y') }}</span>
        </div>


    </div>

@endsection
