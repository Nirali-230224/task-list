<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class TaskController extends BaseController
{

    public function index(){

        $tasks = DB::table('tbltask')->paginate(10);

        return view("tasklist", compact('tasks'));
    }

    public function addtask(){

        return view('addtask', ['tasks' => null]);

    }

    public function submit(Request $request){
 
        $tstatus = 'pending';
        $adddate = now();

        $request->validate([
        'taskname'          => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'long_description'  => 'nullable|string',

    ]);

        $values = [
            'taskname'            => $request->taskname,
            'short_description'   => $request->short_description,
            'long_description'    => $request->long_description,
            'taskstatus'          => $tstatus,
            'adddate'             => $adddate
        ];

        $query = DB::table('tbltask')->insert($values);

         return redirect('/')->with('success','Task added successfully!');

    }

    public function edit($taskid){

        $tasks = DB::table('tbltask')->where('taskid', $taskid)->first();
        return view('addtask', compact('tasks'));

    }
    public function update(Request $request, $taskid){

        $tstatus = 'pending';
        $updatedate = now();

        $request->validate([
        'taskname'          => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'long_description'  => 'nullable|string',

    ]);

        $values = [
           'taskname'           => $request->taskname,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'taskstatus'        => $tstatus,
            'updatedate'        => $updatedate
        ];

        $query = DB::table('tbltask')->where('taskid', $taskid)->update($values);
    
        return redirect('/')->with('success', 'Task updated successfully!');
    }

    public function delete($taskid){

        $query = DB::table('tbltask')->where('taskid',$taskid)->delete();

        return redirect('/')->with('success', 'Task deleted successfully!');
        
    }

    public function view($taskid){

        $tasks = DB::table('tbltask')->select('taskid','taskname','short_description','long_description','taskstatus')
                                     ->where('taskid',$taskid)
                                     ->get();
        
        return view("viewtask", compact('tasks'));
    }

    public function updatestatus(Request $request, $taskid){

        $tstatus = 'completed';

        $values = [
            'taskstatus' => $tstatus
        ];

        $query = DB::table('tbltask')->where('taskid',$taskid)->update($values);

        return redirect()->back();

    }
}
