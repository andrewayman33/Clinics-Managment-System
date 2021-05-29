<?php

class  usersType {
    private $type_id;
    private $type_name;
    
    function __toString()
    {
      return $this->type_id . ' '. $this->type_name;
    }
    function __construct($type_id, $type_name) {
        $this->type_id = $type_id;
        $this->type_name = $type_name;
    }

    function getId() {
        return $this->type_id;
    }

    function getType() {
        return $this->type_name;
    }

    function setId($type_id) {
        $this->type_id = $type_id;
    }

    function setType($type) {
        $this->type_name = $type;
    }


}
