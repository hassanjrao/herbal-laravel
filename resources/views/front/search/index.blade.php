@extends('layouts.front')
@section('page-title', 'Search Results')


@section('content')
    <br>
    <div class="container mt-5 mb-5">
        @if ($items->count())

            <div class="row shop_wrapper grid_list">
                <h4>Total items found: {{ $items->total() }}</h4>


                @foreach ($items as $item)
                    {{-- <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">{{ $item->name }}</div>
                            <div class="card-body">
                                <div>{!! \Illuminate\Support\Str::limit(strip_tags($item->description), 150) !!}</div>
                                <div class="mt-2">
                                    @foreach ($item->tags as $tag)
                                        <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-6 mb-4">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ route('items.show', $item) }}">
                                    <img src="{{ $item->image_url }}" alt="">
                                </a>

                            </div>
                            <div class="product_content list_content">
                                <h4 class="product_name"><a href="{{ route('items.show', $item) }}">{{ $item->name }}</a>
                                </h4>
                                <p>
                                    <a href="{{ route('categories.show', $item->category) }}">{{ $item->category->name }}
                                    </a>
                                </p>
                                <div class="">
                                    @foreach ($item->tags as $tag)
                                        <span class="badge tags"
                                            ><a href="{{ route('search',['q'=>$tag->name]) }}">{{ $tag->name }}</a></span>
                                    @endforeach
                                </div>
                                <div class="product_desc">
                                    <p><a href="{{ route('items.show', $item) }}">{!! $item->short_description !!}</a></p>
                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{-- {{ $items->links() }} --}}
                {{ $items->links('pagination::bootstrap-4') }} {{-- Laravel 8 uses Bootstrap 4 by default --}}

            </div>
        @else
            <p>No items found.</p>
        @endif
    </div>


@endsection
