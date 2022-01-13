<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMybankRequest;
use App\Http\Requests\StoreMybankRequest;
use App\Http\Requests\UpdateMybankRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MybankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mybank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mybanks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mybank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mybanks.create');
    }

    public function store(StoreMybankRequest $request)
    {
        $mybank = Mybank::create($request->all());

        return redirect()->route('admin.mybanks.index');
    }

    public function edit(Mybank $mybank)
    {
        abort_if(Gate::denies('mybank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mybanks.edit', compact('mybank'));
    }

    public function update(UpdateMybankRequest $request, Mybank $mybank)
    {
        $mybank->update($request->all());

        return redirect()->route('admin.mybanks.index');
    }

    public function show(Mybank $mybank)
    {
        abort_if(Gate::denies('mybank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mybanks.show', compact('mybank'));
    }

    public function destroy(Mybank $mybank)
    {
        abort_if(Gate::denies('mybank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mybank->delete();

        return back();
    }

    public function massDestroy(MassDestroyMybankRequest $request)
    {
        Mybank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
