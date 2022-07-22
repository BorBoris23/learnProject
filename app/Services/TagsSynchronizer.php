<?php

namespace App\Services;

use App\Models\Tag;

class TagsSynchronizer
{
    public function sync($tags, $model)
    {
        $newTags = $model->tags->keyBy('name');

        $syncIds = $newTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAdd = $tags->diffKeys($newTags);

        foreach ($tagsToAdd as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
