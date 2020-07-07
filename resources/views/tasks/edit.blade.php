@extends('tasks.taskslayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="text-center">Update Task </h1>
                <div class="card">
                    <div class="card-body">
    <form class="form-group" method="post" action="{{route('task.update', $task->id)}}">
        @csrf
        @method('patch')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" name="body" value="{{$task->body}}" class="text-center">
        <input type="submit" value="Update" class="btn btn-outline-success">
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
