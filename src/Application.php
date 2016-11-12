<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:37
 */

namespace Letscodehu\HumbugHtml;


class Application {

    private $parser, $renderer;

    public function __construct(Parser $parser, Renderer $renderer)
    {
        $this->parser = $parser;
        $this->renderer = $renderer;
    }

    public function generate() {
        $project = $this->parser->consume();
        $this->renderer->render($project);
    }


}