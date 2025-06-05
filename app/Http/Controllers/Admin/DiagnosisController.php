<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDiagnosisRequest;
use App\Http\Requests\Admin\StoreDiagnosisRequest;
use App\Http\Requests\Admin\UpdateDiagnosisRequest;
use App\Models\Diagnosis;
use App\Models\Patient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('diagnosis_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diagnoses = Diagnosis::with(['patient'])->get();

        return view('admin.diagnoses.index', compact('diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('diagnosis_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.diagnoses.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiagnosisRequest $request)
    {
        $diagnosis = Diagnosis::create($request->all());

        return redirect()->route('admin.diagnoses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnosis $diagnosis)
    {
        abort_if(Gate::denies('diagnosis_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diagnosis->load('patient');

        return view('admin.diagnoses.show', compact('diagnosis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnosis $diagnosis)
    {
        abort_if(Gate::denies('diagnosis_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diagnosis->load('patient');

        return view('admin.diagnoses.edit', compact('patients', 'diagnosis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiagnosisRequest $request, Diagnosis $diagnosis)
    {
        $diagnosis->update($request->all());

        return redirect()->route('admin.diagnoses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnosis $diagnosis)
    {
        abort_if(Gate::denies('diagnosis_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diagnosis->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiagnosisRequest $request)
    {
        Diagnosis::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
