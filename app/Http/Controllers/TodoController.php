<?php

namespace App\Http\Controllers;
use App\Todo;
use App\Step;

use Illuminate\Http\Request;

class TodoController extends Controller
// SOLO LAS PERSONAS QUE ESTAN LOGADAS PUEDEN ACCEDER A /TODOS
{
   public function _constract(){
     $this->middleware('auth');
   }
    public function index()
    {
       $user = auth()->id();
        // $todos = Todo::all();
        $todos = Todo::select("*",
                    \DB::raw('(CASE 
                        WHEN todos.completed = "0" THEN "NO COMPLETED" 
                        WHEN todos.completed = "1" THEN "COMPLETED" 
                        END) AS completed'))->where('user_id',$user)->orderby('completed','desc')

                ->get();
            
        return view('todos.index',compact('todos'));
    }

    public function create()
    {

        return view('todos.create');
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required|max:255',
        ]);
      $todo = auth()->user()->todos()->create($request->all());
      
      if($request->steps)
      {
        foreach($request->steps as $step){
          $todo->steps()->create(['name' => $step]);
        }
      }
     
      return redirect(route('todo.index'))->with("message","Todo Created");
    }
   
      public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }
    public function update(Request $request, Todo $todo)
    {
      $todo->update([
      'title'=>$request->title,
      'description'=>$request->description,]);
      if($request->stepName){
        foreach ($request->stepName as $key => $value ) {
            $id = $request->stepId[$key];
            if(!$id){
                $todo->steps()->create(['name' => $value]);
            }else{
                $step = Step::find($id);
                $step->update(['name' => $value]);
            }
        }
    }
      return redirect(route('todo.index'))->with('message', 'Todo Updated  Successfully');
    }
    public function delete(Request $request, Todo $todo)
    {
      $todo->steps->each->delete(); 
      $todo->delete();
      
    }
    public function description(Todo $todo)
    {
      $result = $todo->description;
      return $result;
    
    }
    public function complete( Todo $todo)
    {
      if($todo->completed == false){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message', 'Todo Completed  Successfully');
      }
      else{
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message', 'Todo Uncompleted  Successfully');
      }
     
     
    }
}