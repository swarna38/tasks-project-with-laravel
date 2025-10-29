@extends('layouts.app')
@section('content')
    <h2>add new task</h2>
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        @csrf
  <!-- Title -->
  <div class="mb-3">
    <label for="title" class="form-label fw-bold">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title" value="{{ old('title') }}">

    {{-- ====error msg shoe===  --}}
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
  </div>

  <!-- Description -->
  <div class="mb-3">
    <label for="description" class="form-label fw-bold">Description</label>
    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter task description">{{ old('description') }}</textarea>

    @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
  </div>

  <!-- Image -->
  <div class="mb-3">
    <label for="image" class="form-label fw-bold">Image</label>
    <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
    <div class="form-text">Optional: Upload an image (jpg, png, etc.)</div>

    @error('image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
  </div>

  <!-- Submit Button -->
  <button type="submit" class="btn btn-success">Submit</button>
  <a  class="btn btn-primary" href="{{ route('tasks.index') }}">Back</a>
</form>

@endsection
