@extends('layout')

@section('content')
    <form action="/task/edit" method="POST" >
        @csrf
        <input type="hidden" name='id' value="{{ $datas->id }}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Task</label>
            <input type="text" name="text" class="form-control" id="exampleFormControlInput1" value="{{ $datas->text }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" id="exampleFormControlInput1" value="{{ $datas->due_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection