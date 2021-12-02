<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function list()
    {
        return Todo::all();
    }

    public function detail($id)
    {
        return Todo::where('id', $id)->first();
    }

    public function create(Request $req)
    {
        $data = json_decode($req->getContent());
        $todo = new Todo();
        $todo->task = $data->task;
        $todo->save();
        return $todo;
    }

    public function tick($id)
    {
        $todo = Todo::where('id', $id)->where('ticked', false)->first();
        if ($todo == NULL) {
            return "suca";
        };
        $todo->ticked = true;
        $todo->save();
        return $todo;
    }
}
