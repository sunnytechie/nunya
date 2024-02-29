@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-3"><strong>Age Grades</strong></h1>
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
                            <th>title</th>
                            <th>Age Group</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($ages as $age)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $age->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($age->start)->format('Y') }} - {{ \Carbon\Carbon::parse($age->end)->format('Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $age->id }}">
                                        <i class="align-middle" data-feather="edit"></i> Edit
                                      </button> --}}
                                    <button class="btn btn-sm btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this age?')) { document.getElementById('delete-form-{{ $age->id }}').submit(); }"><i class="align-middle" data-feather="trash"></i> Delete</button>

                                        <form id="delete-form-{{ $age->id }}" class="m-0 p-0" method="POST" action="{{ route('agegroup.destroy', $age->id) }}">
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
      <h5 class="modal-title" id="exampleModalLabel">New Age Grade</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="m-0 p-0" action="{{ route('agegroup.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="start">Start date</label>
                <input type="date" class="form-control" id="start" name="start" placeholder="Enter start" value="{{ old('start') }}">

                @if ($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="end">End date</label>
                <input type="date" class="form-control" id="end" name="end" placeholder="Enter end" value="{{ old('end') }}">

                @if ($errors->has('end'))
                    <span class="text-danger">{{ $errors->first('end') }}</span>
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

