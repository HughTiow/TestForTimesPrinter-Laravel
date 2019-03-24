<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\note;
use DB;

class NoteController extends Controller
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
        $this->validate($request, [
            'noteTitle' => 'required',
        ]);
        // Create todo
        $note = new note;
        $note->title = $request->input('noteTitle');
        $note->context = $request->input('context');
        $note->user_id = auth()->user()->id;
        $note->save();

        return response()->json(['You are successfully add new Note!.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $note = note::where('user_id', auth()->user()->id)->get();
        //$note = note::orderBy('id','desc')->paginate(10);
        return view('content.notelist')->with('notes', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $note = note::find($request->input('noteID'));
        $note->title = $request->input('title');
        $note->context = $request->input('context');
        $note->save();

        return response()->json(['You are successfully update Note!.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        $note = note::find($request->input('noteId'));
        // Check for correct user
        /*
        if(auth()->user()->id !==$todo->user_id){
            //return redirect('/home')->with('error', 'Unauthorized Page');
        }*/

        $note->delete();
        //return redirect('/posts')->with('success', 'Post Removed');

        return response()->json(['You are successfully delete Note!.']);
    }
}
