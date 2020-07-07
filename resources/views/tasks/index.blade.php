@extends('tasks.taskslayout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Current Tasks</h1>
            <div class="card">
                <div class="card-header">
    <a href="/tasks/create">
        <button class="btn btn-info">
         Add Task  </button></a>
                </div>
                <div class="card-body">
    @foreach($tasks as $task)

            <div>{{$task->body}}
                <div class="form-inline justify-content-end">
            <a href="{{'/tasks/'.$task->id.'/edit'}}">
                    <button class="btn text-right mb-3" type="submit">
                        <span class="fas fa-edit" style="color: orange"></span>
                    </button>
            </a>

                <form action="{{ route('task.delete', $task->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                <button class="btn  text-right mb-3" type="submit">
                    <span class="fas fa-trash text-danger"></span>
                </button>
                </form>
                @if($task->completed)
                        <form action="{{ route('task.incomplete', $task->id)}}" method="post">
                            @csrf
                            <button class="btn text-right mb-3" type="submit">
                                <span class="fas fa-check text-success"></span>
                            </button>
                        </form>
                @else
                        <form action="{{ route('task.completed', $task->id)}}" method="post">
                            @csrf
                            <button class="btn text-right mb-3" type="submit">
                                <span class="fas fa-check text-dark"></span>
                            </button>
                        </form>
                @endif
        <p class="text-center text-info text-sm-left">By: {{$task->user->name}}</p>
                    <hr>
    @endforeach
            </div>
                </div>
        <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

