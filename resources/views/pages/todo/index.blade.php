@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
             <h1 class="page-title">My Todo List</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                       <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Enter Task" aria-label="default input example">
                       </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 mt-5">
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tasks</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $task->title }}</td>
                      <td>
                          @if ($task->status == 0)
                              <span>Task not complete</span>
                          @else
                              <span>Task complete</span>
                          @endif
                      </td>
                      <td>
                        <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{ route('todo.status', $task->id) }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
@push('css')


<style>
    .page-titel{
        padding-top:50px;
        color: blue
    }
</style>
@endpush
