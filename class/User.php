<?php

class User {
    
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $birthday;
    public $age;
    
    function __construct($id,$firstName,$lastName,$email,$birthday) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->age = floor((time() - strtotime($birthday)) / 31556926);
      }

    function set_name($name) {
      $this->firstName = $firstName;
    }
    function get_name() {
      return $this->firstName;
    }
    function get_age() {
        $_age = floor((time() - strtotime($birthday)) / 31556926);
        return $this->$_age;
      }

  }



?>