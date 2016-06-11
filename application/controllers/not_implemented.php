<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class not_implemented extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        echo "<h1>Not implemented yet</h1></br>";

    }

}
