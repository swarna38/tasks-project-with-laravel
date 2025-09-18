<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     public function index(){
        //all data get
        $tasks = DB::table('task')->get();
        return view('tasks.index',['tasks' => $tasks]);
    }

    public function create(){
        return view('tasks.create');
    }

    //data insert
    public function store(Request $request){
        $imagePath = null;
        $title = $request->title;
        $description = $request->description;

        //check if have image
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('task', 'public');
        }

        DB::table('task')->insert([
            'title' => $title,
            'description' => $description,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('tasks.index')->with('success','task successfully done');
    }

    //data edit
    public function edit($id){
        $tasks = DB::table('task')->where('id',$id)->first();
        return view('tasks.edit',['task' => $tasks]);
    }

    //DATA Update
    public function update(Request $request,$id){
        $task = DB::table('task')->where('id',$id)->first();
        $imagePath = $task->image;


        //check if file have an image
        if($request->hasFile('image')){

            //old image file delete
            if ($task->image && Storage::disk('public')->exists($task->image)) {
             Storage::disk('public')->delete($task->image);
            }

            //store new image
            $imagePath = $request->file('image')->store('tasks','public');

        }

         DB::table('task')->where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'updated_at' => now(),
        ]);
        return redirect()->route('tasks.index')->with('success','task update successfully done');
    }



    //data delete
    public function destroy($id){

        $task = DB::table('task')->where('id',$id)->first();

        //delete image file if exists
        if ($task->image && Storage::disk('public')->exists($task->image)) {
        Storage::disk('public')->delete($task->image);
    }

         DB::table('task')->where('id', $id)->delete();
        return redirect()->route('tasks.index')->with('success','Task successfully deleted');

    }
}
