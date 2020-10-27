<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('session','database','mylibrary','pagination','table','form_validation','template','user_agent','email','datatables');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','form','custom','download','html','engine','cookie','string','language');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('model_app','model_utama');
