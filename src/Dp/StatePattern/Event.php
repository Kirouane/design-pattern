<?php
namespace Dp\StatePattern;


class Event
{
    private $name;

    private $target;

    private $params = [];

    /**
     * Event constructor.
     * @param $name
     * @param $target
     * @param array $params
     */
    public function __construct($name, array $params = [])
    {
        $this->name = $name;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }



}

