<?php 
    
    function checkPrivilege($uri = false ){
        $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
        if(empty($_SESSION['admin']['privileges'])){
            return false;
        }
        $privileges = $_SESSION['admin']['privileges'];

        $privileges = implode('|', $privileges);
        preg_match('/' . $privileges . '/', $uri, $matches);
        return !empty($matches);
    }
?>