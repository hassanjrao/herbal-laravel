@extends('layouts.backend')

@php
    $addEdit = isset($slider) ? 'Edit' : 'Add';
    $addUpdate = isset($slider) ? 'Update' : 'Add';
@endphp
@section('page-name', $addEdit . ' Slider ')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-name">{{ $addEdit }} slider </h3>

            </div>
            <div class="block-content">

                @if ($slider)
                    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">



                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('main_heading', $slider ? $slider->main_heading : null);

                                ?>
                                <label class="form-label" for="label"> Main Heading <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="main_heading" name="main_heading" placeholder="Enter Main Heading">
                                @error('main_heading')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('sub_heading', $slider ? $slider->sub_heading : null);

                                ?>
                                <label class="form-label" for="label"> Sub Heading <span class="text-danger"></span></label>
                                <input type="text" value="{{ $value }}" class="form-control"
                                    id="sub_heading" name="sub_heading" placeholder="Enter Sub Heading">
                                @error('sub_heading')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">

                                @php
                                    $required = true;
                                @endphp

                                @if ($slider && $slider->image)
                                    @php
                                        $required = false;
                                    @endphp
                                    <img src="{{ $slider->image_url }}" alt="image" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Image <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                    {{ $required }} name="image">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $slider ? $slider->description : null);

                                ?>
                                <label class="form-label" for="label"> Description <span
                                        class="text-danger"></span></label>

                                <textarea class="form-control" name="description" placeholder="Enter description">{{ $value }}</textarea>

                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>



                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn"
                            class="btn btn-primary text-white">{{ $addUpdate }}</button>

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
