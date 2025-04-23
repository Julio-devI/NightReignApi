<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NtrPI API Documentation - Documentação da API</title>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/github-dark-dimmed.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

            <style id="language-style">
            /* starts out as display none and is replaced with js later  */
                        body .content .bash-example code { display: none; }
                        body .content .javascript-example code { display: none; }
                    </style>
    
            <script>
            var tryItOutBaseUrl = "http://localhost";
            var useCsrf = Boolean();
            var csrfUrl = "/sanctum/csrf-cookie";
        </script>
        <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.0.js") }}"></script>
    
    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.0.js") }}"></script>
</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-api-items-search--name-">
                                <a href="#endpoints-GETapi-api-items-search--name-">Search for a name</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-api-items--id-">
                                <a href="#endpoints-GETapi-api-items--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-register">
                                <a href="#endpoints-POSTapi-register">POST api/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-logout">
                                <a href="#endpoints-POSTapi-logout">POST api/logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-items" class="tocify-header">
                <li class="tocify-item level-1" data-unique="items">
                    <a href="#items">Items</a>
                </li>
                                    <ul id="tocify-subheader-items" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="items-GETapi-api-items">
                                <a href="#items-GETapi-api-items">Listar todos os items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="items-POSTapi-item-add">
                                <a href="#items-POSTapi-item-add">Create new item</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="items-PUTapi-items-update--id-">
                                <a href="#items-PUTapi-items-update--id-">Update item</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="items-DELETEapi-item-delete--id-">
                                <a href="#items-DELETEapi-item-delete--id-">Delete an existing item</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-weapon-categories" class="tocify-header">
                <li class="tocify-item level-1" data-unique="weapon-categories">
                    <a href="#weapon-categories">Weapon Categories</a>
                </li>
                                    <ul id="tocify-subheader-weapon-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="weapon-categories-GETapi-api-weapon-categories">
                                <a href="#weapon-categories-GETapi-api-weapon-categories">Listar todas as categorias de armas.

Retorna todas as categorias de armas disponíveis.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="weapon-categories-POSTapi-weapon-category-add">
                                <a href="#weapon-categories-POSTapi-weapon-category-add">Criar nova categoria de arma.

Cria uma nova categoria de arma caso o usuário esteja autenticado.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="weapon-categories-PUTapi-weapon-category-update--id-">
                                <a href="#weapon-categories-PUTapi-weapon-category-update--id-">Atualizar uma categoria de arma existente.

Atualiza os dados de uma categoria de arma pelo seu ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="weapon-categories-DELETEapi-weapon-category-delete--id-">
                                <a href="#weapon-categories-DELETEapi-weapon-category-delete--id-">Delete an existing weapon category</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 18, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <header class="api-header">
            <h1 class="api-title">NtrPI API Documentation</h1>
                    </header>

        <h1 id="introduction">Introduction</h1>
