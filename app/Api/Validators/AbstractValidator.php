<?php

namespace App\Api\Validators;

use Validator;
use App\Exceptions\ValidationHttpException;

abstract class AbstractValidator
{
    protected $params;
    /**
     * @return array
     */
    abstract protected function rules($params = []);


    /**
     * @param $input
     * @return
     * @throws ApiValidateException
     */
    public function validate($input, $params = [])
    {
        $this->params = $params;
        $validator =  Validator::make($input, $this->rules($params), $this->messages());

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->getMessages());
        }

        return $validator;
    }

    /**
     * @return array
     */
    protected function messages()
    {
        return [];
    }
}
