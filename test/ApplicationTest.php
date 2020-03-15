<?php

use Letscodehu\HumbugHtml\Application;
use Letscodehu\HumbugHtml\JsonParser;
use Letscodehu\HumbugHtml\Project;
use Letscodehu\HumbugHtml\Renderer;

class ApplicationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Application
     */
    private $application;

    /**
     * @test
     */
    public function it_invokes_parser_then_passes_project_to_renderer()
    {
        // GIVEN
        $project = new Project();
        $renderer = $this->getMockBuilder(Renderer::class)->setMethods(["render"])->getMock();
        $renderer->expects($this->once())->method("render")->with($project);
        $parser = $this->getMockBuilder(JsonParser::class)->setMethods(["consume"])->getMock();
        $parser->expects($this->once())->method("consume")->willReturn($project);
        $this->application = new Application($parser, $renderer);
        // WHEN
        $this->application->generate();
        // THEN
    }


}