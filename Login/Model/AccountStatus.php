<?php


class status {
    private $s_id;
    private $status_name;
    
    function __toString()
    {
      return $this->s_id . ' '. $this->status_name;
    }
    function __construct($s_id, $status_name) {
        $this->s_id = $s_id;
        $this->status_name = $status_name;
    }

    function getId() {
        return $this->s_id;
    }

    function getType() {
        return $this->status_name;
    }

    function setId($s_id) {
        $this->s_id = $s_id;
    }

    function setType($status_name) {
        $this->status_name = $status_name;
    }

}