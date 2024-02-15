<?php

namespace Business\Example\Application\Requests;

class EditExampleRequest extends Request
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:examples,name,'.$this->route('example')->id,
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
