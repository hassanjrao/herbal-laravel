@extends('layouts.backend')

@section('page-name', 'Comments')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Comments
                </h3>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>comment</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($comments as $ind => $comment)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>
                                        <a href="{{ route('admin.items.show', $comment->item->id) }}">
                                            {{ $comment->item->name }}
                                        </a>
                                    </td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->status}}</td>

                                    <td>{{ $comment->created_at }}</td>
                                    <td>{{ $comment->updated_at }}</td>

                                    <td class="d-flex">

                                        <form id="form-{{ $comment->id }}"
                                            action="{{ route('admin.comments.approve', $comment->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip"
                                                title="Approve">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        {{-- disapprove --}}
                                        <form id="form-{{ $comment->id }}"
                                            action="{{ route('admin.comments.disapprove', $comment->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                title="Disapprove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        <form id="form-{{ $comment->id }}"
                                            action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $comment->id }})"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
