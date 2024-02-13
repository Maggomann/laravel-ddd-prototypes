<?php

namespace PrototypeOne\Application\Requests;

use Illuminate\Http\Request;

class UpdateExampleRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // do something
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:examples,name,' . $this->route('example')->id,
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
