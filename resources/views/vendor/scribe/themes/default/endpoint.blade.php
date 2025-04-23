@php
    use Knuckles\Scribe\Tools\Utils as u;
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
@endphp

<article class="endpoint-card" id="{!! $endpoint->fullSlug() !!}">
    <header class="endpoint-header">
        <h2 class="endpoint-title">{{ $endpoint->name() }}</h2>
        <div class="endpoint-meta">
            @component('scribe::components.badges.auth', ['authenticated' => $endpoint->isAuthed()])
            @endcomponent
        </div>
    </header>

    @if($endpoint->metadata->description)
        <div class="endpoint-description">
            {!! Parsedown::instance()->text($endpoint->metadata->description) !!}
        </div>
    @endif

    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-{!! $endpoint->endpointId() !!}">
            <h3 class="section-title">{{ u::trans("scribe::endpoint.example_request") }}</h3>

            <div class="code-tabs">
                @foreach($metadata['example_languages'] as $language)
                    <div class="{{ $language }}-example code-tab">
                        @include("scribe::partials.example-requests.$language")
                    </div>
                @endforeach
            </div>
        </div>

        @if($endpoint->isGet() || $endpoint->hasResponses())
            <div class="example-responses" id="example-responses-{!! $endpoint->endpointId() !!}">
                <h3 class="section-title">{{ u::trans("scribe::endpoint.example_response") }}</h3>

                @foreach($endpoint->responses as $response)
                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">{{ $response->status }}</span>
                            <span class="response-description">{{ $response->fullDescription() }}</span>
                        </div>

                        @if(count($response->headers))
                            <details class="response-headers">
                                <summary>
                                    <span class="summary-text">{{ u::trans("scribe::endpoint.headers") }}</span>
                                </summary>
                                <pre><code class="language-http">@foreach($response->headers as $header => $value)
                                            {{ $header }}: {{ is_array($value) ? implode('; ', $value) : $value }}
                                        @endforeach</code></pre>
                            </details>
                        @endif

                        <pre class="response-body">
