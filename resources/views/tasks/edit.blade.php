@extends('layouts.app')
@section('content')
    <h2>Edit task</h2>

    <form action="{{ route('tasks.update',$task->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        @csrf
         @method('PUT')
        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" value="{{$task->title}}" class="form-control" placeholder="Enter task title" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter task description">{{ $task->description }}</textarea>

        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text">Optional: Upload an image (jpg, png, etc.)</div>
            {{-- if have a image   --}}
            @if($task->image)
                <img src="{{ asset('storage/'. $task->image) }}" style ="width:100px">
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update</button>
        <a  class="btn btn-primary" href="{{ route('tasks.index') }}">Back</a>
</form>

@endsection
