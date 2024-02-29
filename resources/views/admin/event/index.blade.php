@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-3"><strong>Event</strong></h1>
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
                                <th>Location</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->time ? \Carbon\Carbon::parse($event->time)->format('H:i A') : '' }}</td>
                                <td>{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : '' }}</td>
                                <td>
                                    <div class="btn-group">
                                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $event->id }}">
                                            <i class="align-middle" data-feather="edit"></i> Edit
                                          </button> --}}
                                        <button class="btn btn-sm btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this event?')) { document.getElementById('delete-form-{{ $event->id }}').submit(); }"><i class="align-middle" data-feather="trash"></i> Delete</button>

                                            <form id="delete-form-{{ $event->id }}" class="m-0 p-0" method="POST" action="{{ route('events.destroy', $event->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                    </div>
                                </td>
                            </tr>


                            <!-- Modal -->
                            <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $event->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $event->id }}Label">Edit Event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>

                                    <form class="m-0 p-0" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') ?? $event->title }}">

                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{ old('location') ?? $event->location }}">

                                                @if ($errors->has('location'))
                                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="time">Time</label>
                                                <input type="time" class="form-control" id="time" name="time" placeholder="Enter time" value="{{ old('time') ?? $event->time }}">

                                                @if ($errors->has('time'))
                                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="{{ old('date') ?? $event->date }}">

                                                @if ($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Description...">{{ old('description') ?? $event->description }}</textarea>

                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbnail"><img height="100" src="/{{ $event->thumbnail }}" alt=""></label>
                                                <input type="file" accept=".png, .jpg" class="form-control-file"  id="thumbnail" name="thumbnail" data-default-file="/{{ $event->thumbnail }}">

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
          <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="m-0 p-0" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{ old('location') }}">

                    @if ($errors->has('location'))
                        <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" placeholder="Enter time" value="{{ old('time') }}">

                    @if ($errors->has('time'))
                        <span class="text-danger">{{ $errors->first('time') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="{{ old('date') }}">

                    @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
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
