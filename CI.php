<!-- // test responsive filemanager security -->

<?php
ob_start();
define('REQUEST', 'external');
// require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "index.php"; //or wherever the directory is relative to your path
require_once "index.php"; //or wherever the directory is relative to your path
ob_end_clean();
$CI =& get_instance();
