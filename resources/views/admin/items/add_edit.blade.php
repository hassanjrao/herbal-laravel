@extends('layouts.backend')

@php
    $addEdit = isset($item) ? 'Edit' : 'Add';
    $addUpdate = isset($item) ? 'Update' : 'Add';
@endphp
@section('page-name', $addEdit . ' Item ')
@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-name">{{ $addEdit }} Item </h3>

            </div>
            <div class="block-content">

                @if ($item)
                    <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('category_id', $item ? $item->category_id : null);
                                ?>
                                <label class="form-label" for="label"> Category <span
                                        class="text-danger">*</span></label>
                                <select required class="form-select" id="category_id" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $value == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $item ? $item->name : null);
                                
                                ?>
                                <label class="form-label" for="label"> Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">

                                @php
                                    $required = true;
                                @endphp

                                @if ($item && $item->image_path)
                                    @php
                                        $required = false;
                                    @endphp
                                    <img src="{{ $item->image_url }}" alt="image" class="img-fluid" style="width: 100px">
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
                                $value = old('description', $item ? $item->description : null);
                                
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


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('usage', $item ? $item->usage : null);
                                
                                ?>
                                <label class="form-label" for="label"> Usage <span class="text-danger">*</span></label>

                                <textarea class="form-control editor" name="usage" placeholder="Enter usage">{{ $value }}</textarea>

                                @error('usage')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('health_benefits', $item ? $item->health_benefits : null);
                                
                                ?>
                                <label class="form-label" for="label"> Health Benefits <span
                                        class="text-danger">*</span></label>

                                <textarea class="form-control editor" name="health_benefits" placeholder="Enter Health Benefits">{{ $value }}</textarea>

                                @error('health_benefits')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('research_support_citations', $item ? $item->research_support_citations : null);
                                
                                ?>
                                <label class="form-label" for="label"> Research Support & Citations <span
                                        class="text-danger">*</span></label>

                                <textarea class="form-control editor" name="research_support_citations"
                                    placeholder="Enter Research Support & Citations">{{ $value }}</textarea>

                                @error('research_support_citations')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('precaution_limitations', $item ? $item->precaution_limitations : null);
                                
                                ?>
                                <label class="form-label" for="label"> Precautions & Limitations <span
                                        class="text-danger">*</span></label>

                                <textarea class="form-control editor" name="precaution_limitations" placeholder="Enter Precautions & Limitations">{{ $value }}</textarea>

                                @error('precaution_limitations')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <?php
                                $value = old('conclusion', $item ? $item->conclusion : null);
                                
                                ?>
                                <label class="form-label" for="label"> Conclusion <span
                                        class="text-danger">*</span></label>

                                <textarea class="form-control editor" name="conclusion" placeholder="Enter Conclusion">{{ $value }}</textarea>

                                @error('conclusion')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <label class="form-label" for="tagInput">Tags</label>

                                <div class="d-flex flex-wrap gap-2 border rounded p-2" id="tagList">
                                    <!-- Existing tags will be shown here -->
                                </div>

                                <input type="text" class="form-control mt-2" id="tagInput"
                                    placeholder="Type a tag and press Enter">

                                <!-- Hidden input to store comma-separated tags -->
                                <input type="hidden" name="tags" id="tagsInput">

                                @error('tags')
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
            old('tags') ? explode(',', old('tags')) : ($item && $item->tags ? $item->tags->pluck('name')->toArray() : []),
        ) !!};

        function renderTags() {
            tagList.innerHTML = '';
            tags.forEach((tag, index) => {
                const tagEl = document.createElement('span');
                tagEl.className = 'badge bg-primary d-flex align-items-center';
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
