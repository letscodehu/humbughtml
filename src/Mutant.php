<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.12.
 * Time: 19:43
 */

namespace Letscodehu\HumbugHtml;


class Mutant {

    private $file, $mutator, $class, $method, $line, $diff, $tests, $stderr, $stdout;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getMutator()
    {
        return $this->mutator;
    }

    /**
     * @param mixed $mutator
     */
    public function setMutator($mutator)
    {
        $this->mutator = $mutator;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param mixed $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return mixed
     */
    public function getDiff()
    {
        return $this->diff;
    }

    /**
     * @param mixed $diff
     */
    public function setDiff($diff)
    {
        $this->diff = $diff;
    }

    /**
     * @return mixed
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * @param mixed $tests
     */
    public function setTests($tests)
    {
        $this->tests = $tests;
    }

    /**
     * @return mixed
     */
    public function getStderr()
    {
        return $this->stderr;
    }

    /**
     * @param mixed $stderr
     */
    public function setStderr($stderr)
    {
        $this->stderr = $stderr;
    }

    /**
     * @return mixed
     */
    public function getStdout()
    {
        return $this->stdout;
    }

    /**
     * @param mixed $stdout
     */
    public function setStdout($stdout)
    {
        $this->stdout = $stdout;
    }

}