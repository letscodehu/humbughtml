<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:42
 */

namespace Letscodehu\HumbugHtml;


interface Renderer {

    /**
     * Renders the given project.
     * @param Project $project
     * @return mixed
     */
    public function render(Project $project);
}