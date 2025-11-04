@extends('layout')

@section('content')
    <h1>To Do List</h1>
    <form action="/task/create" method="post">
    <div class="input-group mb-3 row justify-content-start">
            @csrf
            <div class="col-2">
                <input type="date" name="due_date" class="form-control" placeholder="Due date" >

            </div>
            <div class="col-5">
                <input type="text" name="text" class="form-control" placeholder="New Task" >
            </div>
            <div class="col-2">

                <button class="btn btn-primary" type="submit" name="submit" id="button-addon2"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
    <tr>
        <th>Task</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($datas as $item)
        <tr>
            <td>{{ $item->text }}</td>
            <td>{{ $item->due_date }}</td>
            @if ($item->completed == 0)
                <td>Not completed</td>
            @else
                <td>Completed</td>
            @endif
            <td>
                <a href="/task/complete/{{ $item->id }}"><i class="fs-3 fa fa-plus mx-2 text-dark"></i></a>
                <a href="/task/edit/{{ $item->id }}"><i class="fs-4 fa fa-pencil mx-2 text-dark"></i></a>
                <a href="/task/delete/{{ $item->id }}"><i class="fs-4 fa fa-trash mx-2 text-dark"></i></a>
            </td>
        </tr>
    @endforeach
    </table>

@endsection