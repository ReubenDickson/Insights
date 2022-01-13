@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bankAccount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank-accounts.update", [$bankAccount->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="owner_id">{{ trans('cruds.bankAccount.fields.owner') }}</label>
                <select class="form-control select2 {{ $errors->has('owner') ? 'is-invalid' : '' }}" name="owner_id" id="owner_id">
                    @foreach($owners as $id => $entry)
                        <option value="{{ $id }}" {{ (old('owner_id') ? old('owner_id') : $bankAccount->owner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('owner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bankAccount.fields.owner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_name">{{ trans('cruds.bankAccount.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $bankAccount->account_name) }}">
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bankAccount.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_number">{{ trans('cruds.bankAccount.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', $bankAccount->account_number) }}">
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bankAccount.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank">{{ trans('cruds.bankAccount.fields.bank') }}</label>
                <input class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" id="bank" value="{{ old('bank', $bankAccount->bank) }}">
                @if($errors->has('bank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bankAccount.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sortcode">{{ trans('cruds.bankAccount.fields.sortcode') }}</label>
                <input class="form-control {{ $errors->has('sortcode') ? 'is-invalid' : '' }}" type="text" name="sortcode" id="sortcode" value="{{ old('sortcode', $bankAccount->sortcode) }}">
                @if($errors->has('sortcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sortcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bankAccount.fields.sortcode_helper') }}</span>
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