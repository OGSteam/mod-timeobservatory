<?php
if (!defined('IN_SPYOGAME')) die("Hacking Attempt!");
require_once("views/page_header.php");

include_once("mod/timeobservatory/common.php");

$data = getAllRE();
include(FOLDER_CSS."/css.php");
include(FOLDER_VIEW."/timeobservatory.php");




require_once("views/page_tail.php");
include(FOLDER_JS."/timeobservatory.php");

