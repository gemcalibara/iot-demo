@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif
    <h1 class="display-5" style="padding-top: 10px;">To Do list</h1>
    <div>
      <a style="margin-bottom: 19px;" href="{{ route('todo.create')}}" class="btn btn-primary">Create New Task</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <td>ID</td>
          <td>Task Name</td>
          <td class="action-head" colspan="3">Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($todos as $todo)
        <tr>
          <td>{{$todo->id}}</td>
          <td>{{$todo->name}}</td>
          <td class="action-sub">
            <a href="{{ route('todo.edit',$todo->id)}}" class="btn btn-primary">Edit</a>
          </td>
          <td class="action-sub">
          <a href="{{ route('todo.edit',$todo->id)}}" class="btn btn-warning">Details</a>
          </td>
          <td class="action-sub">
            <form action="{{ route('todo.destroy', $todo->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
    </div>
    @endsection