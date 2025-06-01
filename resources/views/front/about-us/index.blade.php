@extends('layouts.front')
@section('page-title', 'About Us')

@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>About Us</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li>About us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                {!! $aboutUs->content !!}
            </div>
        </div>
    </div>
@endsection
