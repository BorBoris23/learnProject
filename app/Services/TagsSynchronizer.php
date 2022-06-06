<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagsSynchronizer
{
    public function sync($tags, $model)
    {
        $articleTags = $model->tags->keyBy('name');

        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAdd = $tags->diffKeys($articleTags);

        foreach ($tagsToAdd as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
