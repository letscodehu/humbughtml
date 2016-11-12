<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:35
 */

namespace Letscodehu\HumbugHtml;


class HtmlRenderer implements Renderer {

    private $outDir;

    public function __construct($outDir = "humbugreports") {
        $this->outDir = $outDir;
    }

    public function render(Project $project)
    {
        $this->createDirectories();
        $this->renderProjectView($project);
        $this->renderFileViews($project);
        $this->renderMutantViews($project);

    }

    private function renderProjectView(Project $project) {
        ob_start();
        include "stubs".DIRECTORY_SEPARATOR."project.phtml";
        $content = ob_get_contents();
        ob_end_clean();
        file_put_contents($this->outDir. DIRECTORY_SEPARATOR . "index.html", $content);
    }

    private function renderFileViews(Project $project) {
        /** @var File $file */
        foreach ($project->getFiles() as $file) {
            ob_start();
            include "stubs".DIRECTORY_SEPARATOR."file.phtml";
            $content = ob_get_contents();
            ob_end_clean();
            $this->forceFilePutContents($this->outDir. DIRECTORY_SEPARATOR . "files". DIRECTORY_SEPARATOR. $file->getName().".html", $content);
        }
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
        $this->createDirectory("uncovered");
        $this->createDirectory("killed");
        $this->createDirectory("timeouts");
        $this->createDirectory("escaped");
    }

    private function createDirectory($suffix = "") {
        if (!is_dir($this->outDir.DIRECTORY_SEPARATOR.$suffix)) {
            mkdir($this->outDir.DIRECTORY_SEPARATOR.$suffix);
        }
    }

}