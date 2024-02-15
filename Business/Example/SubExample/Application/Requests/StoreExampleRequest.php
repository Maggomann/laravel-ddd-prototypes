<?php

namespace Business\Example\SubExample\Application\Requests;

class StoreExampleRequest extends Request
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:examples,name',
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('messages.prototypes.models.example.name'),
        ];
    }
}
