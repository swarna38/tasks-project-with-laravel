@extends('layouts.app');

@section('content')
    <h2 class="fw-bolder">
        Tasks List
    </h2>

    {{-- //success msg show  --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

     <a class="btn btn-info" href="{{route('tasks.create')}}">Add Task</a>
    <table class="table table-striped text-center align-middle">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Description</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->title}}</td>
                <td><img style="width: 50px" src="{{ asset('storage/' . $task->image) }}" alt=""></td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <form class="d-inline" action="{{ route('tasks.delete',$task->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this task?')">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
