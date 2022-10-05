<?php
	spl_autoload_register('AutoLoader');

	function AutoLoader($class)
    {
        $path = sprintf($_SERVER["DOCUMENT_ROOT"] . '/app/Controllers/%s.php', $class);
        if (!file_exists($path)) {
            //return false;
            $path = sprintf($_SERVER["DOCUMENT_ROOT"] . '/%s.php', $class);
            if (!file_exists($path)) {
                echo 'nema';

            }

        } else if(!file_exists($path)){
            $path = sprintf($_SERVER["DOCUMENT_ROOT"]. '/MyForum/app/Models/%s.php',$class);
            if(!file_exists($path)){
                echo 'nema';
            }
        }
        include_once $path;

    }