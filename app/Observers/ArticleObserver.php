<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function creating(Article $article)
    {
        $this->setUser($article);
        $this->setSlug($article);
    }

    public function updating(Article $article)
    {
        $this->setSlug($article);
    }

    protected function setSlug($article)
    {
        if(empty($article->slug)) {
            $article->slug = \Str::slug($article->name);
        }
    }

    protected function setUser($article)
    {
        $article->author_id = auth()->user()->id ?? rand(1, 10);
    }
}
