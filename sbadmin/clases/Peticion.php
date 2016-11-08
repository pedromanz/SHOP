<?php

class Peticion {

    public static function request($nombre) {
        $r = Peticion::getParametroGeneralGet($nombre);
        if ($r == NULL)
            $r = Peticion::getParametroGeneralPost($nombre);
        return $r;
    }
    
    public static function get($nombre) {
        if (isset($_GET[$nombre])) {
            if (empty($_GET[$nombre])) {
                return "";
            } else {
                if (is_array($_GET[$nombre])) {
                    $valores = [];
                    foreach ($_GET[$nombre] as $valor) {
                        $valores[] = $valor;
                    }
                    return $valores;
                } else {
                    return $_GET[$nombre];
                }
            }
        } else {
            return NULL;
        }
    }

    public static function post($nombre) {
        if (isset($_POST[$nombre])) {
            if (empty($_POST[$nombre])) {
                return "";
            } else {
                if (is_array($_POST[$nombre])) {
                    $valores = [];
                    foreach ($_POST[$nombre] as $valor) {
                        $valores[] = $valor;
                    }
                    return $valores;
                } else {
                    return $_POST[$nombre];
                }
            }
        } else {
            return NULL;
        }
    }
    
    public static function requestSingle($nombre) {
        $r = Peticion::getParametroGet($nombre);
        if ($r == NULL)
            $r = Peticion::getParametroPost($nombre);
        return $r;
    }

    public static function getSingle($nombre) {
        $r = Peticion::getParametroGeneralGet($nombre);
        if(is_array($r))
            return false;
        return $r;
    }

    public static function postSingle($nombre) {
        $r = Peticion::getParametroGeneralPost($nombre);
        if(is_array($r))
            return false;
        return $r;
    }

    public static function requestArray($nombre) {
        $r = Peticion::getParametroArrayGet($nombre);
        if ($r == NULL)
            $r = Peticion::getParametroArrayPost($nombre);
        return $r;
    }

    public static function getArray($nombre) {
        $r = Peticion::getParametroGeneralGet($nombre);
        if(is_array($r))
            return $r;
        return FALSE;
    }

    public static function postArray($nombre) {
        $r = Peticion::getParametroGeneralPost($nombre);
        if(is_array($r))
            return $r;
        return FALSE;
    }

}
