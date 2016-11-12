<?php

namespace Letscodehu\HumbugHtml;


class Project {

    private $summary, $uncovered = array(), $escaped = array(), $errored = array(), $timeouts = array(), $killed = array(), $files = array();

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param array $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return array
     */
    public function getUncovered()
    {
        return $this->uncovered;
    }

    /**
     * @param array $uncovered
     */
    public function setUncovered($uncovered)
    {
        $this->uncovered = $uncovered;
    }

    /**
     * @return array
     */
    public function getEscaped()
    {
        return $this->escaped;
    }

    /**
     * @param array $escaped
     */
    public function setEscaped($escaped)
    {
        $this->escaped = $escaped;
    }

    /**
     * @return array
     */
    public function getErrored()
    {
        return $this->errored;
    }

    /**
     * @param array $errored
     */
    public function setErrored($errored)
    {
        $this->errored = $errored;
    }

    /**
     * @return array
     */
    public function getTimeouts()
    {
        return $this->timeouts;
    }

    /**
     * @param array $timeouts
     */
    public function setTimeouts($timeouts)
    {
        $this->timeouts = $timeouts;
    }

    /**
     * @return array
     */
    public function getKilled()
    {
        return $this->killed;
    }

    /**
     * @param array $killed
     */
    public function setKilled($killed)
    {
        $this->killed = $killed;
    }



}