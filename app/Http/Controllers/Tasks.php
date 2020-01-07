<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tasks_model;
use App\User;

class Tasks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $var=User::where('status',2)->orderBy('id' , 'DESC')->paginate(5);
           return view('Tasks.index',compact('var')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $task = new tasks_model();


        $task->title =$request->input('tit');
        $task->body= $request->input('desk');
        $task->save();

        // $category = User::find(1     
        /* <select name="users[]" multiple> </select>*/
        //[1,2,3]
        $task->user_tasks()->sync(request('users')); 

 return back()->with('success', 'New support ticket has been created! Wait sometime to get resolved');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=tasks_model::find($id);
        $del->delete();
        return redirect('/admin/dashboard')->with('success', 'تم المسح بنجاح');
    }
}
