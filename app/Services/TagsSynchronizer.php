<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagsSynchronizer
{
//    public function sync(Collection $tags, Model $model)
//    {
//        /**@var Collection $articleTags */
//        $articleTags = $article->tags->keyBy('name');
//
//        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });
//
//        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
//
//        $tagsToAdd = $tags->diffKeys($articleTags);
//
//        foreach ($tagsToAdd as $tag) {
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $syncIds[] = $tag->id;
//        }
//
//        $article->tags()->sync($syncIds);
//    }
}
