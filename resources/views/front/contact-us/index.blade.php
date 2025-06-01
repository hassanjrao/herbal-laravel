@extends('layouts.front')
@section('page-title', 'Contact Us')

@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="{{ route('landing') }}">home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="contact_message form">
                    <form id="" method="POST" action="{{ route('contact-us.store') }}">
                        @csrf
                        <p>
                            <label> Your Name (required)</label>
                            <input name="name" required placeholder="Name *" type="text" autocomplete="off">
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p>
                            <label> Your Email (required)</label>
                            <input name="email" required placeholder="Email *" type="email">
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>

                        <div class="contact_textarea">
                            <label> Your Message</label>
                            <textarea placeholder="Message *" required name="message" class="form-control2"></textarea>
                            @error('message')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit"> Send</button>
                        </div>
                        <p class="form-messege"></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
