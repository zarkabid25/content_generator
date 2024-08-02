@section('site_title', formatTitle([__('Article'), __('Template'), config('settings.title')]))

<style>
    .select2-container--default .select2-results>.select2-results__options {
        max-height: 160px;
        overflow-y: auto;
    }
    .select2-container--default .select2-selection--single {
        height: 38px;
    }

    .hidden {
            display: none;
        }

       .custom-select {
            width: 100%;
            padding: 7px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow-y: auto;
            max-height: 200px;
        }

        .custom-select option {
            padding: 10px;
        }

        .custom-select option.active {
            background-color: #f0f0f0;
        } 
</style>

@section('head_content')

@endsection

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('templates'), 'title' => __('Templates')],
    ['title' => __('Template')],
]])

<!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

<div class="d-flex">
    <h1 class="h2 mb-0 text-break">{{ __('Article') }}</h1>
</div>

<div class="row mx-n2">
    <div class="col-12 col-lg-5 px-2">
        <div class="card border-0 shadow-sm mt-3 @if(isset($documents)) d-none d-lg-flex @endif" id="ai-form">
            <div class="card-header align-items-center">
                <div class="row">
                    <div class="col">
                        <div class="font-weight-medium py-1" id="page_one_heading">{{ __('Basic Content Details') }}</div>
                        <div class="font-weight-medium py-1 hidden" id="page_two_heading" >{{ __('SEO and Keywords') }}</div>
                        <div class="font-weight-medium py-1 hidden" id="page_three_heading" >{{ __('Reference Content') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-body position-relative">
                @include('shared.message')

                <form action="{{ route('templates.article') }}" method="post" enctype="multipart/form-data" @cannot('templates', ['App\Models\User']) class="position-relative opacity-20" @endcannot>
                    @cannot('templates', ['App\Models\User'])
                        <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
                    @endcannot

                    @csrf

                    <input type="hidden" name="template_id" value="{{ $template->id }}">

                    @include('templates.template.partials.article-page-one')

                    @include('templates.template.partials.article-page-two')

                    @include('templates.template.partials.article-page-three')

                    {{--  @include('templates.partials.common-inputs')  --}}

                    <div class="row mx-n2">
                        <div class="col pl-2" style="flex-grow: inherit !important;" id="next_generate_button">
                            <button type="button" class="btn btn-primary position-relative" id="nextBtn">
                                <div class="position-absolute top-0 right-0 bottom-0 left-0 d-flex align-items-center justify-content-center">
                                    <span class="d-none spinner-border spinner-border-sm width-4 height-4" role="status"></span>
                                </div>
                                <span class="spinner-text">{{ __('Next') }}</span>&#8203;
                            </button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-secondary position-relative" id="backBtn" style="display: none;">
                                <div class="position-absolute top-0 right-0 bottom-0 left-0 d-flex align-items-center justify-content-center">
                                    <span class="d-none spinner-border spinner-border-sm width-4 height-4" role="status"></span>
                                </div>
                                <span class="spinner-text">{{ __('Back') }}</span>&#8203;
                            </button>
                        </div>

                    
                        {{--  <div class="col-auto px-2">
                            <a href="{{ route('templates.article') }}" class="btn btn-outline-secondary d-none {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
                            <button class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}" type="button" data-toggle="collapse" data-target="#collapse-form-advanced" aria-expanded="{{ $errors->has('language') || $errors->has('creativity') || $errors->has('variations') ? 'true' : 'false'}}" aria-controls="collapse-form-advanced">
                                {{ __('Advanced') }}
                            </button>
                        </div>  --}}
                    </div>
                </form>

                @cannot('templates', ['App\Models\User'])
                    <div class="position-absolute top-0 right-5 bottom-0 left-5">
                        @if(paymentProcessors())
                            @include('shared.features.locked')
                        @else
                            @include('shared.features.unavailable')
                        @endif
                    </div>
                @endcannot
            </div>
        </div>

        @if(isset($documents))
            <a href="#" class="btn btn-outline-secondary btn-block d-lg-none mt-3" id="ai-form-show-button">{{ __('Show form') }}</a>
        @endif
    </div>

    <div class="col-12 col-lg-7 px-2">
        @if(isset($documents))
            <div class="mt-3" id="ai-results">
                @foreach($documents as $document)
                    <div class="mt-3">
                        @include('templates.partials.document-result', ['document' => $document])
                    </div>
                @endforeach
            </div>
        @endif

        <div class="position-relative pt-3 h-100 @if(isset($documents)) d-none @else d-flex @endif" id="ai-placeholder-results">
            <div class="position-relative h-100 align-items-center justify-content-center d-flex w-100">
                <div class="text-muted font-weight-medium z-1" id="ai-placeholder-text-start">
                    <div class="width-6 height-6 mt-5"></div>
                    <div class="my-3">{{ __('Start by filling the form.') }}</div>
                    <div class="width-6 height-6 mb-5"></div>
                </div>
                <div class="text-muted flex-column font-weight-medium z-1 align-items-center d-none " id="ai-placeholder-text-progress">
                    <div class="width-6 height-6 mt-5"></div>
                    <div class="my-3">{{ __('Generating the content, please wait.') }}</div>
                    <div class="spinner-border spinner-border-sm width-6 height-6 mb-5" role="status"></div>
                </div>
                <div class="position-absolute top-0 right-0 bottom-0 left-0 border rounded border-width-2 border-dashed opacity-20 z-0"></div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    function displayField(pointer){
        if($(pointer).is(':checked')){
            $('#objective_other_input').append(
                `<input type="text" name="objective[]" />`
            );
        } else {
            $('#objective_other_input').empty();
        }
    }

    function updateCharCount(id, countId) {
        var charCount = $(id).val().length;
        $(countId).text('(' + charCount + ')');
    }

    // Initial calls to set the character count on page load
    updateCharCount('#i-article_title', '#char-count-article');
    updateCharCount('#i-seo_title', '#char-count-seo');
    updateCharCount('#i-meta_description', '#char-count-meta');

    // Update the character count on input
    $('#i-article_title').on('input', function() {
        updateCharCount('#i-article_title', '#char-count-article');
    });

    $('#i-seo_title').on('input', function() {
        updateCharCount('#i-seo_title', '#char-count-seo');
    });

    $('#i-meta_description').on('input', function() {
        updateCharCount('#i-meta_description', '#char-count-meta');
    });

    // Add language to Country Specific
    $(document).on('click', '#i-yes', function(){
        if($(this).is(':checked')){
            var languageName = $('#languageSelect').val();
            $(this).val(`The content should be relevant to the ${languageName} market`);
        }
    });

    $('#languageSelect').on('change', function(){
        var languageName = $(this).val();
        if($('#i-yes').is(':checked')){
            $('#i-yes').val(`The content should be relevant to the ${languageName} market`);
        }
    });

    //  Next Page and Back Page button     
        let currentPage = 1;
        function showPage(page) {
            $('#page_one_fields, #page_two_fields, #page_three_fields').addClass('hidden');
            $('#page_one_heading, #page_two_heading, #page_three_heading').addClass('hidden');

            $('#backBtn').toggle(page !== 1);

            if(page === 3){
                $('#next_generate_button').html(
                    `<button type="submit" name="submit" id="generateBtn" class="btn btn-primary position-relative" data-button-loader>
                        <div class="position-absolute top-0 right-0 bottom-0 left-0 d-flex align-items-center justify-content-center">
                            <span class="d-none spinner-border spinner-border-sm width-4 height-4" role="status"></span>
                        </div>
                        <span class="spinner-text">{{ __('Generate') }}</span>&#8203;
                    </button>`
                );
            } else {
                $('#next_generate_button').html(
                    `<button type="button" class="btn btn-primary position-relative" id="nextBtn">
                        <div class="position-absolute top-0 right-0 bottom-0 left-0 d-flex align-items-center justify-content-center">
                            <span class="d-none spinner-border spinner-border-sm width-4 height-4" role="status"></span>
                        </div>
                        <span class="spinner-text">{{ __('Next') }}</span>&#8203;
                    </button>`
                );
            }

            switch(page) {
                case 1:
                    $('#page_one_fields, #page_one_heading').removeClass('hidden');
                    break;
                case 2:
                    $('#page_two_fields, #page_two_heading').removeClass('hidden');
                    break;
                case 3:
                    $('#page_three_fields, #page_three_heading').removeClass('hidden');
                    break;
            }
        }

        $(document).on('click', '#nextBtn', function() {
            if (currentPage < 3) {
                currentPage++;
                showPage(currentPage);
            }
        });

        $('#backBtn').click(function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        showPage(currentPage);

        //select option languages
        $(document).ready(function(){
            var optionsToShow = 6;
            var languageSelect = $('#languageSelect');
            var options = languageSelect.find('option');

            options.slice(0, optionsToShow).show();

            languageSelect.on('change', function() {
                var selectedValue = $(this).val();
                options.hide();
                
                options.filter(function(index) {
                    return $(this).val() === selectedValue;
                }).show();
                
                options.slice(0, optionsToShow).show();
                
                languageSelect.scrollTop(0);
            });

            languageSelect.on('scroll', function() {
                var scrollPosition = $(this).scrollTop();
                
                if (scrollPosition + $(this).innerHeight() >= this.scrollHeight) {
                    var visibleOptions = options.filter(':visible').length;
                    options.slice(visibleOptions, visibleOptions + optionsToShow).show();
                }
            });
        })
    
</script>



