@extends('tasks.taskslayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <h1 class="text-center">What is your next task? </h1>
            <div class="card">
                <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form-group text-center" method="post" action="/tasks/create">
        @csrf
        <input type="text" name="body">
        <input type="submit" value="Add" class="btn btn-info">
    </form>
            </div>
            </div>
        </div>
    </div>
</div>
    @endsection
