<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class managers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $var=User::orderBy('id' , 'DESC')->withCount('posts')->paginate(5);
        return view('Editors.index',compact('var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('Editors.Add');
    }




 public function test($id)
    {
        $post=User::find($id);
        return view('Editors.test',compact('post'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$curTime = new \DateTime();

       $request->validate([
           'name'=>'required',
           'email'=>'required'
        ]);

       $userin=new User;
    
       $userin->name=$request->input('name');
       $userin->email=$request->input('email');
       $userin->password=Hash::make($request->input('pass'));
       $userin->status=$request->input('status');
       $userin->save();

  return redirect('/Managers')->with('success', 'Added successfully
');

    }

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


         $post=User::find($id);
          return view('Editors.edit',compact('post'));

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

         $request->validate([
           'name'=>'required',
           'email'=>'required'
        ]);
         $post=User::find($id);

        $post->name=$request->input('name');
        $post->email=$request->input('email');
        $post->save();



        return back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=User::find($id);
        $del->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
