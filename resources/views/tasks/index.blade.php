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
                <td><img class="w-25" src="{{ asset('storage/' . $task->image) }}" alt=""></td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection