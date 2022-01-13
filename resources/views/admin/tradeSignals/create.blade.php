@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tradeSignal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trade-signals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="crypto_pair">{{ trans('cruds.tradeSignal.fields.crypto_pair') }}</label>
                <input class="form-control {{ $errors->has('crypto_pair') ? 'is-invalid' : '' }}" type="text" name="crypto_pair" id="crypto_pair" value="{{ old('crypto_pair', 'BTC/USDT') }}" required>
                @if($errors->has('crypto_pair'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crypto_pair') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tradeSignal.fields.crypto_pair_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="entry">{{ trans('cruds.tradeSignal.fields.entry') }}</label>
                <input class="form-control {{ $errors->has('entry') ? 'is-invalid' : '' }}" type="text" name="entry" id="entry" value="{{ old('entry', '') }}" required>
                @if($errors->has('entry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tradeSignal.fields.entry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exit">{{ trans('cruds.tradeSignal.fields.exit') }}</label>
                <input class="form-control {{ $errors->has('exit') ? 'is-invalid' : '' }}" type="text" name="exit" id="exit" value="{{ old('exit', '') }}" required>
                @if($errors->has('exit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tradeSignal.fields.exit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stop_loss">{{ trans('cruds.tradeSignal.fields.stop_loss') }}</label>
                <input class="form-control {{ $errors->has('stop_loss') ? 'is-invalid' : '' }}" type="text" name="stop_loss" id="stop_loss" value="{{ old('stop_loss', '') }}" required>
                @if($errors->has('stop_loss'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stop_loss') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tradeSignal.fields.stop_loss_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.tradeSignal.fields.comment') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{!! old('comment') !!}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tradeSignal.fields.comment_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.trade-signals.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $tradeSignal->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection