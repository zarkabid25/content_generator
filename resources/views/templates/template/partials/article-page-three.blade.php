<div id="page_three_fields" class="hidden">
    <div class="form-group">
        <label for="">{{ __('Reference Content 1') }}</label>

        <div>
            <input type="checkbox" name="reference_content_1[]" class="{{ $errors->has('reference_content_1') ? ' is-invalid' : '' }}" value="{{ 'Use for Structure and Language style' }}">
            Use for Structure and Language style
            <br />

            <input type="checkbox" name="reference_content_1[]" class="{{ $errors->has('reference_content_1') ? ' is-invalid' : '' }}" value="{{ 'Use for Inspiration' }}">
            Use for Inspiration
            <br />
        </div>

        @if ($errors->has('reference_content_1'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('reference_content_1') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The reference content 1 of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-paste_content">{{ __('Paste content') }}</label>
        <textarea name="paste_content" class="form-control{{ $errors->has('paste_content') ? ' is-invalid' : '' }}"></textarea>
        @if ($errors->has('paste_content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('paste_content') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The paste content of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="">{{ __('Reference Content 2') }}</label>

        <div>
            <input type="checkbox" name="reference_content_2[]" class="{{ $errors->has('reference_content_2') ? ' is-invalid' : '' }}" value="{{ 'Use for Structure and Language style' }}">
            Use for Structure and Language style
            <br />

            <input type="checkbox" name="reference_content_2[]" class="{{ $errors->has('reference_content_2') ? ' is-invalid' : '' }}" value="{{ 'Use for Inspiration' }}">
            Use for Inspiration
            <br />
        </div>

        @if ($errors->has('reference_content_2'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('reference_content_2') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The reference content 1 of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-paste_content2">{{ __('Paste content') }}</label>
        <textarea name="paste_content2" class="form-control{{ $errors->has('paste_content2') ? ' is-invalid' : '' }}"></textarea>
        @if ($errors->has('paste_content2'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('paste_content2') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The paste content of the article.') }}</small>
    </div>

</div>