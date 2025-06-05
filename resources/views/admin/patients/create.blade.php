@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.patients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="fullname">{{ trans('cruds.patient.fields.fullname') }}</label>
                <input class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" type="text" name="fullname" id="fullname" value="{{ old('fullname', '') }}" required>
                @if($errors->has('fullname'))
                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.fullname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father">{{ trans('cruds.patient.fields.father') }}</label>
                <input class="form-control {{ $errors->has('father') ? 'is-invalid' : '' }}" type="text" name="father" id="father" value="{{ old('father', '') }}">
                @if($errors->has('father'))
                    <span class="text-danger">{{ $errors->first('father') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.father_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother">{{ trans('cruds.patient.fields.mother') }}</label>
                <input class="form-control {{ $errors->has('mother') ? 'is-invalid' : '' }}" type="text" name="mother" id="mother" value="{{ old('mother', '') }}">
                @if($errors->has('mother'))
                    <span class="text-danger">{{ $errors->first('mother') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birthdate">{{ trans('cruds.patient.fields.birthdate') }}</label>
                <input class="form-control date {{ $errors->has('birthdate') ? 'is-invalid' : '' }}" type="text" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
                @if($errors->has('birthdate'))
                    <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.birthdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gender">{{ trans('cruds.patient.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'] as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marital_status">{{ trans('cruds.patient.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status">
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(['single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed'] as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.patient.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.patient.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="workplace">{{ trans('cruds.patient.fields.workplace') }}</label>
                <input class="form-control {{ $errors->has('workplace') ? 'is-invalid' : '' }}" type="text" name="workplace" id="workplace" value="{{ old('workplace', '') }}">
                @if($errors->has('workplace'))
                    <span class="text-danger">{{ $errors->first('workplace') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.workplace_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="national_id">{{ trans('cruds.patient.fields.national_id') }}</label>
                <input class="form-control {{ $errors->has('national_id') ? 'is-invalid' : '' }}" type="text" name="national_id" id="national_id" value="{{ old('national_id', '') }}">
                @if($errors->has('national_id'))
                    <span class="text-danger">{{ $errors->first('national_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.national_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="medical_history">{{ trans('cruds.patient.fields.medical_history') }}</label>
                <textarea class="form-control {{ $errors->has('medical_history') ? 'is-invalid' : '' }}" name="medical_history" id="medical_history">{{ old('medical_history') }}</textarea>
                @if($errors->has('medical_history'))
                    <span class="text-danger">{{ $errors->first('medical_history') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.medical_history_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.patient.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
        url: '{{ route('admin.patients.storeMedia') }}',
        maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
            size: 2,
            width: 4096,
            height: 4096
        },
        success: function (file, response) {
            $('form').find('input[name="photo"]').remove()
            $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="photo"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
            @if(isset($patient) && $patient->photo)
                var file = {!! json_encode($patient->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
            @endif
        },
        error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }
            return _results
        }
    }
</script>
@endsection 