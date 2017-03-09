<?php
/**
 * Данная функция подключает все классы
 * Важно!! Этот файл должен лежать в той папке, с которой начинается поиск файлов для подключения.
 * @author sergey
 */
 spl_autoload_register(function($name){
    
         loadclass(__DIR__,$name);
   
     
 });
 
 function loadclass($dir,$name){
 
     $t= scandir($dir);
     for($i=0;$i<count($t);$i++){
         if(!preg_match('~.php~', $t[$i])){
             if ($t[$i] != "." && $t[$i] != ".."){
                 $handle= opendir($dir.'/'.$t[$i]);
                  while (false !== ($file = readdir($handle))) { 
                    if ($file != "." && $file != "..") {
                        if(substr($file, 0,-4)==$name){
                            require_once __DIR__.'/'.$t[$i].'/'.$name.'.php';

                        }
                    } 
                }
                closedir($handle);
             }
         }     
     }
 }

Router::start();




