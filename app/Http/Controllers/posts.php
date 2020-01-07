<?php

namespace App\Http\Controllers;

use App\Category;
use App\sub_cat_model;

use App\posts_db;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class posts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $val = Auth::user()->id;

        if (Auth::user()->status == 2) {
            $var = posts_db::where('isSave', 1)->where('isActive', 2)->where('user_id', $val)->orderBy('id', 'DESC')->get();
        } elseif (Auth::user()->status == 3) {
            $var = posts_db::where('isSave', 1)->where('isActive', 1)->where('cor_id', 0)->orderBy('id', 'DESC')->get();
        } elseif (Auth::user()->status == 4) {
            $var = posts_db::where('cor_id', '!=', 0)->where('isCorrected', 0)->orderBy('id', 'DESC')->get();

        }

        return view('posts.index', compact('var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vu   = sub_cat_model::all();
        $var = Category::all();
        return view('posts.create', compact('var','vu'));
    }

    public function firstper()
    {

        $val = Auth::user()->id;
        $var = posts_db::where('isSave', 1)->where('isActive', 2)->orderBy('id', 'DESC')->get();
        return view('posts.per', compact('var'));
    }

    public function scondper()
    {
        $val = Auth::user()->id;
        $var = posts_db::where('isSave', 1)->where('isActive', 1)->where('cor_id', 0)->orderBy('id', 'DESC')->get();
        return view('posts.per', compact('var'));
    }

    public function therdper()
    {
        $val = Auth::user()->id;
        $var = posts_db::where('isSave', 1)->where('isActive', 3)->orderBy('id', 'DESC')->get();
        return view('posts.per', compact('var'));
    }

    public function correcter()
    {
        $val = Auth::user()->id;
        $var = posts_db::where('cor_id', $val)->where('isCorrected', '!=', 2)->orderBy('id', 'DESC')->get();
        return view('posts.corr', compact('var'));
    }

    public function cooo()
    {
        $val = Auth::user()->id;
        $var = posts_db::where('cor_id', $val)->where('isCorrected', '!=', 0)->orderBy('id', 'DESC')->get();
        return view('posts.corr', compact('var'));
    }

    public function correcterAdmin()
    {
        $var = posts_db::where('cor_id', '!=', 0)->where('isCorrected', 0)->orderBy('id', 'DESC')->get();
        return view('posts.corrA', compact('var'));
    }

    public function corrected()
    {
        $var = posts_db::where('isCorrected', 2)->orderBy('id', 'DESC')->get();
        return view('posts.corrcted', compact('var'));
    }

    public function correct($id)
    {
        $val = Auth::user()->id;

        $post = posts_db::find($id);
        $post->cor_id = $val;
        $post->save();
        return back()->with('success', 'تم التصحيح بنجاح');

    }

    public function ajax(Request $request)
    {

        $id = $request->input('v2');

        $postR = posts_db::find($id);

        $postR->comment = $request->input('v1');
        $postR->rate = $request->input('v3');
        $postR->isRated = 1;

        $postR->save();

        return response()->json(['status' => 1]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $add = new posts_db();
        if ($request->input('later') == 'later') {
            $isSave = 2;
            $isActive = 0;
            $isCorrected = 0;

        } else {
            $isSave = 1;
            $isActive = 2;
            $isCorrected = 0;
        }
        // Get filename with the extension
        if ($request->file('fi') == null) {

            $fileNameToStore = '';

        } else {

            $filenameWithExt = $request->file('fi')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fi')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('fi')->storeAs('public/files', $fileNameToStore);
        }

        $add->title = $request->input('name');
        $add->body = $request->input('content');
        $add->afile = $fileNameToStore;
        $add->user_id = Auth::user()->id;
        $add->isSave = $isSave;
        $add->isActive = $isActive;
        $add->isCorrected = $isCorrected;
        $add->isRated = 0;
        $add->rate = 0;
        $add->cor_id = 0;
        $add->comment = '';

        $add->category = $request->input('category');
        $add->sub_category = $request->input('sub_category');

        $add->save();

        return redirect('/posts')->with('success', ' تم الحفظ بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = posts_db::find($id);
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = posts_db::find($id);
        return view('posts.edit', compact('post'));

    }

    public function prent($id)
    {

        $post = posts_db::find($id);
        $post->isCorrected = 3;
        $post->save();
        return redirect('/posts')->with('success', 'تم نشر المقال بنجاح');

    }

    public function prented()
    {

        $var = posts_db::where('isCorrected', 3)->where('prented', 0)->orderBy('id', 'DESC')->get();
        return view('posts.prented', compact('var'));

    }

    public function backchive()
    {

        $var = posts_db::where('isCorrected', 3)->where('prented', 1)->orderBy('id', 'DESC')->get();
        if (Auth::user()->status == 2) {
            $val = Auth::user()->id;
            $var = posts_db::where('isActive', '!=', 2)->where('user_id', $val)->orderBy('id', 'DESC')->get();
        } elseif (Auth::user()->status == 3) {
            $val = Auth::user()->id;
            $var = posts_db::where('cor_id', $val)->orderBy('id', 'DESC')->get();
        }
        return view('posts.chive', compact('var'));

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
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = posts_db::find($id);
        // Get filename with the extension
        if ($request->file('fi') == null) {

            $fileNameToStore = '';

        } else {

            $filenameWithExt = $request->file('fi')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fi')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('fi')->storeAs('public/files', $fileNameToStore);
        }

        if ($request->input('save') == 'publish') {

            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->isActive = 4;
            $post->isCorrected = 2;
            $post->save();

            return redirect('/posts')->with('success', 'تم نشر المقال بنجاح');
        }

        if ($request->input('later') == 'on') {
            $isSave = 2;
            $isActive = 0;
            $isCorrected = 0;

        } else {
            $isSave = 1;
            $isActive = 2;
            $isCorrected = 0;

        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->isSave = $isSave;
        $post->isActive = $isActive;
        $post->isCorrected = $isCorrected;
        $post->save();

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = posts_db::find($id);
        $del->delete();
        return redirect('/posts')->with('success', 'تم المسح بنجاح');
    }

    public function active($id)
    {

        $post = posts_db::find($id);
        $post->caser = '';
        $post->isActive = 1;
        $post->save();
        return back()->with('success', 'تم  تفعيل هذا المقال بنجاح');
    }

    public function reject(Request $request)
    {

        $post = posts_db::find($request->input('regcase'));
        $post->isActive = 3;
        $post->caser = $request->input('case');
        $post->save();
        return back()->with('success', 'تم رفض هذا المقال');

    }

    public function chive($id)
    {

        $post = posts_db::find($id);
        $post->prented = 1;
        $post->save();
        return back()->with('success', 'تم  تفعيل هذا المقال بنجاح');
    }


    public function printword($id)
    {


$post = posts_db::findOrFail($id);
$content=$post->body;
$title=$post->title;
$content=strip_tags($content);

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();

$section->addText($title);
$section->addText($content);


$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

try{
 $objWriter->save(storage_path('helloWorld.docx'));


}catch(Exception $e){


}
        return response()->download(storage_path('helloWorld.docx'));

    }




/*public function getDownload(){

        $file = public_path()."/files/info.pdf";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'info.pdf',$headers);
    }
*/
}
