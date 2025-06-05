@extends('layouts.admin')
@section('content')
@can('diagnosis_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.diagnoses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.diagnosis.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.diagnosis.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Diagnosis">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.patient') }}
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.chief_complaint') }}
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.diagnosis') }}
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.treatment') }}
                        </th>
                        <th>
                            {{ trans('cruds.diagnosis.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diagnoses as $key => $diagnosis)
                        <tr data-entry-id="{{ $diagnosis->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $diagnosis->id ?? '' }}
                            </td>
                            <td>
                                {{ $diagnosis->patient->fullname ?? '' }}
                            </td>
                            <td>
                                {{ Str::limit($diagnosis->chief_complaint, 50) ?? '' }}
                            </td>
                            <td>
                                {{ Str::limit($diagnosis->diagnosis, 50) ?? '' }}
                            </td>
                            <td>
                                {{ Str::limit($diagnosis->treatment, 50) ?? '' }}
                            </td>
                            <td>
                                {{ $diagnosis->created_at ? $diagnosis->created_at->format('Y-m-d H:i') : '' }}
                            </td>
                            <td>
                                @can('diagnosis_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.diagnoses.show', $diagnosis->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('diagnosis_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.diagnoses.edit', $diagnosis->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('diagnosis_delete')
                                    <form action="{{ route('admin.diagnoses.destroy', $diagnosis->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('diagnosis_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.diagnoses.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')
                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }
                        })
                        .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-Diagnosis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection 