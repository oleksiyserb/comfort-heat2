@props(['project'])
@php
    /* @var $project \App\Models\Projects */
@endphp

<div {{ $attributes->merge(['class' => 'info__item']) }}>
    <img src="{{ asset('storage/' . $project->image) }}" alt="hotel">
    <h3>{{ $project->name }}</h3>
    <div class="info__button project__details">
        <a href="{{ url('projects/' . $project->slug) }}">Детальніше<img src="/image/arrow-down.svg" alt="arrow"></a>
    </div>
</div>
