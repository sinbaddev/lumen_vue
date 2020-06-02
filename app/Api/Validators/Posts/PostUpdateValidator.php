<?php

namespace App\Api\Validators\Posts;

use App\Api\Validators\AbstractValidator;

class PostUpdateValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules($params = [])
    {
        $rule = [
            'title'       => 'required',
            'content'   => 'required',
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'title.required'     => 'Title is required',
            'content.required'        => 'Content is required',
        ];
    }
}
