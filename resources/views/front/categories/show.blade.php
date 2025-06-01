@extends('layouts.front')
@section('page-title', 'Category' . ' - ' . $category->name)

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

        .supplement-item {
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
                        <h3>{{ $category->name }}</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li><a href="#">categories</a></li>
                            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>

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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="page-title">{{ $category->name }}</h1>
                <div class="social-icons">
                    <a href="">
                        <img src="https://img.icons8.com/color/48/000000/email.png" alt="Email">
                    </a>
                    <a href="">
                        <img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook">
                    </a>
                    <a href="">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/twitter--v1.png" alt="Twitter">
                    </a>
                    <a href="">
                        <img src="https://img.icons8.com/color/48/000000/pinterest--v1.png" alt="Pinterest">
                    </a>
                </div>
            </div>
            <hr>
            <!-- Alphabet Navigation -->
            <div class="alphabet-nav mb-3">
                <strong>Go to:</strong>
                @foreach (range('A', 'Z') as $char)
                    <a href="#group-{{ $char }}" class="mx-1 font-weight-bold text-primary">{{ $char }}</a>
                @endforeach
                <a href="#group-0-9" class="mx-1 font-weight-bold text-primary">0-9</a>
            </div>


            <!-- Description -->
            <p class="mt-3">
                {!! $category->description !!}
            </p>
        </section>

        <div class="supplement-section">

            @foreach ($groupedItems as $letter => $items)
                <h4 id="group-{{ $letter }}" class="mt-4 border-bottom pb-2">{{ $letter }}</h4>
                <ul class="list-unstyled">
                    @foreach ($items as $item)
                        <li>
                            <a href="{{ route('items.show', $item->id) }}" class="text-primary">
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach


        </div>

    </div>

@endsection
