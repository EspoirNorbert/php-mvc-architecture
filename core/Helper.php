<?php

namespace Core;

class  Helper {
    

    public static function printr($data): void
    {
        echo  "<pre>";var_dump($data);echo "</pre>";
        die();
    }

}