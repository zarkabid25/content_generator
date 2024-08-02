<div id="page_two_fields" class="hidden">

    <div class="form-group">
        <label for="i-primary_keyword">{{ __('Primary Keyword') }}</label>
        <input type="text" name="primary_keyword" id="i-primary_keyword" class="form-control{{ $errors->has('primary_keyword') ? ' is-invalid' : '' }}" value="{{ $primary_keyword ?? (old('primary_keyword') ?? '') }}">
        @if ($errors->has('primary_keyword'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('primary_keyword') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The primary keyword of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-secondary_keywords">{{ __('Secondary Keywords') }}</label>
        <textarea name="secondary_keywords" id="i-secondary_keywords" class="form-control{{ $errors->has('secondary_keywords') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('secondary_keywords'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('secondary_keywords') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The secondary keywords of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-keyword_usage_guidelines">{{ __('Keyword Usage Guidelines') }}</label>
        <textarea name="keyword_usage_guidelines" id="i-keyword_usage_guidelines" class="form-control{{ $errors->has('keyword_usage_guidelines') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('keyword_usage_guidelines'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('keyword_usage_guidelines') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The keyword usage guidelines of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-article_title">{{ __('Article Title (H1)') }}</label>
        <span id="char-count-article" class="text-secondary">(0)</span>
        <input type="text" name="article_title" id="i-article_title" class="form-control{{ $errors->has('article_title') ? ' is-invalid' : '' }}" value="{{ $article_title ?? (old('article_title') ?? '') }}">
        @if ($errors->has('article_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('article_title') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The article title of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-seo_title">{{ __('SEO Title') }}</label>
        <span id="char-count-seo" class="text-secondary">(0)</span>
        <input type="text" name="seo_title" id="i-seo_title" class="form-control{{ $errors->has('seo_title') ? ' is-invalid' : '' }}" value="{{ $seo_title ?? (old('seo_title') ?? '') }}">
        @if ($errors->has('seo_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('seo_title') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The seo title of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-meta_description">{{ __('Meta Description') }}</label>
        <span id="char-count-meta" class="text-secondary">(0)</span>
        <textarea name="meta_description" id="i-meta_description" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('meta_description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('meta_description') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The meta description of the article.') }}</small>
    </div>

</div>
