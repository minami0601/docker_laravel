<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\ArticleRequest;
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

    public function store(ArticleRequest $request)
    {
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

    public function edit(Article $article, Category $category)
    {
        $this->authorize('update', $article);
        $array_category = $category->getLists();
        return view('articles.edit', compact('article', 'array_category'));
    } 

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect('/')->with('flash_message', '記事を更新しました');
    }
}
