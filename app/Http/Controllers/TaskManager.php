<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TaskManager extends Controller
{

    function ListTask()
    {
        $tasks = Tasks::where('user_id', Auth::id())->paginate(10); // Fetch only the logged-in user's tasks

    return view('welcome', compact('tasks'));
    }

   function addTask(){

return view('tasks.add');
}


function addTaskPost(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'deadline' => 'required',
    ]);

    $task = new Tasks();
    $task->user_id = Auth::id();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->deadline = $request->deadline;
    if($task->save()){
        return redirect(route("home"))->with("success","Task added successfully");
    }
    return redirect(route("tasks.add"))->with("error","Task not added");
}



public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000', // Allow description but make it optional
    ]);

    $task = Tasks::find($id);
    if ($task) {
        $task->title = $request->title;
        $task->description = $request->description; // Updating description
        $task->save();
        return redirect()->back()->with('success', 'Task updated successfully!');
    }
    return redirect()->back()->with('error', 'Task not found!');
}

function deleteTask($id)
{
if(Tasks::where('id',$id)->delete()){
return redirect(route("home"))->with("success","Task deleted");
}
return redirect(route("home"))->with("error","Error occured while deleting, try again");
}

public function edit($id)
{
    $task = Tasks::find($id); // Find the task by ID

    if ($task) {
        return view('tasks.edit', compact('task')); // Pass the task to the view
    }

    return redirect()->route('tasks.index')->with('error', 'Task not found!'); // Redirect if not found
}

}
