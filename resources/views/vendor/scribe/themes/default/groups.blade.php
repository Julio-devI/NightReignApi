@foreach($groupedEndpoints as $group)
    <section class="api-group" id="{!! Str::slug($group['name']) !!}">
        <div class="group-header">
            <h1 class="group-title">
                <i class="icon-group fas fa-folder-open"></i>
                {!! $group['name'] !!}
            </h1>

            @if(!empty($group['description']))
                <div class="group-description">
                    {!! Parsedown::instance()->text($group['description']) !!}
                </div>
            @endif
        </div>

        @foreach($group['subgroups'] as $subgroupName => $subgroup)
            @if($subgroupName !== "")
                <div class="subgroup" id="{!! Str::slug($group['name']) !!}-{!! Str::slug($subgroupName) !!}">
                    <h2 class="subgroup-title">
                        <i class="icon-subgroup fas fa-folder"></i>
                        {{ $subgroupName }}
                    </h2>

                    @php($subgroupDescription = collect($subgroup)->first(fn ($e) => $e->metadata->subgroupDescription)?->metadata?->subgroupDescription)
                        @if($subgroupDescription)
                            <div class="subgroup-description">
                                {!! Parsedown::instance()->text($subgroupDescription) !!}
                            </div>
                        @endif
                </div>
            @endif

            <div class="endpoints-list">
                @foreach($subgroup as $endpoint)
                    @include("scribe::themes.default.endpoint")
                @endforeach
            </div>
        @endforeach
    </section>
@endforeach
