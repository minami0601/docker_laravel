<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Comment;
use Auth;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index(SearchRequest $request, Category $category, Article $article)
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        $termsList = range(1, 20);
        $categoriesList = $category->getLists();

        return view('articles.index', compact('articles', 'termsList', 'categoriesList'));
    }

    public function create(Category $category)
    {
        $categories = $category->getLists();
        return view('articles.create', compact('categories'));
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
        $comments = $article->comments;
        $array_category = $category->getLists();
        return view('articles.show', compact('article', 'array_category', 'comments'));
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

    public function destroy($id)
    {
        $article = Article::find($id);
        $this->authorize('delete', $article);
        $article->delete();
        return redirect('/')->with('flash_message', '記事を削除しました');
    }

    public function search(SearchRequest $request, Category $category, Article $article) 
    {
        $term = $request->input('term');
        $category_id = $request->input('category_id');
        $word = $request->input('word');
        $articles = $article->serch($term, $category_id, $word);

        $termsList = range(1, 20);
        $categoriesList = $category->getLists();

        $data = [
            'termsList' => $termsList,
            'categoriesList' => $categoriesList,
            'articles' => $articles,
            'pagenate_params' => [
                'term' => $term ?? '',
                'category_id' => $category_id ?? '',
                'word' => $word ?? '',
            ],
        ];
        
        return view('articles.index', $data);
    }
}
