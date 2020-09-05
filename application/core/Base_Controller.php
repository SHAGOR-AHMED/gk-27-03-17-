<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_Controller extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        if(!auth('logged_in'))
        {
            redirect('login');
        }

    }
}