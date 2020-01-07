<?php

namespace App\Http\Controllers;

use App\posts_db;
use App\tasks_model;

class AdminController extends Controller
{

    public function dashboard()
    {

        $tasks = [];
        if (auth()->user()->status > 0) {
            $tasks = tasks_model::whereHas('user_tasks', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
        }

        if (auth()->user()->status == 0) {
            $tasks = tasks_model::whereHas('user_tasks', function ($query) {
                $query->where('user_id', '!=', 5);
            })->with('user_tasks')->get();
            // dd($tasks[1]->user_tasks);

        }

        $c = posts_db::where('isSave', 1)->where('isActive', 2)->count();

        $n = posts_db::where('isSave', 1)->where('isActive', 1)->where('cor_id', 0)->count();
        $r = posts_db::where('isSave', 1)->where('isActive', 3)->where('cor_id', 0)->count();
        $t = posts_db::where('cor_id', '!=', 0)->where('isCorrected', 0)->count();

        return view('admin.dashboard', compact('c', 'tasks', 'n', 'r', 't'));
    }

}
