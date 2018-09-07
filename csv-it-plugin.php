<?php
/*
Plugin Name: CSV It Plugin
Plugin Uri: https://github.com/alnever/html-it-plugin
Description: The shortcode allows to download a table within it as a CSV-file
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru

License: GPL2

    Copyright 2018 Alex Neverov

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License,
    version 2, as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

namespace CsvItPlugin;

spl_autoload_register(
 function ($class_name) {
   if ( ! class_exists($class_name, FALSE) && strstr($class_name, __NAMESPACE__) !== FALSE )
   {
     $class_name = str_replace(__NAMESPACE__."\\","",$class_name);
     $class_name = strtolower($class_name);
     $class_name = str_replace("_","-",$class_name);
     $class_name = str_replace("\\","/",$class_name);
     include $class_name . ".php";
   }
 }
);

class Scv_It_Plugin {
  public function __construct() {
    new Csv_It();
  }
}

new Csv_It_Plugin();



?>
