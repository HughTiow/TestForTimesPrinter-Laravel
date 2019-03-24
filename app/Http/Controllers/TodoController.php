<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\todo;
use DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'todoAdd' => 'required',
        ]);
        // Create todo
        $todo = new todo;
        $todo->todo = $request->input('todoAdd');
        $todo->user_id = auth()->user()->id;
        $todo->save();

        return response()->json(['You are successfully add new TODO!.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        
        $todo = todo::where('user_id',auth()->user()->id )->get();
        return view('content.todolist')->with('todos', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $todo = todo::find($request->input('todoID'));
        $todo->mark = $request->input('update');
        $todo->save();

        return response()->json(['You are successfully update TODO!.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = todo::find($request->input('todoID'));
        
        // Check for correct user
        /*
        if(auth()->user()->id !==$todo->user_id){
            //return redirect('/home')->with('error', 'Unauthorized Page');
        }*/

        $todo->delete();
        //return redirect('/posts')->with('success', 'Post Removed');

        return response()->json(['You are successfully delete TODO!.']);

    }
}