@if(is_string($response->content) && Str::startsWith($response->content, "<<binary>>"))
                                <code>{!! u::trans("scribe::endpoint.responses.binary") !!} - {{ htmlentities(str_replace("<<binary>>", "", $response->content)) }}</code>
                            @elseif($response->status == 204)
                                <code>{!! u::trans("scribe::endpoint.responses.empty") !!}</code>
                            @else
                                @php($parsed = json_decode($response->content))
                                    <code class="language-json">{!! htmlentities($parsed != null ? json_encode($parsed, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $response->content) !!}</code>
                                    @endif
                </pre>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <section class="try-it-out" id="try-it-out-{!! $endpoint->endpointId() !!}">
        <div class="try-it-out-header">
            <h3>{{ u::trans("scribe::endpoint.request") }}</h3>

            @if($metadata['try_it_out']['enabled'] ?? false)
                <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-{{ $endpoint->endpointId() }}"
                            onclick="tryItOut('{{ $endpoint->endpointId() }}');">
                        {{ u::trans("scribe::try_it_out.open") }}
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-{{ $endpoint->endpointId() }}"
                            onclick="cancelTryOut('{{ $endpoint->endpointId() }}');" hidden>
                        {{ u::trans("scribe::try_it_out.cancel") }}
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-{{ $endpoint->endpointId() }}"
                            data-initial-text="{{ u::trans("scribe::try_it_out.send") }}"
                            data-loading-text="{{ u::trans("scribe::try_it_out.loading") }}" hidden>
                        {{ u::trans("scribe::try_it_out.send") }}
                    </button>
                </div>
            @endif
        </div>

        <form id="form-{{ $endpoint->endpointId() }}"
              data-method="{{ $endpoint->httpMethods[0] }}"
              data-path="{{ $endpoint->uri }}"
              data-authed="{{ $endpoint->isAuthed() ? 1 : 0 }}"
              data-hasfiles="{{ $endpoint->hasFiles() ? 1 : 0 }}"
              data-isarraybody="{{ $endpoint->isArrayBody() ? 1 : 0 }}"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('{{ $endpoint->endpointId() }}', this);">

            <div class="http-methods">
                @foreach($endpoint->httpMethods as $method)
                    <div class="method">
                        @component('scribe::components.badges.http-method', ['method' => $method])@endcomponent
                        <code class="uri">{{$endpoint->uri}}</code>
                    </div>
                @endforeach
            </div>

            @if(count($endpoint->headers))
                <div class="parameters-section">
                    <h4 class="section-subtitle">{{ u::trans("scribe::endpoint.headers") }}</h4>
                    @foreach($endpoint->headers as $name => $example)
                            <?php
                            $htmlOptions = [];
                            if ($endpoint->isAuthed() && $metadata['auth']['location'] == 'header' && $metadata['auth']['name'] == $name) {
                                $htmlOptions = [ 'class' => 'auth-value', ];
                            }
                            ?>
                        <div class="parameter">
                            @component('scribe::components.field-details', [
                              'name' => $name,
                              'type' => null,
                              'required' => true,
                              'description' => null,
                              'example' => $example,
                              'endpointId' => $endpoint->endpointId(),
                              'component' => 'header',
                              'isInput' => true,
                              'html' => $htmlOptions,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($endpoint->urlParameters))
                <div class="parameters-section">
                    <h4 class="section-subtitle">{{ u::trans("scribe::endpoint.url_parameters") }}</h4>
                    @foreach($endpoint->urlParameters as $attribute => $parameter)
                        <div class="parameter">
                            @component('scribe::components.field-details', [
                              'name' => $parameter->name,
                              'type' => $parameter->type ?? 'string',
                              'required' => $parameter->required,
                              'description' => $parameter->description,
                              'example' => $parameter->example ?? '',
                              'enumValues' => $parameter->enumValues,
                              'endpointId' => $endpoint->endpointId(),
                              'component' => 'url',
                              'isInput' => true,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($endpoint->queryParameters))
                <div class="parameters-section">
                    <h4 class="section-subtitle">{{ u::trans("scribe::endpoint.query_parameters") }}</h4>
                    @foreach($endpoint->queryParameters as $attribute => $parameter)
                            <?php
                            $htmlOptions = [];
                            if ($endpoint->isAuthed() && $metadata['auth']['location'] == 'query' && $metadata['auth']['name'] == $attribute) {
                                $htmlOptions = [ 'class' => 'auth-value', ];
                            }
                            ?>
                        <div class="parameter">
                            @component('scribe::components.field-details', [
                              'name' => $parameter->name,
                              'type' => $parameter->type,
                              'required' => $parameter->required,
                              'description' => $parameter->description,
                              'example' => $parameter->example ?? '',
                              'enumValues' => $parameter->enumValues,
                              'endpointId' => $endpoint->endpointId(),
                              'component' => 'query',
                              'isInput' => true,
                              'html' => $htmlOptions,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($endpoint->nestedBodyParameters))
                <div class="parameters-section">
                    <h4 class="section-subtitle">{{ u::trans("scribe::endpoint.body_parameters") }}</h4>
                    <x-scribe::nested-fields
                        :fields="$endpoint->nestedBodyParameters" :endpointId="$endpoint->endpointId()"
                    />
                </div>
            @endif
        </form>

        <div class="execution-results" id="execution-results-{{ $endpoint->endpointId() }}" hidden>
            <h4 class="section-subtitle">{{ u::trans("scribe::try_it_out.received_response") }}</h4>
            <div class="response-status" id="execution-response-status-{{ $endpoint->endpointId() }}"></div>
            <pre class="response-body"><code id="execution-response-content-{{ $endpoint->endpointId() }}"
                                             data-empty-response-text="<{{ u::trans("scribe::endpoint.responses.empty") }}>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-{{ $endpoint->endpointId() }}" hidden>
            <h4 class="section-subtitle error">{{ u::trans("scribe::try_it_out.request_failed") }}</h4>
            <pre><code id="execution-error-message-{{ $endpoint->endpointId() }}">{{ "\n\n".u::trans("scribe::try_it_out.error_help") }}</code></pre>
        </div>
    </section>

    @if(count($endpoint->responseFields))
        <section class="response-fields">
            <h3 class="section-title">{{ u::trans("scribe::endpoint.response") }}</h3>
            <h4 class="section-subtitle">{{ u::trans("scribe::endpoint.response_fields") }}</h4>
            <x-scribe::nested-fields
                :fields="$endpoint->nestedResponseFields" :endpointId="$endpoint->endpointId()"
                :isInput="false"
            />
        </section>
    @endif
</article>
