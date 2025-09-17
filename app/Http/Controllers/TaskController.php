<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
}
