<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\TodoRequest;


class TodoController extends Controller
{
    public function index(){
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos','categories'));
    }

    public function store(TodoRequest $request){
        $task = $request -> only(['content','category_id']);
        Todo::create($task);         
        return redirect('/')->with('message','Todoを作成しました');
    }



    public function update(TodoRequest $request){
        $renew = $request -> only(['content']);
        Todo::find($request->id)->update($renew);
        return redirect('/')->with('message','Todoを更新しました');
    }

    public function destroy(Request $request){
        Todo::find($request->id)->delete();

        return redirect('/')->with('message','Todoを削除しました');
    }

   

    
}