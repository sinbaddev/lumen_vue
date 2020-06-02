<?php

namespace App\Api\Transformers\Posts;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;

class PostListTransformer extends TransformerAbstract
{
    public function transform($post)
    {
        return [
            'id' => object_get($post, 'id', null),
            'title'    => object_get($post, 'title', null),
            'slug'    => object_get($post, 'slug', null),
            'content'    => object_get($post, 'content', null),
            'created_at'      => object_get($post, 'created_at', null),
            'updated_at'       => object_get($post, 'updated_at', null),
        ];
    }
}
