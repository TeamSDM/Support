<?php

namespace App\Http\Requests;

use App\KnowledgeBase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreKnowledgeBaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('knowledgebase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
