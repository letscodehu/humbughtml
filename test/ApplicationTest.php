<?php

class ApplicationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \Letscodehu\HumbugHtml\Application
     */
    private $application;

    /**
     * @test
     */
    public function it_invokes_parser_then_passes_project_to_renderer() {
        // GIVEN
        $project = new \Letscodehu\HumbugHtml\Project();
        $renderer = $this->getMockBuilder(\Letscodehu\HumbugHtml\Renderer::class)->setMethods(["render"])->getMock();
        $renderer->expects($this->once())->method("render")->with($project);
        $parser = $this->getMockBuilder(\Letscodehu\HumbugHtml\JsonParser::class)->setMethods(["consume"])->getMock();
        $parser->expects($this->once())->method("consume")->willReturn($project);
        $this->application = new \Letscodehu\HumbugHtml\Application($parser, $renderer);
        // WHEN
        $this->application->generate();
        // THEN
    }


}