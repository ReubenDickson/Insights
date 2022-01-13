@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.firstTierAfilliate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.first-tier-afilliates.update", [$firstTierAfilliate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="email_id">{{ trans('cruds.firstTierAfilliate.fields.email') }}</label>
                <select class="form-control select2 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email_id" id="email_id">
                    @foreach($emails as $id => $entry)
                        <option value="{{ $id }}" {{ (old('email_id') ? old('email_id') : $firstTierAfilliate->email->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.firstTierAfilliate.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_became_first_tier">{{ trans('cruds.firstTierAfilliate.fields.date_became_first_tier') }}</label>
                <input class="form-control datetime {{ $errors->has('date_became_first_tier') ? 'is-invalid' : '' }}" type="text" name="date_became_first_tier" id="date_became_first_tier" value="{{ old('date_became_first_tier', $firstTierAfilliate->date_became_first_tier) }}" required>
                @if($errors->has('date_became_first_tier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_became_first_tier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.firstTierAfilliate.fields.date_became_first_tier_helper') }}</span>
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