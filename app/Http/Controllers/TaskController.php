<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $data = Task::where('user_id', Auth::id())->get();

        return view('index', [
            'datas' => $data
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'due_date' => 'required',
            'text' => 'required',
        ]);

        Task::create([
            'due_date' => $request->due_date,
            'text' => $request->text,
            'completed' => false,
            'user_id' => Auth::id()
        ]);

        return redirect('/home');

    }

    public function complete($id){

        $data = Task::where('id', $id);
        $data->update([
            'completed' => true
        ]);

        return redirect('/home');
    }

    public function delete($id){

        $data = Task::where('id', $id);
        $data->delete();

        return redirect('/home');
    }

    public function edit($id){

        $data = Task::where('id', $id)->first();
        return view('edit', [
            'datas' => $data
        ]);
    }

    public function update(Request $request){

        $request->validate([
            'text' => 'required',
            'due_date' => 'required'
        ]);

        $data = Task::where('id', $request->id);
        $data->update([
            'text' => $request->text,
            'due_date' => $request->due_date
        ]);

        return redirect('/home');
    }
}
