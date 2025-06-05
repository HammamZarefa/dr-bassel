@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.diagnosis.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diagnoses.update", [$diagnosis->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="patient_id">{{ trans('cruds.diagnosis.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient_id') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $diagnosis->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chief_complaint">{{ trans('cruds.diagnosis.fields.chief_complaint') }}</label>
                <textarea class="form-control {{ $errors->has('chief_complaint') ? 'is-invalid' : '' }}" name="chief_complaint" id="chief_complaint">{{ old('chief_complaint', $diagnosis->chief_complaint) }}</textarea>
                @if($errors->has('chief_complaint'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chief_complaint') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.chief_complaint_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="medical_history">{{ trans('cruds.diagnosis.fields.medical_history') }}</label>
                <textarea class="form-control {{ $errors->has('medical_history') ? 'is-invalid' : '' }}" name="medical_history" id="medical_history">{{ old('medical_history', $diagnosis->medical_history) }}</textarea>
                @if($errors->has('medical_history'))
                    <div class="invalid-feedback">
                        {{ $errors->first('medical_history') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.medical_history_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clinical_examination">{{ trans('cruds.diagnosis.fields.clinical_examination') }}</label>
                <textarea class="form-control {{ $errors->has('clinical_examination') ? 'is-invalid' : '' }}" name="clinical_examination" id="clinical_examination">{{ old('clinical_examination', $diagnosis->clinical_examination) }}</textarea>
                @if($errors->has('clinical_examination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinical_examination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.clinical_examination_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abdominal_examination">{{ trans('cruds.diagnosis.fields.abdominal_examination') }}</label>
                <textarea class="form-control {{ $errors->has('abdominal_examination') ? 'is-invalid' : '' }}" name="abdominal_examination" id="abdominal_examination">{{ old('abdominal_examination', $diagnosis->abdominal_examination) }}</textarea>
                @if($errors->has('abdominal_examination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('abdominal_examination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.abdominal_examination_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abdominal_ultrasound">{{ trans('cruds.diagnosis.fields.abdominal_ultrasound') }}</label>
                <textarea class="form-control {{ $errors->has('abdominal_ultrasound') ? 'is-invalid' : '' }}" name="abdominal_ultrasound" id="abdominal_ultrasound">{{ old('abdominal_ultrasound', $diagnosis->abdominal_ultrasound) }}</textarea>
                @if($errors->has('abdominal_ultrasound'))
                    <div class="invalid-feedback">
                        {{ $errors->first('abdominal_ultrasound') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.abdominal_ultrasound_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="laboratory_tests">{{ trans('cruds.diagnosis.fields.laboratory_tests') }}</label>
                <textarea class="form-control {{ $errors->has('laboratory_tests') ? 'is-invalid' : '' }}" name="laboratory_tests" id="laboratory_tests">{{ old('laboratory_tests', $diagnosis->laboratory_tests) }}</textarea>
                @if($errors->has('laboratory_tests'))
                    <div class="invalid-feedback">
                        {{ $errors->first('laboratory_tests') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.laboratory_tests_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="upper_endoscopy">{{ trans('cruds.diagnosis.fields.upper_endoscopy') }}</label>
                <textarea class="form-control {{ $errors->has('upper_endoscopy') ? 'is-invalid' : '' }}" name="upper_endoscopy" id="upper_endoscopy">{{ old('upper_endoscopy', $diagnosis->upper_endoscopy) }}</textarea>
                @if($errors->has('upper_endoscopy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upper_endoscopy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.upper_endoscopy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lower_endoscopy">{{ trans('cruds.diagnosis.fields.lower_endoscopy') }}</label>
                <textarea class="form-control {{ $errors->has('lower_endoscopy') ? 'is-invalid' : '' }}" name="lower_endoscopy" id="lower_endoscopy">{{ old('lower_endoscopy', $diagnosis->lower_endoscopy) }}</textarea>
                @if($errors->has('lower_endoscopy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lower_endoscopy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.lower_endoscopy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ercp">{{ trans('cruds.diagnosis.fields.ercp') }}</label>
                <textarea class="form-control {{ $errors->has('ercp') ? 'is-invalid' : '' }}" name="ercp" id="ercp">{{ old('ercp', $diagnosis->ercp) }}</textarea>
                @if($errors->has('ercp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ercp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.ercp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="further_investigations">{{ trans('cruds.diagnosis.fields.further_investigations') }}</label>
                <textarea class="form-control {{ $errors->has('further_investigations') ? 'is-invalid' : '' }}" name="further_investigations" id="further_investigations">{{ old('further_investigations', $diagnosis->further_investigations) }}</textarea>
                @if($errors->has('further_investigations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('further_investigations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.further_investigations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diagnosis">{{ trans('cruds.diagnosis.fields.diagnosis') }}</label>
                <textarea class="form-control {{ $errors->has('diagnosis') ? 'is-invalid' : '' }}" name="diagnosis" id="diagnosis">{{ old('diagnosis', $diagnosis->diagnosis) }}</textarea>
                @if($errors->has('diagnosis'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diagnosis') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.diagnosis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="treatment">{{ trans('cruds.diagnosis.fields.treatment') }}</label>
                <textarea class="form-control {{ $errors->has('treatment') ? 'is-invalid' : '' }}" name="treatment" id="treatment">{{ old('treatment', $diagnosis->treatment) }}</textarea>
                @if($errors->has('treatment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('treatment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.treatment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="follow_up">{{ trans('cruds.diagnosis.fields.follow_up') }}</label>
                <textarea class="form-control {{ $errors->has('follow_up') ? 'is-invalid' : '' }}" name="follow_up" id="follow_up">{{ old('follow_up', $diagnosis->follow_up) }}</textarea>
                @if($errors->has('follow_up'))
                    <div class="invalid-feedback">
                        {{ $errors->first('follow_up') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.follow_up_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.diagnosis.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $diagnosis->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat">{{ trans('cruds.diagnosis.fields.sat') }}</label>
                <input class="form-control {{ $errors->has('sat') ? 'is-invalid' : '' }}" type="text" name="sat" id="sat" value="{{ old('sat', $diagnosis->sat) }}">
                @if($errors->has('sat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.sat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rr">{{ trans('cruds.diagnosis.fields.rr') }}</label>
                <input class="form-control {{ $errors->has('rr') ? 'is-invalid' : '' }}" type="text" name="rr" id="rr" value="{{ old('rr', $diagnosis->rr) }}">
                @if($errors->has('rr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.rr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hr">{{ trans('cruds.diagnosis.fields.hr') }}</label>
                <input class="form-control {{ $errors->has('hr') ? 'is-invalid' : '' }}" type="text" name="hr" id="hr" value="{{ old('hr', $diagnosis->hr) }}">
                @if($errors->has('hr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.hr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bp">{{ trans('cruds.diagnosis.fields.bp') }}</label>
                <input class="form-control {{ $errors->has('bp') ? 'is-invalid' : '' }}" type="text" name="bp" id="bp" value="{{ old('bp', $diagnosis->bp) }}">
                @if($errors->has('bp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.diagnosis.fields.bp_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 