<?php

namespace Letscodehu\HumbugHtml;


class JsonParser implements Parser
{

    private $logFile;

    public function __construct($logFile = "humbuglog.json")
    {
        $this->logFile = $logFile;
    }

    public function consume()
    {
        $content = $this->getContent();
        $objectMap = json_decode($content);
        if ($objectMap == null) {
            throw new \InvalidArgumentException("The json contained was not valid!");
        }
        return $this->convertToProject($objectMap);
    }

    private function getContent()
    {
        if (!file_exists($this->logFile)) {
            throw new \InvalidArgumentException("The specified file '" . $this->logFile . "' not found!");
        }
        return file_get_contents($this->logFile);
    }


    private function convertToProject($objectMap)
    {
        $project = new Project();
        $project->setSummary($objectMap->summary);
        $project->setErrored($this->convertToMutantList($objectMap->errored));
        $project->setEscaped($this->convertToMutantList($objectMap->escaped));
        $project->setKilled($this->convertToMutantList($objectMap->killed));
        $project->setTimeouts($this->convertToMutantList($objectMap->timeouts));
        $project->setUncovered($this->convertToMutantList($objectMap->uncovered));
        $project->setFiles($this->convertToFileList($project));
        return $project;
    }

    private function convertToFileList(Project $project)
    {
        $allMutants = array(
            "errored" => $project->getErrored(),
            "escaped" => $project->getEscaped(),
            "killed" => $project->getKilled(),
            "timeouts" => $project->getTimeouts(),
            "uncovered" => $project->getUncovered()
        );
        $pureFiles = array();


        foreach ($allMutants as $category => $elements) {
            foreach ($elements as $key => $item) {
                $pureFiles[$item->getFile()][$category][$key] = $item;
            }
        }

        ksort($pureFiles, SORT_NUMERIC);
        $fileList = array();
        foreach ($pureFiles as $fileName => $fileContent) {
            $fileList[] = new File($fileName, $fileContent);
        }
        return $fileList;
    }

    private function convertToMutantList($jsonList)
    {
        if (!is_array($jsonList)) {
            throw new \InvalidArgumentException("The given element is not an array");
        }
        $mutants = array();
        foreach ($jsonList as $jsonObject) {
            $mutants[] = $this->convertToMutant($jsonObject);
        }
        return $mutants;
    }

    private function convertToMutant($jsonObject)
    {
        $mutant = new Mutant();
        $mutant->setClass($jsonObject->class);
        if (property_exists($jsonObject, "diff")) {
            $mutant->setDiff($this->convertDiff($jsonObject->diff));
        }
        $mutant->setFile($jsonObject->file);
        $mutant->setLine($jsonObject->line);
        $mutant->setMutator($jsonObject->mutator);
        if (property_exists($jsonObject, "stderr")) {
            $mutant->setStderr($jsonObject->stderr);
        }
        if (property_exists($jsonObject, "stdout")) {
            $mutant->setStdout($jsonObject->stdout);
        }
        if (property_exists($jsonObject, "tests")) {
            $mutant->setTests($jsonObject->tests);
        }
        $mutant->setMethod($jsonObject->method);
        return $mutant;
    }

    public function convertDiff($string)
    {
        $rows = array_slice(explode(PHP_EOL, $string), 3);
        for ($x = 0; $x < count($rows); $x++) {
            if (strpos($rows[$x], "-") === 0) {
                $rows[$x] = '<pre class="original"> ' . substr($rows[$x], 1) . '</pre>';
            } elseif (strpos($rows[$x], "+") === 0) {
                $rows[$x] = '<pre class="mutated"> ' . substr($rows[$x], 1) . '</pre>';
            } else {
                $rows[$x] = '<pre>' . $rows[$x] . '</pre>';
            }
        }
        return implode(PHP_EOL, $rows);
    }

}