<?php

namespace App\Http\Requests;

use App\KnowledgeBase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKnowledgeBaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('knowledgebase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:knowledgebase,id',
        ];
    }
}
