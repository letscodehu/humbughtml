<?php

namespace Letscodehu\HumbugHtml;


interface Renderer
{

    /**
     * Renders the given project.
     * @param Project $project
     * @return mixed
     */
    public function render(Project $project);
}