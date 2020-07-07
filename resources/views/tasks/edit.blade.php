@extends('tasks.taskslayout')

@section('content')

    <h1>Updating Tasks Form</h1>

    <div class="alert alert-success">

    </div>
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
        <input type="text" name="body" value="{{$task->body}}">
        <input type="submit" value="Update">
    </form>
@endsection
