<?php

namespace Letscodehu\HumbugHtml;


interface Parser {

    /**
     * Consumes the logfile given and generates a project from its content.
     * @return \Letscodehu\HumbugHtml\Project
     */
    public function consume();

}