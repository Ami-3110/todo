<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $task = $request -> only(['name']);
        Category::create($task);
        return redirect('categories')->with('message','カテゴリを作成しました');
    }

     public function update(CategoryRequest $request){
        $renew = $request -> only(['name']);
        Category::find($request->id)->update($renew);

        return redirect('categories')->with('message','カテゴリを更新しました');
    }

    public function destroy(Request $request){
        Category::find($request->id)->delete();

        return redirect('categories')->with('message','カテゴリを削除しました');

    }
}