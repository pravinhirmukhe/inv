<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xcrud
 *
 * @author Pravinkumar
 */
class xcrudx {

    //put your code here
    public function __construct() {
        require 'xcrud/xcrud.php';
    }

    public function __get($var) {
        return get_instance()->$var;
    }

    public function get() {
        return Xcrud::get_instance();
    }

}
