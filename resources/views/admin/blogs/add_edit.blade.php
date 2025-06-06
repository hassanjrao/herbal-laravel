@extends('layouts.backend')

@php
    $addEdit = isset($blog) ? 'Edit' : 'Add';
    $addUpdate = isset($blog) ? 'Update' : 'Add';
@endphp
@section('page-name', $addEdit . ' Blog ')
@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-name">{{ $addEdit }} Blog </h3>

            </div>
            <div class="block-content">

                @if ($blog)
                    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('title', $blog ? $blog->title : null);

                                ?>
                                <label class="form-label" for="label"> Title <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="title" name="title" placeholder="Enter title">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">

                                @php
                                    $required = true;
                                @endphp

                                @if ($blog && $blog->image_path)
                                    @php
                                        $required = false;
                                    @endphp
                                    <img src="{{ $blog->image_url }}" alt="image" class="img-fluid" style="width: 100px">
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



                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $blog ? $blog->description : null);

                                ?>
                                <label class="form-label" for="label"> Description <span
                                        class="text-danger">*</span></label>

                                <textarea class="form-control" id="editor" name="description" placeholder="Enter description">{{ $value }}</textarea>

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
    <script>
        const tagInput = document.getElementById('tagInput');
        const tagList = document.getElementById('tagList');
        const tagsInput = document.getElementById('tagsInput');

        let tags = {!! json_encode(
            old('tags') ? explode(',', old('tags')) : ($blog && $blog->tags ? $blog->tags->pluck('name')->toArray() : []),
        ) !!};

        function renderTags() {
            tagList.innerHTML = '';
            tags.forEach((tag, index) => {
                const tagEl = document.createElement('span');
                tagEl.className = 'badge bg-primary d-flex align-blogs-center';
                tagEl.innerHTML = `
                ${tag}
                <button type="button" class="btn-close btn-close-white btn-sm ms-2" onclick="removeTag(${index})" aria-label="Remove"></button>
            `;
                tagList.appendChild(tagEl);
            });
            tagsInput.value = tags.join(',');
        }

        function removeTag(index) {
            tags.splice(index, 1);
            renderTags();
        }

        tagInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const newTag = this.value.trim();
                if (newTag && !tags.includes(newTag)) {
                    tags.push(newTag);
                    renderTags();
                }
                this.value = '';
            }
        });

        // Render existing tags on load
        renderTags();
    </script>
@endsection
