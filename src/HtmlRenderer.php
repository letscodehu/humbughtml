<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:35
 */

namespace Letscodehu\HumbugHtml;


class HtmlRenderer implements Renderer {

    private $outDir, $resourcesDir, $capturer, $writer;

    public function __construct($outDir = "humbugreports", StreamCapturer $capturer, StreamWriter $writer) {
        $this->outDir = $outDir;
        $this->capturer = $capturer;
        $this->writer = $writer;
        $this->resourcesDir = getcwd().DS.$outDir.DS."resources".DS;
    }

    /**
     * Rendering the given project. Generating the directories for it, copies the
     * static resources then renders the HTML for the project and for the files in that project.
     *
     * @param Project $project
     */
    public function render(Project $project)
    {
        $this->createDirectories();
        $this->copyResources();
        $this->renderProjectView($project);
        $this->renderFileViews($project);

    }

    private function renderProjectView(Project $project) {
        $content = $this->capturer->includeFile(LIBRARY_ROOT.DS."stubs".DS."project.phtml",
            array(
                "project" => $project,
                "resourcesDir" => $this->resourcesDir
            )
        );
        $this->writer->putContents($this->outDir. DS . "index.html", $content);
    }

    private function renderFileViews(Project $project) {
        foreach ($project->getFiles() as $file) {
            /** @var File $file */
            $content = $this->capturer->includeFile(LIBRARY_ROOT.DS."stubs".DS."file.phtml",
                array(
                    "project" => $project,
                    "file" => $file,
                    "resourcesDir" => $this->resourcesDir
                ));
            $this->writer->putContents($this->outDir. DS . "files". DS. $file->getName().".html", $content);
        }
    }

    private function copyResources() {
        copy(LIBRARY_ROOT.DS."resources".DS."style.css", $this->resourcesDir."style.css");
        copy(getcwd().DS."vendor".DS."twbs".DS."bootstrap".DS."dist".DS."css".DS."bootstrap.min.css",
            $this->resourcesDir."bootstrap.min.css");
        copy(getcwd().DS."vendor".DS."twbs".DS."bootstrap".DS."dist".DS."js".DS."bootstrap.min.js",
            $this->resourcesDir."bootstrap.min.js");
        copy(getcwd().DS."vendor".DS."components".DS."jquery".DS."jquery.min.js",
            $this->resourcesDir."jquery.min.js");
    }

    private function createDirectories() {
        $this->createDirectory();
        $this->createDirectory("files");
        $this->createDirectory("errored");
        $this->createDirectory("resources");
        $this->createDirectory("uncovered");
        $this->createDirectory("killed");
        $this->createDirectory("timeouts");
        $this->createDirectory("escaped");
    }

    private function createDirectory($suffix = "") {
        if (!is_dir($this->outDir.DS.$suffix)) {
            mkdir($this->outDir.DS.$suffix);
        }
    }

}