<p>API de gerenciamento de items do Elden Ring NightReign</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <div class="auth-section">
            <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>
        </div>

        <div class="api-groups">
            <section class="api-group" id="endpoints">
        <div class="group-header">
            <h1 class="group-title">
                <i class="icon-group fas fa-folder-open"></i>
                Endpoints
            </h1>

                    </div>

                    
            <div class="endpoints-list">
                                    <article class="endpoint-card" id="endpoints-GETapi-api-items-search--name-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Search for a name</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-GETapi-api-items-search--name-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/api/items/search/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/api/items/search/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-GETapi-api-items-search--name-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200</span>
                        </div>

                                                    <details class="response-headers">
                                <summary>
                                    <span class="summary-text">Headers</span>
                                </summary>
                                <pre><code class="language-http">                                            cache-control: no-cache, private
                                                                                    content-type: application/json
                                                                                    x-ratelimit-limit: 60
                                                                                    x-ratelimit-remaining: 57
                                        </code></pre>
                            </details>
                        
                        <pre class="response-body">
                                                                    <code class="language-json">[]</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-GETapi-api-items-search--name-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-GETapi-api-items-search--name-"
                            onclick="tryItOut('GETapi-api-items-search--name-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-GETapi-api-items-search--name-"
                            onclick="cancelTryOut('GETapi-api-items-search--name-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-GETapi-api-items-search--name-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-GETapi-api-items-search--name-"
              data-method="GET"
              data-path="api/api/items/search/{name}"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('GETapi-api-items-search--name-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-green">GET</small>
                        <code class="uri">api/api/items/search/{name}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-api-items-search--name-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-api-items-search--name-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-api-items-search--name-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
                        </div>
                                    </div>
            
            
                    </form>

        <div class="execution-results" id="execution-results-GETapi-api-items-search--name-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-GETapi-api-items-search--name-"></div>
            <pre class="response-body"><code id="execution-response-content-GETapi-api-items-search--name-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-GETapi-api-items-search--name-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-GETapi-api-items-search--name-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="endpoints-GETapi-api-items--id-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Display the specified resource.</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-GETapi-api-items--id-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/api/items/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/api/items/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-GETapi-api-items--id-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200</span>
                        </div>

                                                    <details class="response-headers">
                                <summary>
                                    <span class="summary-text">Headers</span>
                                </summary>
                                <pre><code class="language-http">                                            content-type: text/html; charset=UTF-8
                                                                                    cache-control: no-cache, private
                                                                                    x-ratelimit-limit: 60
                                                                                    x-ratelimit-remaining: 56
                                        </code></pre>
                            </details>
                        
                        <pre class="response-body">
                                                                    <code class="language-json"></code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-GETapi-api-items--id-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-GETapi-api-items--id-"
                            onclick="tryItOut('GETapi-api-items--id-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-GETapi-api-items--id-"
                            onclick="cancelTryOut('GETapi-api-items--id-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-GETapi-api-items--id-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-GETapi-api-items--id-"
              data-method="GET"
              data-path="api/api/items/{id}"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('GETapi-api-items--id-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-green">GET</small>
                        <code class="uri">api/api/items/{id}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-api-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-api-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-api-items--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of the item. Example: <code>17</code></p>
                        </div>
                                    </div>
            
            
                    </form>

        <div class="execution-results" id="execution-results-GETapi-api-items--id-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-GETapi-api-items--id-"></div>
            <pre class="response-body"><code id="execution-response-content-GETapi-api-items--id-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-GETapi-api-items--id-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-GETapi-api-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="endpoints-POSTapi-register">
    <header class="endpoint-header">
        <h2 class="endpoint-title">POST api/register</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-POSTapi-register">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"qkunze@example.com\",
    \"password\": \"O[2UZ5ij-e\\/dl4m{o,\"
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "qkunze@example.com",
    "password": "O[2UZ5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

            </section>

    <section class="try-it-out" id="try-it-out-POSTapi-register">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-POSTapi-register"
                            onclick="tryItOut('POSTapi-register');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-POSTapi-register"
                            onclick="cancelTryOut('POSTapi-register');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-POSTapi-register"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-POSTapi-register"
              data-method="POST"
              data-path="api/register"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-black">POST</small>
                        <code class="uri">api/register</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="O[2UZ5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Example: <code>O[2UZ5ij-e/dl4m{o,</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-POSTapi-register" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-POSTapi-register"></div>
            <pre class="response-body"><code id="execution-response-content-POSTapi-register"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-POSTapi-register" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="endpoints-POSTapi-login">
    <header class="endpoint-header">
        <h2 class="endpoint-title">POST api/login</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-POSTapi-login">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"O[2UZ5ij-e\\/dl4m{o,\"
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "O[2UZ5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

            </section>

    <section class="try-it-out" id="try-it-out-POSTapi-login">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-POSTapi-login"
                            onclick="tryItOut('POSTapi-login');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-POSTapi-login"
                            onclick="cancelTryOut('POSTapi-login');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-POSTapi-login"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-POSTapi-login"
              data-method="POST"
              data-path="api/login"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-black">POST</small>
                        <code class="uri">api/login</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="O[2UZ5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Example: <code>O[2UZ5ij-e/dl4m{o,</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-POSTapi-login" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-POSTapi-login"></div>
            <pre class="response-body"><code id="execution-response-content-POSTapi-login"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-POSTapi-login" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="endpoints-POSTapi-logout">
    <header class="endpoint-header">
        <h2 class="endpoint-title">POST api/logout</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-POSTapi-logout">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

            </section>

    <section class="try-it-out" id="try-it-out-POSTapi-logout">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-POSTapi-logout"
                            onclick="tryItOut('POSTapi-logout');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-POSTapi-logout"
                            onclick="cancelTryOut('POSTapi-logout');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-POSTapi-logout"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-POSTapi-logout"
              data-method="POST"
              data-path="api/logout"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-black">POST</small>
                        <code class="uri">api/logout</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                    </form>

        <div class="execution-results" id="execution-results-POSTapi-logout" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-POSTapi-logout"></div>
            <pre class="response-body"><code id="execution-response-content-POSTapi-logout"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-POSTapi-logout" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                            </div>
            </section>
    <section class="api-group" id="items">
        <div class="group-header">
            <h1 class="group-title">
                <i class="icon-group fas fa-folder-open"></i>
                Items
            </h1>

                    </div>

                    
            <div class="endpoints-list">
                                    <article class="endpoint-card" id="items-GETapi-api-items">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Listar todos os items</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-GETapi-api-items">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/api/items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/api/items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-GETapi-api-items">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200, Sucesso</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Item 1&quot;,
        &quot;description&quot;: &quot;Descri&ccedil;&atilde;o do item 1&quot;,
        &quot;created_at&quot;: &quot;2023-10-01T12:34:56&quot;,
        &quot;updated_at&quot;: &quot;2023-10-01T12:34:56&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Item 2&quot;,
        &quot;description&quot;: &quot;Descri&ccedil;&atilde;o do item 2&quot;,
        &quot;created_at&quot;: &quot;2023-10-01T12:34:56&quot;,
        &quot;updated_at&quot;: &quot;2023-10-01T12:34:56&quot;
    }
]</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-GETapi-api-items">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-GETapi-api-items"
                            onclick="tryItOut('GETapi-api-items');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-GETapi-api-items"
                            onclick="cancelTryOut('GETapi-api-items');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-GETapi-api-items"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-GETapi-api-items"
              data-method="GET"
              data-path="api/api/items"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('GETapi-api-items', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-green">GET</small>
                        <code class="uri">api/api/items</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-api-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-api-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                    </form>

        <div class="execution-results" id="execution-results-GETapi-api-items" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-GETapi-api-items"></div>
            <pre class="response-body"><code id="execution-response-content-GETapi-api-items"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-GETapi-api-items" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-GETapi-api-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="items-POSTapi-item-add">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Create new item</h2>
        <div class="endpoint-meta">
            <small class="badge badge-darkred">requires authentication</small>
        </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-POSTapi-item-add">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/item/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Sword of Truth\",
    \"description\": \"A powerful magical sword\",
    \"notes\": \"Found in ancient ruins\",
    \"scaling\": \"A\",
    \"physical_damage\": 75,
    \"magic_damage\": 50,
    \"fire_damage\": 25,
    \"lightning_damage\": 25,
    \"holy_damage\": 25,
    \"critical_chance\": 15,
    \"level_required\": 30,
    \"physical_defense\": 50,
    \"magic_defense\": 40,
    \"fire_defense\": 30,
    \"lightning_defense\": 30,
    \"holy_defense\": 30,
    \"boost\": 20
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/item/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Sword of Truth",
    "description": "A powerful magical sword",
    "notes": "Found in ancient ruins",
    "scaling": "A",
    "physical_damage": 75,
    "magic_damage": 50,
    "fire_damage": 25,
    "lightning_damage": 25,
    "holy_damage": 25,
    "critical_chance": 15,
    "level_required": 30,
    "physical_defense": 50,
    "magic_defense": 40,
    "fire_defense": 30,
    "lightning_defense": 30,
    "holy_defense": 30,
    "boost": 20
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-POSTapi-item-add">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">201</span>
                            <span class="response-description">201, Success</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Item has been created successfully&quot;,
    &quot;data&quot;: {
        &quot;name&quot;: &quot;Sword of Truth&quot;,
        &quot;description&quot;: &quot;A powerful magical sword&quot;,
        &quot;notes&quot;: &quot;Found in ancient ruins&quot;,
        &quot;scaling&quot;: &quot;A&quot;,
        &quot;physical_damage&quot;: 75,
        &quot;magic_damage&quot;: 50,
        &quot;fire_damage&quot;: 25,
        &quot;lightning_damage&quot;: 25,
        &quot;holy_damage&quot;: 25,
        &quot;critical_chance&quot;: 15,
        &quot;level_required&quot;: 30,
        &quot;physical_defense&quot;: 50,
        &quot;magic_defense&quot;: 40,
        &quot;fire_defense&quot;: 30,
        &quot;lightning_defense&quot;: 30,
        &quot;holy_defense&quot;: 30,
        &quot;boost&quot;: 20,
        &quot;updated_at&quot;: &quot;2024-01-20T15:33:12.000000Z&quot;,
        &quot;created_at&quot;: &quot;2024-01-20T15:33:12.000000Z&quot;,
        &quot;id&quot;: 1
    }
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">409</span>
                            <span class="response-description">409, Conflict</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Item already exists&quot;,
    &quot;error&quot;: &quot;duplicate entry for key `name`&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">422</span>
                            <span class="response-description">422, Validation Error</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;The name field is required&quot;
        ],
        &quot;description&quot;: [
            &quot;The description field is required&quot;
        ]
    },
    &quot;message&quot;: &quot;Validation error&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">500</span>
                            <span class="response-description">500, Internal server error</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;verify if the shipment is correct&quot;,
    &quot;error&quot;: &quot;Internal server error&quot;
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-POSTapi-item-add">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-POSTapi-item-add"
                            onclick="tryItOut('POSTapi-item-add');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-POSTapi-item-add"
                            onclick="cancelTryOut('POSTapi-item-add');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-POSTapi-item-add"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-POSTapi-item-add"
              data-method="POST"
              data-path="api/item/add"
              data-authed="1"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('POSTapi-item-add', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-black">POST</small>
                        <code class="uri">api/item/add</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-item-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-item-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-item-add"
               value="Sword of Truth"
               data-component="body">
    <br>
<p>The name of the item. Example: <code>Sword of Truth</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-item-add"
               value="A powerful magical sword"
               data-component="body">
    <br>
<p>The item description. Example: <code>A powerful magical sword</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-item-add"
               value="Found in ancient ruins"
               data-component="body">
    <br>
<p>Additional notes. Example: <code>Found in ancient ruins</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>scaling</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="scaling"                data-endpoint="POSTapi-item-add"
               value="A"
               data-component="body">
    <br>
<p>The scaling grade (S,A,B,C,D,E). Example: <code>A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>physical_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="physical_damage"                data-endpoint="POSTapi-item-add"
               value="75"
               data-component="body">
    <br>
<p>Physical damage (0-100). Example: <code>75</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>magic_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="magic_damage"                data-endpoint="POSTapi-item-add"
               value="50"
               data-component="body">
    <br>
<p>Magic damage (0-100). Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fire_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fire_damage"                data-endpoint="POSTapi-item-add"
               value="25"
               data-component="body">
    <br>
<p>Fire damage (0-100). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lightning_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lightning_damage"                data-endpoint="POSTapi-item-add"
               value="25"
               data-component="body">
    <br>
<p>Lightning damage (0-100). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>holy_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="holy_damage"                data-endpoint="POSTapi-item-add"
               value="25"
               data-component="body">
    <br>
<p>Holy damage (0-100). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>critical_chance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="critical_chance"                data-endpoint="POSTapi-item-add"
               value="15"
               data-component="body">
    <br>
<p>Critical hit chance (0-100). Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>level_required</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="level_required"                data-endpoint="POSTapi-item-add"
               value="30"
               data-component="body">
    <br>
<p>Minimum level required (1+). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>physical_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="physical_defense"                data-endpoint="POSTapi-item-add"
               value="50"
               data-component="body">
    <br>
<p>Physical defense (0-100). Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>magic_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="magic_defense"                data-endpoint="POSTapi-item-add"
               value="40"
               data-component="body">
    <br>
<p>Magic defense (0-100). Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fire_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fire_defense"                data-endpoint="POSTapi-item-add"
               value="30"
               data-component="body">
    <br>
<p>Fire defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lightning_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lightning_defense"                data-endpoint="POSTapi-item-add"
               value="30"
               data-component="body">
    <br>
<p>Lightning defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>holy_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="holy_defense"                data-endpoint="POSTapi-item-add"
               value="30"
               data-component="body">
    <br>
<p>Holy defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>boost</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="boost"                data-endpoint="POSTapi-item-add"
               value="20"
               data-component="body">
    <br>
<p>Stat boost value (0-100). Example: <code>20</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-POSTapi-item-add" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-POSTapi-item-add"></div>
            <pre class="response-body"><code id="execution-response-content-POSTapi-item-add"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-POSTapi-item-add" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-POSTapi-item-add">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="items-PUTapi-items-update--id-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Update item</h2>
        <div class="endpoint-meta">
            <small class="badge badge-darkred">requires authentication</small>
        </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-PUTapi-items-update--id-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/items/update/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Sword of Truth\",
    \"description\": \"A powerful magical sword\",
    \"notes\": \"Found in ancient ruins\",
    \"scaling\": \"A\",
    \"physical_damage\": 75,
    \"magic_damage\": 50,
    \"fire_damage\": 25,
    \"lightning_damage\": 25,
    \"holy_damage\": 25,
    \"critical_chance\": 15,
    \"level_required\": 30,
    \"physical_defense\": 50,
    \"magic_defense\": 40,
    \"fire_defense\": 30,
    \"lightning_defense\": 30,
    \"holy_defense\": 30,
    \"boost\": 20
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/items/update/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Sword of Truth",
    "description": "A powerful magical sword",
    "notes": "Found in ancient ruins",
    "scaling": "A",
    "physical_damage": 75,
    "magic_damage": 50,
    "fire_damage": 25,
    "lightning_damage": 25,
    "holy_damage": 25,
    "critical_chance": 15,
    "level_required": 30,
    "physical_defense": 50,
    "magic_defense": 40,
    "fire_defense": 30,
    "lightning_defense": 30,
    "holy_defense": 30,
    "boost": 20
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-PUTapi-items-update--id-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200, Success</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;item has been updated successfully&quot;,
    &quot;data&quot;: {
        &quot;name&quot;: &quot;Sword of Truth&quot;,
        &quot;description&quot;: &quot;A powerful magical sword&quot;,
        &quot;notes&quot;: &quot;Found in ancient ruins&quot;,
        &quot;scaling&quot;: &quot;A&quot;,
        &quot;physical_damage&quot;: 75,
        &quot;magic_damage&quot;: 50,
        &quot;fire_damage&quot;: 25,
        &quot;lightning_damage&quot;: 25,
        &quot;holy_damage&quot;: 25,
        &quot;critical_chance&quot;: 15,
        &quot;level_required&quot;: 30,
        &quot;physical_defense&quot;: 50,
        &quot;magic_defense&quot;: 40,
        &quot;fire_defense&quot;: 30,
        &quot;lightning_defense&quot;: 30,
        &quot;holy_defense&quot;: 30,
        &quot;boost&quot;: 20,
        &quot;updated_at&quot;: &quot;2024-01-20T15:33:12.000000Z&quot;,
        &quot;created_at&quot;: &quot;2024-01-20T15:33:12.000000Z&quot;,
        &quot;id&quot;: 1
    }
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">404</span>
                            <span class="response-description">404, Not Found</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Item not found&quot;,
    &quot;error&quot;: &quot;No query results for model [App\\Models\\Item] 1&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">422</span>
                            <span class="response-description">422, Validation Error</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;The name field is required&quot;
        ],
        &quot;description&quot;: [
            &quot;The description field is required&quot;
        ]
    },
    &quot;message&quot;: &quot;Validation error&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">500</span>
                            <span class="response-description">500, Error on update item</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;Error on update item&quot;
        ],
        &quot;description&quot;: [
            &quot;check if the shipment is correct&quot;
        ]
    },
    &quot;message&quot;: &quot;There was an error updating the item&quot;
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-PUTapi-items-update--id-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-PUTapi-items-update--id-"
                            onclick="tryItOut('PUTapi-items-update--id-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-PUTapi-items-update--id-"
                            onclick="cancelTryOut('PUTapi-items-update--id-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-PUTapi-items-update--id-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-PUTapi-items-update--id-"
              data-method="PUT"
              data-path="api/items/update/{id}"
              data-authed="1"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('PUTapi-items-update--id-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-darkblue">PUT</small>
                        <code class="uri">api/items/update/{id}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-items-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-items-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-items-update--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the item. Example: <code>1</code></p>
                        </div>
                                    </div>
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-items-update--id-"
               value="Sword of Truth"
               data-component="body">
    <br>
<p>The name of the item. Example: <code>Sword of Truth</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-items-update--id-"
               value="A powerful magical sword"
               data-component="body">
    <br>
<p>The description of the item. Example: <code>A powerful magical sword</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="PUTapi-items-update--id-"
               value="Found in ancient ruins"
               data-component="body">
    <br>
<p>Additional notes about the item. Example: <code>Found in ancient ruins</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>scaling</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="scaling"                data-endpoint="PUTapi-items-update--id-"
               value="A"
               data-component="body">
    <br>
<p>The scaling grade (S,A,B,C,D,E). Example: <code>A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>physical_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="physical_damage"                data-endpoint="PUTapi-items-update--id-"
               value="75"
               data-component="body">
    <br>
<p>Physical damage value (min: 0). Example: <code>75</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>magic_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="magic_damage"                data-endpoint="PUTapi-items-update--id-"
               value="50"
               data-component="body">
    <br>
<p>Magic damage value (min: 0). Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fire_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fire_damage"                data-endpoint="PUTapi-items-update--id-"
               value="25"
               data-component="body">
    <br>
<p>Fire damage value (min: 0). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lightning_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lightning_damage"                data-endpoint="PUTapi-items-update--id-"
               value="25"
               data-component="body">
    <br>
<p>Lightning damage value (min: 0). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>holy_damage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="holy_damage"                data-endpoint="PUTapi-items-update--id-"
               value="25"
               data-component="body">
    <br>
<p>Holy damage value (min: 0). Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>critical_chance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="critical_chance"                data-endpoint="PUTapi-items-update--id-"
               value="15"
               data-component="body">
    <br>
<p>Critical hit chance (min: 0). Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>level_required</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="level_required"                data-endpoint="PUTapi-items-update--id-"
               value="30"
               data-component="body">
    <br>
<p>Required level (min: 1). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>physical_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="physical_defense"                data-endpoint="PUTapi-items-update--id-"
               value="50"
               data-component="body">
    <br>
<p>Physical defense (0-100). Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>magic_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="magic_defense"                data-endpoint="PUTapi-items-update--id-"
               value="40"
               data-component="body">
    <br>
<p>Magic defense (0-100). Example: <code>40</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fire_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fire_defense"                data-endpoint="PUTapi-items-update--id-"
               value="30"
               data-component="body">
    <br>
<p>Fire defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lightning_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lightning_defense"                data-endpoint="PUTapi-items-update--id-"
               value="30"
               data-component="body">
    <br>
<p>Lightning defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>holy_defense</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="holy_defense"                data-endpoint="PUTapi-items-update--id-"
               value="30"
               data-component="body">
    <br>
<p>Holy defense (0-100). Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>boost</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="boost"                data-endpoint="PUTapi-items-update--id-"
               value="20"
               data-component="body">
    <br>
<p>Stat boost (0-100). Example: <code>20</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-PUTapi-items-update--id-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-PUTapi-items-update--id-"></div>
            <pre class="response-body"><code id="execution-response-content-PUTapi-items-update--id-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-PUTapi-items-update--id-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-PUTapi-items-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="items-DELETEapi-item-delete--id-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Delete an existing item</h2>
        <div class="endpoint-meta">
            <small class="badge badge-darkred">requires authentication</small>
        </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-DELETEapi-item-delete--id-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/item/delete/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/item/delete/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-DELETEapi-item-delete--id-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200, Success</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Item has been deleted successfully&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">404</span>
                            <span class="response-description">404, Not Found</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Item not found&quot;,
    &quot;error&quot;: &quot;No query results for model [App\\Models\\Item] 1&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">500</span>
                            <span class="response-description">500, Internal Server Error</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Error on delete item&quot;,
    &quot;error&quot;: &quot;Internal server error&quot;
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-DELETEapi-item-delete--id-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-DELETEapi-item-delete--id-"
                            onclick="tryItOut('DELETEapi-item-delete--id-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-DELETEapi-item-delete--id-"
                            onclick="cancelTryOut('DELETEapi-item-delete--id-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-DELETEapi-item-delete--id-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-DELETEapi-item-delete--id-"
              data-method="DELETE"
              data-path="api/item/delete/{id}"
              data-authed="1"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('DELETEapi-item-delete--id-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-red">DELETE</small>
                        <code class="uri">api/item/delete/{id}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-item-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-item-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-item-delete--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the item. Example: <code>1</code></p>
                        </div>
                                    </div>
            
            
                    </form>

        <div class="execution-results" id="execution-results-DELETEapi-item-delete--id-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-DELETEapi-item-delete--id-"></div>
            <pre class="response-body"><code id="execution-response-content-DELETEapi-item-delete--id-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-DELETEapi-item-delete--id-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-DELETEapi-item-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                            </div>
            </section>
    <section class="api-group" id="weapon-categories">
        <div class="group-header">
            <h1 class="group-title">
                <i class="icon-group fas fa-folder-open"></i>
                Weapon Categories
            </h1>

                            <div class="group-description">
                    <p>Cria uma nova categoria de armas</p>
                </div>
                    </div>

                    
            <div class="endpoints-list">
                                    <article class="endpoint-card" id="weapon-categories-GETapi-api-weapon-categories">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Listar todas as categorias de armas.

Retorna todas as categorias de armas disponíveis.</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-GETapi-api-weapon-categories">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/api/weapon-categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/api/weapon-categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-GETapi-api-weapon-categories">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Rifles&quot;,
            &quot;description&quot;: &quot;Armas de longo alcance&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Pistolas&quot;,
            &quot;description&quot;: &quot;Armas curtas de f&aacute;cil manuseio&quot;
        }
    ]
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">500</span>
                            <span class="response-description">500</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;error&quot;: &quot;Exception&quot;,
    &quot;message&quot;: &quot;Error on get weapon categories&quot;
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-GETapi-api-weapon-categories">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-GETapi-api-weapon-categories"
                            onclick="tryItOut('GETapi-api-weapon-categories');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-GETapi-api-weapon-categories"
                            onclick="cancelTryOut('GETapi-api-weapon-categories');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-GETapi-api-weapon-categories"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-GETapi-api-weapon-categories"
              data-method="GET"
              data-path="api/api/weapon-categories"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('GETapi-api-weapon-categories', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-green">GET</small>
                        <code class="uri">api/api/weapon-categories</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-api-weapon-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-api-weapon-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                    </form>

        <div class="execution-results" id="execution-results-GETapi-api-weapon-categories" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-GETapi-api-weapon-categories"></div>
            <pre class="response-body"><code id="execution-response-content-GETapi-api-weapon-categories"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-GETapi-api-weapon-categories" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-GETapi-api-weapon-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="weapon-categories-POSTapi-weapon-category-add">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Criar nova categoria de arma.

Cria uma nova categoria de arma caso o usuário esteja autenticado.</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-POSTapi-weapon-category-add">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/weapon-category/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\"
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/weapon-category/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "description": "Dolores dolorum amet iste laborum eius est dolor."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-POSTapi-weapon-category-add">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">201</span>
                            <span class="response-description">201</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Weapon category has been created successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 10,
        &quot;name&quot;: &quot;Rifles&quot;,
        &quot;description&quot;: &quot;Armas de longo alcance&quot;
    }
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">409</span>
                            <span class="response-description">409</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;error&quot;: &quot;ConflictException&quot;,
    &quot;message&quot;: &quot;weapon category already exists&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">422</span>
                            <span class="response-description">422</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;O campo name &eacute; obrigat&oacute;rio.&quot;
        ]
    }
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-POSTapi-weapon-category-add">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-POSTapi-weapon-category-add"
                            onclick="tryItOut('POSTapi-weapon-category-add');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-POSTapi-weapon-category-add"
                            onclick="cancelTryOut('POSTapi-weapon-category-add');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-POSTapi-weapon-category-add"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-POSTapi-weapon-category-add"
              data-method="POST"
              data-path="api/weapon-category/add"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('POSTapi-weapon-category-add', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-black">POST</small>
                        <code class="uri">api/weapon-category/add</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-weapon-category-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-weapon-category-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-weapon-category-add"
               value="consequatur"
               data-component="body">
    <br>
<p>Nome da categoria. Ex: Rifles Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-weapon-category-add"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Descrição da categoria. Ex: Armas de longo alcance Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-POSTapi-weapon-category-add" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-POSTapi-weapon-category-add"></div>
            <pre class="response-body"><code id="execution-response-content-POSTapi-weapon-category-add"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-POSTapi-weapon-category-add" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-POSTapi-weapon-category-add">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="weapon-categories-PUTapi-weapon-category-update--id-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Atualizar uma categoria de arma existente.

Atualiza os dados de uma categoria de arma pelo seu ID.</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-PUTapi-weapon-category-update--id-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/weapon-category/update/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\"
}"
</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/weapon-category/update/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "description": "Dolores dolorum amet iste laborum eius est dolor."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-PUTapi-weapon-category-update--id-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;weapon category has been updated successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Pistolas&quot;,
        &quot;description&quot;: &quot;Armas curtas de f&aacute;cil manuseio&quot;
    }
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">404</span>
                            <span class="response-description">404</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;error&quot;: &quot;NotFoundException&quot;,
    &quot;message&quot;: &quot;weapon category not found&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">422</span>
                            <span class="response-description">422</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;O campo name &eacute; obrigat&oacute;rio.&quot;
        ]
    }
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-PUTapi-weapon-category-update--id-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-PUTapi-weapon-category-update--id-"
                            onclick="tryItOut('PUTapi-weapon-category-update--id-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-PUTapi-weapon-category-update--id-"
                            onclick="cancelTryOut('PUTapi-weapon-category-update--id-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-PUTapi-weapon-category-update--id-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-PUTapi-weapon-category-update--id-"
              data-method="PUT"
              data-path="api/weapon-category/update/{id}"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('PUTapi-weapon-category-update--id-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-darkblue">PUT</small>
                        <code class="uri">api/weapon-category/update/{id}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-weapon-category-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-weapon-category-update--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-weapon-category-update--id-"
               value="17"
               data-component="url">
    <br>
<p>ID da categoria de arma. Ex: 1 Example: <code>17</code></p>
                        </div>
                                    </div>
            
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">Body Parameters</h4>
                    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-weapon-category-update--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Nome da categoria. Ex: Pistolas Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-weapon-category-update--id-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Descrição da categoria. Ex: Armas curtas de fácil manuseio Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                    </div>
                    </form>

        <div class="execution-results" id="execution-results-PUTapi-weapon-category-update--id-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-PUTapi-weapon-category-update--id-"></div>
            <pre class="response-body"><code id="execution-response-content-PUTapi-weapon-category-update--id-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-PUTapi-weapon-category-update--id-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-PUTapi-weapon-category-update--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                                    <article class="endpoint-card" id="weapon-categories-DELETEapi-weapon-category-delete--id-">
    <header class="endpoint-header">
        <h2 class="endpoint-title">Delete an existing weapon category</h2>
        <div class="endpoint-meta">
                    </div>
    </header>

    
    <section class="endpoint-examples">
        <div class="example-requests" id="example-requests-DELETEapi-weapon-category-delete--id-">
            <h3 class="section-title">Example request</h3>

            <div class="code-tabs">
                                    <div class="bash-example code-tab">
                        <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/weapon-category/delete/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>                    </div>
                                    <div class="javascript-example code-tab">
                        <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/weapon-category/delete/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>                    </div>
                            </div>
        </div>

                    <div class="example-responses" id="example-responses-DELETEapi-weapon-category-delete--id-">
                <h3 class="section-title">Example response</h3>

                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">200</span>
                            <span class="response-description">200</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;weapon category has been deleted successfully&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">404</span>
                            <span class="response-description">404</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;error&quot;: &quot;No query results for model [App\\Models\\WeaponCategory] 1&quot;,
    &quot;message&quot;: &quot;weapon category not found&quot;
}</code>
                                                    </pre>
                    </div>
                                    <div class="response">
                        <div class="response-header">
                            <span class="response-status">500</span>
                            <span class="response-description">500</span>
                        </div>

                        
                        <pre class="response-body">
                                                                    <code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;error&quot;: &quot;Server error message&quot;,
    &quot;message&quot;: &quot;Error on delete weapon category&quot;
}</code>
                                                    </pre>
                    </div>
                            </div>
            </section>

    <section class="try-it-out" id="try-it-out-DELETEapi-weapon-category-delete--id-">
        <div class="try-it-out-header">
            <h3>Request</h3>

                            <div class="try-it-out-buttons">
                    <button type="button" class="btn-tryout" id="btn-tryout-DELETEapi-weapon-category-delete--id-"
                            onclick="tryItOut('DELETEapi-weapon-category-delete--id-');">
                        Try it out ⚡
                    </button>
                    <button type="button" class="btn-cancel" id="btn-canceltryout-DELETEapi-weapon-category-delete--id-"
                            onclick="cancelTryOut('DELETEapi-weapon-category-delete--id-');" hidden>
                        Cancel 🛑
                    </button>
                    <button type="submit" class="btn-execute" id="btn-executetryout-DELETEapi-weapon-category-delete--id-"
                            data-initial-text="Send Request 💥"
                            data-loading-text="⏱ Sending..." hidden>
                        Send Request 💥
                    </button>
                </div>
                    </div>

        <form id="form-DELETEapi-weapon-category-delete--id-"
              data-method="DELETE"
              data-path="api/weapon-category/delete/{id}"
              data-authed="0"
              data-hasfiles="0"
              data-isarraybody="0"
              autocomplete="off"
              onsubmit="event.preventDefault(); executeTryOut('DELETEapi-weapon-category-delete--id-', this);">

            <div class="http-methods">
                                    <div class="method">
                        <small class="badge badge-red">DELETE</small>
                        <code class="uri">api/weapon-category/delete/{id}</code>
                    </div>
                            </div>

                            <div class="parameters-section">
                    <h4 class="section-subtitle">Headers</h4>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-weapon-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                                                        <div class="parameter">
                            <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-weapon-category-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
                        </div>
                                    </div>
            
                            <div class="parameters-section">
                    <h4 class="section-subtitle">URL Parameters</h4>
                                            <div class="parameter">
                            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-weapon-category-delete--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the weapon category to delete Example: <code>1</code></p>
                        </div>
                                    </div>
            
            
                    </form>

        <div class="execution-results" id="execution-results-DELETEapi-weapon-category-delete--id-" hidden>
            <h4 class="section-subtitle">Received response</h4>
            <div class="response-status" id="execution-response-status-DELETEapi-weapon-category-delete--id-"></div>
            <pre class="response-body"><code id="execution-response-content-DELETEapi-weapon-category-delete--id-"
                                             data-empty-response-text="<Empty response>"></code></pre>
        </div>

        <div class="execution-error" id="execution-error-DELETEapi-weapon-category-delete--id-" hidden>
            <h4 class="section-subtitle error">Request failed with error</h4>
            <pre><code id="execution-error-message-DELETEapi-weapon-category-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
        </div>
    </section>

    </article>
                            </div>
            </section>
        </div>

        
    </div>

    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>

<!-- Footer opcional -->
<footer class="api-footer">
    <div class="container">
        <p>© 2025 NtrPI API Documentation. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
