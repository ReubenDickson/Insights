@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reviewReply.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.review-replies.update", [$reviewReply->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="review_id">{{ trans('cruds.reviewReply.fields.review') }}</label>
                <select class="form-control select2 {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review_id" id="review_id" required>
                    @foreach($reviews as $id => $entry)
                        <option value="{{ $id }}" {{ (old('review_id') ? old('review_id') : $reviewReply->review->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('review'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.review_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reply">{{ trans('cruds.reviewReply.fields.reply') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('reply') ? 'is-invalid' : '' }}" name="reply" id="reply">{!! old('reply', $reviewReply->reply) !!}</textarea>
                @if($errors->has('reply'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reply') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.reply_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reviewer_id">{{ trans('cruds.reviewReply.fields.reviewer') }}</label>
                <select class="form-control select2 {{ $errors->has('reviewer') ? 'is-invalid' : '' }}" name="reviewer_id" id="reviewer_id" required>
                    @foreach($reviewers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('reviewer_id') ? old('reviewer_id') : $reviewReply->reviewer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reviewer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reviewer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.reviewer_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.review-replies.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $reviewReply->id ?? 0 }}');
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