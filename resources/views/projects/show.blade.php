@php
    /* @var $project \App\Models\Projects */
@endphp

<x-app-layout>
    <section class="article">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ url('projects') }}">Проєкти</a> > <p>{{ $project->name }}</p>
            </div>
            <div class="article__content">
                <h1 class="title article__title">{{ $project->name }}</h1>
                <div class="article__image">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="floor">
                </div>
                <div class="article__content">
                    <p>{{ $project->body }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="propositions">
        <div class="container">
            <h4 class="title">Пов’язані проєкти</h4>
            <div class="info">

                @foreach($recommend as $project)
                    <x-project-item :project="$project" class="{{ $project->image ? 'project__picture' : '' }}" />
                @endforeach

            </div>
        </div>
    </section>
</x-app-layout>
