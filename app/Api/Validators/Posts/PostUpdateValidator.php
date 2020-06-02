<?php

namespace App\Api\Validators\Posts;

use App\Api\Validators\AbstractValidator;
use App\Api\Models\Post;

class PostUpdateValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules($params = [])
    {
        $rule = [
            'id'           => 'required|integer|exists:' . Post::getTableName() . ',id',
            'title'       => 'required',
            'content'   => 'required',
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'id.exists' => 'Post is not exists.',
            'title.required'     => 'Title is required',
            'content.required'        => 'Content is required',
        ];
    }
}
