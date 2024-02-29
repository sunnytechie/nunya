@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-3"><strong>About Us Information</strong></h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card p-3">

                <form class="m-0 p-0" action="{{ route('about.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                        <div class="form-group">
                            <label for="description">About the Igwe:</label>
                            <textarea class="form-control description" id="description" name="about_igwe" rows="3" placeholder="Description...">{{ old('description') ?? $about->about_igwe }}</textarea>

                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">About the Community:</label>
                            <textarea class="form-control description" id="description" name="about_us" rows="3" placeholder="Description...">{{ old('description') ?? $about->about_us }}</textarea>

                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Values:</label>
                            <textarea class="form-control description" id="description" name="about_values" rows="3" placeholder="Description...">{{ old('description') ?? $about->about_values }}</textarea>

                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>


                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
