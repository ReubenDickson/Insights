@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.poolEarning.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pool-earnings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="period_id">{{ trans('cruds.poolEarning.fields.period') }}</label>
                <select class="form-control select2 {{ $errors->has('period') ? 'is-invalid' : '' }}" name="period_id" id="period_id" required>
                    @foreach($periods as $id => $entry)
                        <option value="{{ $id }}" {{ old('period_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.period_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.poolEarning.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direct_referal_earnings">{{ trans('cruds.poolEarning.fields.direct_referal_earnings') }}</label>
                <input class="form-control {{ $errors->has('direct_referal_earnings') ? 'is-invalid' : '' }}" type="number" name="direct_referal_earnings" id="direct_referal_earnings" value="{{ old('direct_referal_earnings', '0') }}" step="0.01" required>
                @if($errors->has('direct_referal_earnings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direct_referal_earnings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.direct_referal_earnings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_tier_earnings">{{ trans('cruds.poolEarning.fields.first_tier_earnings') }}</label>
                <input class="form-control {{ $errors->has('first_tier_earnings') ? 'is-invalid' : '' }}" type="number" name="first_tier_earnings" id="first_tier_earnings" value="{{ old('first_tier_earnings', '0') }}" step="0.01" required>
                @if($errors->has('first_tier_earnings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_tier_earnings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.first_tier_earnings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="second_tier_earnings">{{ trans('cruds.poolEarning.fields.second_tier_earnings') }}</label>
                <input class="form-control {{ $errors->has('second_tier_earnings') ? 'is-invalid' : '' }}" type="number" name="second_tier_earnings" id="second_tier_earnings" value="{{ old('second_tier_earnings', '0') }}" step="0.01" required>
                @if($errors->has('second_tier_earnings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('second_tier_earnings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.second_tier_earnings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="third_tier_earnings">{{ trans('cruds.poolEarning.fields.third_tier_earnings') }}</label>
                <input class="form-control {{ $errors->has('third_tier_earnings') ? 'is-invalid' : '' }}" type="number" name="third_tier_earnings" id="third_tier_earnings" value="{{ old('third_tier_earnings', '0') }}" step="0.01" required>
                @if($errors->has('third_tier_earnings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('third_tier_earnings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolEarning.fields.third_tier_earnings_helper') }}</span>
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