@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-3"><strong>Projects</strong></h1>
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
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img height="50" src="{{ asset('storage/' . $project->thumbnail) }}" alt=""></td>
                            <td>{{ $project->title }}</td>
                            <td>
                                <div class="btn-group">
                                    {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $project->id }}">
                                        <i class="align-middle" data-feather="edit"></i> Edit
                                      </button> --}}
                                    <button class="btn btn-sm btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this project?')) { document.getElementById('delete-form-{{ $project->id }}').submit(); }"><i class="align-middle" data-feather="trash"></i> Delete</button>

                                        <form id="delete-form-{{ $project->id }}" class="m-0 p-0" method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                </div>
                            </td>
                        </tr>



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
      <h5 class="modal-title" id="exampleModalLabel">New project</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="m-0 p-0" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
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
