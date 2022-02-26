<?php
//just use getflag() to get your flag
error_reporting(0);
class double_check  {
        public function __construct(){
                

        }
        public function getflag(){
             echo file_get_contents('/flag');
        }
        public function check(){
             static $b;
             $b ++;
             return $b;

        }
        public function __destruct(){
                if($this->check()<2){
                        $this->getflag();
                }else{
                        echo 'check failed';
                }
      }

        public function __wakeup(){
                $this->check();
                
        }
}
unserialize($_GET['mocs']);