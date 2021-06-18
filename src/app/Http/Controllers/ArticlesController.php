<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Auth;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index(SearchRequest $request, Category $category, Article $article)
    {
        $query = Article::query();

        if(!empty($request->input('term'))) {
            $query->whereHas('user', function($q) use ($request){
                $q->where('term', $request->input('term'));
            });
        }

        if(!empty($request->input('category_id'))) {
            $query->where('category_id', $request->input('category_id'));
        }

        if(!empty($request->input('word'))) {
            $query->where('summary', 'like', '%'.$article->escapeLike($request->input('word')).'%');
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(5);

        $termsList = range(1, 20);
        $categoriesList = $category->getLists();

        $data = [
            'termsList' => $termsList,
            'categoriesList' => $categoriesList,
            'articles' => $articles,
            'pagenate_params' => [
                'term' => $request->input('term') ?? '',
                'category_id' => $request->input('category_id') ?? '',
                'word' => $request->input('word') ?? '',
            ],
        ];
        
        return view('articles.index', $data);
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

    public function show(Article $article, Category $category)
    {
        $array_category = $category->getLists();
        return view('articles.show', compact('article', 'array_category'));
    } 
}
