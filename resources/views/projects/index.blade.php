<x-app-layout>
    <!-- Projects -->
    <section class="projects">
        <div class="container">
            <h2 class="title">Наші проєкти</h2>
            <div class="info">

                @foreach($projects as $project)
                    <x-project-item :project="$project" class="{{ $project->image ? 'project__picture' : '' }}" />
                @endforeach

            </div>
            <div class="pagination">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
