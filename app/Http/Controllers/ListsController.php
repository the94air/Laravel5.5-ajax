<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ToDoList;
use Purifier;

class ListsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ToDoList::orderBy('id', 'desc')->get();
        return view('lists.index')->withLists($lists);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTable()
    {
        $lists = ToDoList::orderBy('id', 'desc')->get();
        return view('lists.table')->withLists($lists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'item' => 'required'
        ])->validate();

        $list = new ToDoList();

        $list->title = $request->title;
        $list->item = Purifier::clean($request->item);

        $list->save();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'New item has been saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = ToDoList::find($id);

        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'title' => $list->title,
            'item' => $list->item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = ToDoList::find($id);
        
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'title' => $list->title,
            'item' => $list->item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list = ToDoList::find($id);

        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'item' => 'required'
        ])->validate();

        $list->title = $request->title;
        $list->item = Purifier::clean($request->item);

        $list->save();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'item has been updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = ToDoList::find($id);

        $list->delete();

        return response()->json([
            'status' => 'success',
            'msg' => 'item has been deleted'
        ]);
    }
}
