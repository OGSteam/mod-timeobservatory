<?php
if (!defined('IN_SPYOGAME')) die("Hacking Attempt!");
require_once("views/page_header.php");
include_once("mod/timeobservatory/common.php");


//page principale
$data = array();

//recupération du formulaire
$form = array();
$form["gmax"]= (isset($pub_gmax)) ? (int)$pub_gmax : 9;
$form["gmin"]= (isset($pub_gmin)) ? (int)$pub_gmin :1;
$form["smax"]= (isset($pub_smax)) ? (int)$pub_smax :499;
$form["smin"]= (isset($pub_smin)) ? (int)$pub_smin :1;
$form["dayre"]= (isset($pub_dayre)) ? (int)$pub_dayre :999;
$form["limite"]= (isset($pub_limite)) ? (int)$pub_limite :200;


$data["form"]= $form;
$data["re"] = getREbyFilter($form);
include(FOLDER_CSS."/css.php");
include(FOLDER_VIEW."/timeobservatory.php");




require_once("views/page_tail.php");
include(FOLDER_JS."/timeobservatory.php");

