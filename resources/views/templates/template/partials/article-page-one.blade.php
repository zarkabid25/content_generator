<div id="page_one_fields">
    <div class="form-group">
        <label for="i-name">{{ __('Name') }}</label>
        <input type="text" name="name" id="i-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $name ?? (old('name') ?? '') }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The name of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-content_type">{{ __('Content Type') }}</label>
        <select name="content_type" id="i-content_type" class="form-control{{ $errors->has('content_type') ? ' is-invalid' : '' }}">
            <option selected disabled>Select</option>
            <option value="blog">Blog</option>
            <option value="article">Article</option>
            <option value="press_release">Press Release</option>
        </select>

        @if ($errors->has('content_type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('content_type') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The content type of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-target_language">{{ __('Target Language') }}</label>
        <select id="languageSelect" name="target_language" class="form-control custom-select"  style="width: 100%; height: auto;">
            <option selected disabled>Select</option>
            <option value="Arabic">Arabic - Saudi Arabia</option>
            <option value="Bengali">Bengali - Bangladesh</option>
            <option value="Chinese">Chinese - China</option>
            <option value="Danish">Danish - Denmark</option>
            <option value="Dutch">Dutch - Netherlands</option>
            <option value="English-UK">English - United Kingdom</option>
            <option value="English-US">English - United States</option>
            <option value="Finnish">Finnish - Finland</option>
            <option value="French">French - France</option>
            <option value="German">German - Germany</option>
            <option value="Greek">Greek - Greece</option>
            <option value="Hebrew">Hebrew - Israel</option>
            <option value="Hindi">Hindi - India</option>
            <option value="Indonesian">Indonesian - Indonesia</option>
            <option value="Italian">Italian - Italy</option>
            <option value="Japanese">Japanese - Japan</option>
            <option value="Korean">Korean - South Korea</option>
            <option value="Malay">Malay - Malaysia</option>
            <option value="Norwegian">Norwegian - Norway</option>
            <option value="Persian">Persian - Iran</option>
            <option value="Polish">Polish - Poland</option>
            <option value="Portuguese-Brazil">Portuguese - Brazil</option>
            <option value="Portuguese-Portugal">Portuguese - Portugal</option>
            <option value="Russian">Russian - Russia</option>
            <option value="Spanish-LA">Spanish - Latin America</option>
            <option value="Spanish-Spain">Spanish - Spain</option>
            <option value="Swedish">Swedish - Sweden</option>
            <option value="Thai">Thai - Thailand</option>
            <option value="Turkish">Turkish - Turkey</option>
            <option value="Vietnamese">Vietnamese - Vietnam</option>
        </select>

        @if ($errors->has('target_language'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('target_language') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The target language to include.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-country_language_specific">{{ __('Country/Language Specific') }}</label>

        <div>
            Yes
            <input type="radio" name="country_language" id="i-yes" class="{{ $errors->has('country_language') ? ' is-invalid' : '' }}" value="{{ 'The content should be relevant to the {Target_Language} market' }}">
            No
            <input type="radio" name="country_language" id="i-no" class="{{ $errors->has('country_language') ? ' is-invalid' : '' }}" value="{{ 'This content does not need to be specific to any country or market' }}">
        </div>

        @if ($errors->has('country_language'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country_language') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The country/language specific of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="">{{ __('Objective') }}</label>

        <div>
            <input type="checkbox" name="objective[]" class="{{ $errors->has('objective') ? ' is-invalid' : '' }}" value="{{ 'Increase organic visits' }}">
            Increase organic visits
            <br />

            <input type="checkbox" name="objective[]" class="{{ $errors->has('objective') ? ' is-invalid' : '' }}" value="{{ 'Acquire new users' }}">
            Acquire new users
            <br />

            <input type="checkbox" name="objective[]" class="{{ $errors->has('objective') ? ' is-invalid' : '' }}" value="{{ 'Enhance brand awareness' }}">
            Enhance brand awareness
            <br />

            <input type="checkbox" name="objective[]" class="{{ $errors->has('objective') ? ' is-invalid' : '' }}" value="{{ 'Promote a product/service' }}">
            Promote a product/service
            <br />

            <input type="checkbox" onchange="displayField(this);" class="{{ $errors->has('objective') ? ' is-invalid' : '' }}">
            Other
            <br />
        </div>

        <div id="objective_other_input"></div>

        @if ($errors->has('objective'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('objective') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The objective of the article.') }}</small>
    </div>

    <label for="i-topic_and_context">{{ __('Topic and Context') }}</label>
    <div class="form-group">
        <label for="i-topic">{{ __('Topic') }}</label>
        <input type="text" name="topic" id="i-topic" class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" value="{{ $topic ?? (old('topic') ?? '') }}">
        @if ($errors->has('topic'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('topic') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The topic of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-main_focus">{{ __('Main Focus') }}</label>
        <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">
        @if ($errors->has('main_focus'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('main_focus') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The main focus of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-angle_approach">{{ __('Angle/Approach') }}</label>
        <select name="angle_approach" id="i-angle_approach" class="form-control{{ $errors->has('angle_approach') ? ' is-invalid' : '' }}">
            <option selected disabled>Select</option>
            <option value="informative">Informative</option>
            <option value="persuasive">Persuasive</option>
            <option value="entertaining">Entertaining</option>
        </select>

        @if ($errors->has('angle_approach'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('angle_approach') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The angle approach of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-key_points">{{ __('Key Points/Takeaways') }}</label>
        <textarea name="key_points" id="i-key_points" class="form-control{{ $errors->has('key_points') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('key_points'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('key_points') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The key points/takeways of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-target_audience">{{ __('Target Audience') }}</label>
        <textarea name="target_audience" id="i-target_audience" class="form-control{{ $errors->has('target_audience') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('target_audience'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('target_audience') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The target audience of the article.') }}</small>
    </div>

    <label for="">{{ __('Tone of Voice') }}</label>
    <div class="form-group">
        <label for="i-brand_voice">{{ __('Brand Voice') }}</label>
        <select name="brand_voice" id="i-brand_voice" class="form-control{{ $errors->has('brand_voice') ? ' is-invalid' : '' }}">
            <option selected disabled>Select</option>
            <option value="professional">Professional</option>
            <option value="casual">Casual</option>
            <option value="friendly">Friendly</option>
            <option value="authoritative">Authoritative</option>
        </select>

        @if ($errors->has('brand_voice'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('brand_voice') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The brand voice of the article.') }}</small>
    </div>

    <div class="form-group">
        <label for="i-additional_notes">{{ __('Additional Notes') }}</label>
        <textarea name="additional_notes" id="i-additional_notes" class="form-control{{ $errors->has('additional_notes') ? ' is-invalid' : '' }}"></textarea>
        {{--  <input type="text" name="main_focus" id="i-main_focus" class="form-control{{ $errors->has('main_focus') ? ' is-invalid' : '' }}" value="{{ $main_focus ?? (old('main_focus') ?? '') }}">  --}}
        @if ($errors->has('additional_notes'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('additional_notes') }}</strong>
            </span>
        @endif
        <small class="form-text text-muted">{{ __('The additional notes of the article.') }}</small>
    </div>
</div>
