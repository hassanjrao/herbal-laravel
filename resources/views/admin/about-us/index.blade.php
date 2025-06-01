@extends('layouts.backend')

@section('page-name', 'About Us')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-name">About Us </h3>

            </div>
            <div class="block-content">

                <form action="{{ route('admin.about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                            <?php
                            $value = old('content', $aboutUs ? $aboutUs->content : null);

                            ?>
                            <label class="form-label" for="label"> Content <span class="text-danger">*</span></label>

                            <textarea class="form-control" id="editor" name="content" placeholder="Enter content">{{ $value }}</textarea>

                            @error('content')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">

                            <button type="submit" id="submitBtn"
                                class="btn btn-primary text-white">Update</button>

                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
