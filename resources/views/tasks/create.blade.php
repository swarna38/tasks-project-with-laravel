@extends('layouts.app')
@section('content')
    <h2>add new task</h2>
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        @csrf
  <!-- Title -->
  <div class="mb-3">
    <label for="title" class="form-label fw-bold">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title" required>
  </div>

  <!-- Description -->
  <div class="mb-3">
    <label for="description" class="form-label fw-bold">Description</label>
    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter task description"></textarea>
  </div>

  <!-- Image -->
  <div class="mb-3">
    <label for="image" class="form-label fw-bold">Image</label>
    <input type="file" name="image" id="image" class="form-control">
    <div class="form-text">Optional: Upload an image (jpg, png, etc.)</div>
  </div>

  <!-- Submit Button -->
  <button type="submit" class="btn btn-success">Submit</button>
  <a  class="btn btn-primary" href="{{ route('tasks.index') }}">Back</a>
</form>

@endsection