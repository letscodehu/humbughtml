<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:42
 */

namespace Letscodehu\HumbugHtml;


interface Renderer {
    public function render(Project $project);
}