@extends('layouts.layout')
@section('content')

<div class="card card-warning card-outline">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.permission.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.permission.fields.title') }}
                    </th>
                    <td>
                        {{ $permission->title }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection