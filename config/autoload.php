<?php
	spl_autoload_register('AutoLoader');

	function AutoLoader($class)
    {
        $path = sprintf($_SERVER["DOCUMENT_ROOT"] . '/app/Controllers/%s.php', $class);
        if (!file_exists($path)) {
            //return false;
            $path = sprintf($_SERVER["DOCUMENT_ROOT"] . '/public/%s.php', $class);
            if (!file_exists($path)) {
            $path = sprintf($_SERVER["DOCUMENT_ROOT"]. '/app/Models/%s.php',$class);
            }
            else {
                return 'njama';
            }
        }
        include_once $path;

    }