<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Auth;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index(Category $category)
    {
        $termsList = range(1, 20);
        $categoriesList = $category->getLists();
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        $deta = [
            'termsList' => $termsList,
            'categoriesList' => $categoriesList,
            'articles' => $articles
        ];
        
        return view('articles.index', ['deta' => $deta]);
    }

    public function create(Category $category)
    {
        $categories = $category->getLists();

        return view('articles.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|string|max:50',
            'category_id' => 'required|string|max:1',
            'summary' => 'required|string|min:10',
            'url' => 'required|string|url',
        ]);

        $request->user()->articles()->create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'summary' => $request->summary,
            'url' => $request->url,
        ]);

        return redirect('/');
    }
}
