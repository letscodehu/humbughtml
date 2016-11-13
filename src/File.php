<?php

namespace Letscodehu\HumbugHtml;


/**
 * Class File
 *
 * The domain representation of a file with the corresponding mutants.
 *
 * @package Letscodehu\HumbugHtml
 */
class File {

    private $name, $uncovered = array(), $escaped = array(), $errored = array(), $timeouts = array(), $killed = array();

    public function __construct($name, $content) {
        if (array_key_exists("uncovered", $content)) {
            $this->uncovered = $content["uncovered"];
        }
        if (array_key_exists("escaped", $content)) {
            $this->escaped = $content["escaped"];
        }
        if (array_key_exists("errored", $content)) {
            $this->errored = $content["errored"];
        }
        if (array_key_exists("timeouts", $content)) {
            $this->timeouts = $content["timeouts"];
        }
        if (array_key_exists("killed", $content)) {
            $this->killed = $content["killed"];
        }

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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