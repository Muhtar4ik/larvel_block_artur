<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function getArticles()
    {
        $articles = Article::query()->where('is_published', '=', true)->paginate(6);

        return view('blog', compact('articles'));
    }


    public function show(Article $article)
    {
        return view('post', compact('article'));
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back();
    }

    public function createForm()
    {
        return view('admin.articles.create');
    }

    public function updateForm(Article $article)
    {
        return view('admin.articles.update', compact('article'));
    }

    public function update(Article $article, ArticleUpdateRequest $request)
    {
        $validated = $request->validated();

        $article->update($validated);

        return redirect()->route('article.show', $article);
    }

    public function store(ArticleStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        $article = Article::query()->create($validated);

        if($request->hasFile('photos'))
        {

            $photos = $request->file('photos');

            foreach($photos as $photo){
                ArticleImage::query()->create([
                    'article_id' => $article->id,
                    'path' => $photo->store('public/image')
                ]);
            }

            
        }

        return redirect()->route('article.show', $article);
    }
}
