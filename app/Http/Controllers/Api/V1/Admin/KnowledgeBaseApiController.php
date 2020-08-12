<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\KnowledgeBase;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreKnowledgeBaseRequest;
use App\Http\Requests\UpdateKnowledgeBaseRequest;
use App\Http\Resources\Admin\KnowledgeBaseResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KnowledgeBaseApiController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        abort_if(Gate::denies('knowledgeBase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new KnowledgeBaseResource(KnowledgeBase::all());
    }

    public function store(StoreKnowledgeBaseRequest $request)
    {
        $knowledgeBase = KnowledgeBase::create($request->all());

        return (new KnowledgeBaseResource($knowledgeBase))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KnowledgeBase $knowledgeBase)
    {
        abort_if(Gate::denies('knowledgeBase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KnowledgeBaseResource($knowledgeBase);
    }

    public function update(UpdateKnowledgeBaseRequest $request, KnowledgeBase $knowledgeBase)
    {
        $knowledgeBase->update($request->all());

        return (new KnowledgeBaseResource($knowledgeBase))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KnowledgeBase $knowledgeBase)
    {
        abort_if(Gate::denies('knowledgeBase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgeBase->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
