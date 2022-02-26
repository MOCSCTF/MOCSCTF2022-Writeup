<?php
highlight_file(__FILE__);
//try to read
error_reporting(0);
if (isset($_GET['rce'])) {
  if (!empty($_GET['rce'])){
    $printValue= strtolower($_GET['rce']);
    $banned = array("cat", "more" ,"readfile", "fopen", "file_get_contents", "file", "SplFileObject" );
    $special_block= "test";
    $$special_block= "f1ag_1s_h3re.php";
    foreach ($banned as $value) {
      if (strpos($printValue, $value) || preg_match('/system|exec|bin2hex|assert|passthru|shell_exec|escapeshellcmd| escapeshellarg|pcntl_exec|usort|popen|flag|special_block|require|scandir|include|hex2bin|getallheaders|strrev|getallheaders|strrev|\$[a-zA-Z]|[#!%^&*_+=\-,\.:`|<>?~\\\\]/i', $printValue)) {
        $printValue="";
        echo "<script>alert('Bad character/word ditected!');</script>";
        break;
      }
    }
  eval($printValue . ";");
  } 
}
?>