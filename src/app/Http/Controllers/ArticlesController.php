<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function create()
    {
        $category = new Category;
        $categories = $category->getLists();

        return view('articles.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|string|max:50',
            'category_id' => 'required|string|max:1',
            'summary' => 'required|string|min:30',
            'url' => 'required|string|url',
        ]);

        $request->create([
            'user_id' =>  Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'summary' => $request->summary,
            'url' => $request->url,
        ]);

        return redirect('/');
    }
}
