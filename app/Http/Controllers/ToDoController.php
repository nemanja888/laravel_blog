<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ToDoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos')->with('todos',$todos);
    }


    public function store(Request $request){

            $todo = new Todo;
            $todo->todo = $request->todo;
            $todo->save();
            Session::flash('succes', 'You created new task');
            return redirect()->back();

    }


    public function delete($id){

        $todo = Todo::find($id);
        $todo->delete();
        Session::flash('succes', 'You delete task');
        return redirect()->back();
    }


    public function update($id){

        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id){

        $todo = Todo::find($id);

        $todo->todo = $request->todo;

        $todo->save();
        Session::flash('succes', 'You update task');
        return redirect()->route('todos');
    }

    public function complited($id){

        $todo = Todo::find($id);

        $todo->complited = 1;

        $todo->save();
        Session::flash('succes', 'You complite task');
        return redirect()->route('todos');

    }


}
