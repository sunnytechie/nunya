@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-3"><strong>News & Articles</strong></h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                New <i class="align-middle" data-feather="plus-square"></i>
              </button>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card p-3">

                    <table id="dnaDataTable" class="table table-hover table-sm my-0">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $post->id }}">
                                            <i class="align-middle" data-feather="edit"></i> Edit
                                          </button> --}}
                                        <button class="btn btn-sm btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this post?')) { document.getElementById('delete-form-{{ $post->id }}').submit(); }"><i class="align-middle" data-feather="trash"></i> Delete</button>

                                            <form id="delete-form-{{ $post->id }}" class="m-0 p-0" method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                    </div>
                                </td>
                            </tr>


                            <!-- Modal -->
                            <div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $post->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $post->id }}Label">Edit post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>

                                    <form class="m-0 p-0" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') ?? $post->title }}">

                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Description...">{{ old('description') ?? $post->description }}</textarea>

                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbnail">
                                                    <img height="100" src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                                                </label>
                                                <input type="file" accept=".png, .jpg" class="form-control-file"  id="thumbnail" name="thumbnail">

                                                @if ($errors->has('thumbnail'))
                                                    <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>

                                </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="m-0 p-0" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">

                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Description...">{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" accept=".png, .jpg" class="form-control-file dropify" id="thumbnail" name="thumbnail">

                    @if ($errors->has('thumbnail'))
                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                    @endif
                </div>



            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>

      </div>
    </div>
</div>

@endsection
