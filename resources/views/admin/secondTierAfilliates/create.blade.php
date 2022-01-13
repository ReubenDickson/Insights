@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.secondTierAfilliate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.second-tier-afilliates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="email_id">{{ trans('cruds.secondTierAfilliate.fields.email') }}</label>
                <select class="form-control select2 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email_id" id="email_id" required>
                    @foreach($emails as $id => $entry)
                        <option value="{{ $id }}" {{ old('email_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.secondTierAfilliate.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_became_second_tier">{{ trans('cruds.secondTierAfilliate.fields.date_became_second_tier') }}</label>
                <input class="form-control datetime {{ $errors->has('date_became_second_tier') ? 'is-invalid' : '' }}" type="text" name="date_became_second_tier" id="date_became_second_tier" value="{{ old('date_became_second_tier') }}" required>
                @if($errors->has('date_became_second_tier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_became_second_tier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.secondTierAfilliate.fields.date_became_second_tier_helper') }}</span>
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