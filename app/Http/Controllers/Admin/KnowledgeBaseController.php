<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKnowledgeBaseRequest;
use App\Http\Requests\StoreKnowledgeBaseRequest;
use App\Http\Requests\UpdateKnowledgeBaseRequest;
use App\KnowledgeBase;
use App\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KnowledgeBaseController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        abort_if(Gate::denies('knowledgeBase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebase = KnowledgeBase::all();
        $category = Category::all();

        return view('admin.knowledgeBase.index', compact('knowledgebase', 'category'));
    }

    public function create()
    {
        abort_if(Gate::denies('knowledgeBase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.knowledgeBase.create');
    }

    public function store(StoreKnowledgeBaseRequest $request)
    {
        $knowledgebase = KnowledgeBase::create($request->all());

        return redirect()->route('admin.knowledgebase.index');
    }

    public function edit(KnowledgeBase $knowledgebase)
    {
        abort_if(Gate::denies('knowledgeBase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.knowledgeBase.edit', compact('knowledgebase'));
    }

    public function update(UpdateKnowledgeBaseRequest $request, KnowledgeBase $knowledgeBase)
    {
        $knowledgebase->update($request->all());

        return redirect()->route('admin.knowledgebase.index');
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('knowledgeBase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $knowledgebase->load('category');
        
        // dd($category);
        // dd($category);
        // dd($knowledgebase);
        // if ($category->id === $knowledgebase->id){
        //     dd($category);
        // }
        // $knowledgebase = load('category');
        
        dd($category);
        return view('admin.knowledgebase.show', compact('category'));
    }

    public function destroy(KnowledgeBase $knowledgeBase)
    {
        abort_if(Gate::denies('knowledgebase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgeBase->delete();

        return back();
    }

    public function massDestroy(MassDestroyKnowledgeBaseRequest $request)
    {
        Priority::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
}
