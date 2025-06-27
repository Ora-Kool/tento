<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->latest()->get();
        return Inertia::render('Dashboard', [
            'todos' => $todos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Todo::create([
            'task' => $request->task,
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function update(Todo $todo)
    {

       if ($todo->user_id !== auth()->id()) abort(403);

        $todo->update(['done' => !$todo->done]);

        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
       if ($todo->user_id !== auth()->id()) abort(403);

        $todo->delete();

        return redirect()->back();
    }
}
