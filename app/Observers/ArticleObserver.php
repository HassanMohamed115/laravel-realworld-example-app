<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleRevision;
use Illuminate\Support\Facades\Auth;
class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        // Save old data as a revision
        ArticleRevision::create([
            'article_id' => $article->id,
            'user_id'    => Auth::id(),
            'title'      => $article->getOriginal('title'),
            'slug'    => $article->getOriginal('slug'),
            'description'    => $article->getOriginal('description'),
            'body'    => $article->getOriginal('body'),

        ]);
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
