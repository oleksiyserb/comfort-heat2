<?php

namespace App\Observers;

use App\Models\Projects;

class ProjectObserver
{
    public function creating(Projects $projects)
    {
        $this->setUser($projects);
        $this->setSlug($projects);
    }

    public function updating(Projects $projects)
    {
        $this->setSlug($projects);
    }

    protected function setSlug($projects)
    {
        if(empty($projects->slug)) {
            $projects->slug = \Str::slug($projects->name);
        }
    }

    protected function setUser($projects)
    {
        $projects->author_id = auth()->user()->id ?? rand(1, 10);
    }
}
