<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:35
 */

namespace Letscodehu\HumbugHtml;


class HtmlRenderer implements Renderer {

    private $outDir, $resourcesDir;

    public function __construct($outDir = "humbugreports") {
        $this->outDir = $outDir;
        $this->resourcesDir = getcwd().DS.$outDir.DS."resources".DS;
    }

    public function render(Project $project)
    {
        $this->createDirectories();
        $this->copyResources();
        $this->renderProjectView($project);
        $this->renderFileViews($project);
        $this->renderMutantViews($project);

    }

    private function renderProjectView(Project $project) {
        ob_start();
        include "stubs".DS."project.phtml";
        $content = ob_get_contents();
        ob_end_clean();
        file_put_contents($this->outDir. DS . "index.html", $content);
    }

    private function renderFileViews(Project $project) {
        /** @var File $file */
        foreach ($project->getFiles() as $file) {
            ob_start();
            include "stubs".DS."file.phtml";
            $content = ob_get_contents();
            ob_end_clean();
            $this->forceFilePutContents($this->outDir. DS . "files". DS. $file->getName().".html", $content);
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

    function forceFilePutContents ($filepath, $content){
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
            if($isInFolder) {
                $folderName = $filepathMatches[1];
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777, true);
                }
            }
            file_put_contents($filepath, $content);
        } catch (\Exception $e) {
            echo "ERR: error writing '$content' to '$filepath', ". $e->getMessage();
        }
    }

    private function renderMutantViews(Project $project) {

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