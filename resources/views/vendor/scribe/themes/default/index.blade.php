@php
    use Knuckles\Scribe\Tools\WritingUtils as u;
@endphp
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! $metadata['title'] !!} - Documentação da API</title>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="{!! $assetPathPrefix !!}css/theme-default.style.css" media="screen">
    <link rel="stylesheet" href="{!! $assetPathPrefix !!}css/theme-default.print.css" media="print">


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/github-dark-dimmed.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    @if(isset($metadata['example_languages']))
        <style id="language-style">
            /* starts out as display none and is replaced with js later  */
            @foreach($metadata['example_languages'] as $lang)
            body .content .{{ $lang }}-example code { display: none; }
            @endforeach
        </style>
    @endif

    @if($tryItOut['enabled'] ?? true)
        <script>
            var tryItOutBaseUrl = "{!! $tryItOut['base_url'] ?? $baseUrl !!}";
            var useCsrf = Boolean({!! $tryItOut['use_csrf'] ?? null !!});
            var csrfUrl = "{!! $tryItOut['csrf_url'] ?? null !!}";
        </script>
        <script src="{{ u::getVersionedAsset($assetPathPrefix.'js/tryitout.js') }}"></script>
    @endif

    <script src="{{ u::getVersionedAsset($assetPathPrefix.'js/theme-default.js') }}"></script>
</head>

<body data-languages="{{ json_encode($metadata['example_languages'] ?? []) }}">

@include("scribe::themes.default.sidebar")

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <header class="api-header">
            <h1 class="api-title">{!! $metadata['title'] !!}</h1>
            @if(isset($metadata['description']))
                <p class="api-description">{!! $metadata['description'] !!}</p>
            @endif
        </header>

        {!! $intro !!}

        <div class="auth-section">
            {!! $auth !!}
        </div>

        <div class="api-groups">
            @include("scribe::themes.default.groups")
        </div>

        {!! $append !!}
    </div>

    <div class="dark-box">
        @if(isset($metadata['example_languages']))
            <div class="lang-selector">
                @foreach($metadata['example_languages'] as $name => $lang)
                    @php if (is_numeric($name)) $name = $lang; @endphp
                    <button type="button" class="lang-button" data-language-name="{{$lang}}">{{$name}}</button>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Footer opcional -->
<footer class="api-footer">
    <div class="container">
        <p>© {{ date('Y') }} {!! $metadata['title'] !!}. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
