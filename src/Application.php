<?php

namespace Letscodehu\HumbugHtml;

/**
 * Class Application
 * @package Letscodehu\HumbugHtml
 */
class Application
{

    private $parser, $renderer;

    public function __construct(Parser $parser, Renderer $renderer)
    {
        $this->parser = $parser;
        $this->renderer = $renderer;
    }

    /**
     * Invokes the parsers consume method to retreive a Project,
     * then passes it to the renderer for rendering.
     * @return void
     */
    public function generate()
    {
        $project = $this->parser->consume();
        $this->renderer->render($project);
    }


}