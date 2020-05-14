<?php
/**
* @package PeopledbPlugin
*/


/*
Plugin Name:PeopledbPlugin
Plugin URI: http://
Description:This is a WordPress plugin to move NYU ITP people database to WordPress.
Version:1.0.0
Author: Tianxu Zhou
Author URI: http://www.tianxuzhou.xyz
License: GPLv2 or later
Text Domain: peopledb-plugin
*/

if (! defined('ABSPATH')){
  die;
}

class PeopledbPlugin{
  //methods
  function __construct(){
    add_action('init',array($this,'custom_post_type'));
  }
  function activate(){
    $this->custom_post_type();
    flush_rewrite_rules();
  }

  function deactivate(){
    echo 'the plugin was activated';
  }

  function uninstall(){

  }

  function custom_post_type(){
    register_post_type('Profile',['public'=>true, 'label'=>'Profile']);
  }


}

if(class_exists('PeopledbPlugin')){
  $peopledb = new PeopledbPlugin('init');
}

//activation
register_activation_hook(__FILE__, array($peopledb,'activate'));
//deactivation
register_deactivation_hook(__FILE__, array($peopledb,'deactivate'));
//uninstall
