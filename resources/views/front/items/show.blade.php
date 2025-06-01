@extends('layouts.front')
@section('page-title', 'Item' . ' - ' . $item->name)

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
                        <h3>{{ $item->category->name }}</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li><a href="{{ route('categories.show', $item->category->id) }}">{{ $item->category->name }}</a>
                            </li>
                            <li><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></li>
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
                <h1 class="page-title">{{ $item->name }}</h1>
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


            <!-- Description -->
            <p class="mt-3">
                {!! $item->description !!}
            </p>
        </section>

        {{-- last updated --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><b>Last updated:</b> {{ $item->updated_at->format('F j, Y') }}</span>

        </div>

        <div class="comments_box mt-5">
            <h3>{{ $comments->count() }} Comments </h3>
            <div class="comment_list">
                @foreach ($comments as $comment)
                    <div class="comment_item mb-2">
                        <div class="comment_thumb">
                            <img src="{{ asset('front-assets/img/blog/comment3.png.jpg') }}" alt="">
                        </div>
                        <div class="comment_content">
                            <div class="comment_meta">
                                <h5><a href="#">{{ $comment->name }}</a></h5>
                                <span>{{ $comment->created_at->format('F j, Y \a\t g:i a') }}</span>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="comments_form mt-5">
            <h3>Leave a Comment </h3>
            <p>Your email address will not be published. Required fields are marked *</p>
            <form action="{{ route('comments.store', $item->id) }}" method="POST" class="comment-form">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="review_comment">Comment </label>
                        <textarea name="comment" id="review_comment" required></textarea>
                        @error('comment')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="author">Name</label>
                        <input id="author" type="text" name="name" required>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="email">Email </label>
                        <input id="email" type="text" name="email" required>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class="button" type="submit">Post Comment</button>
            </form>
        </div>

    </div>

@endsection
