<?php

namespace funciones;

class Json
{
    public static function encode($message, $data)
    {
        echo json_encode(array(
            'message' => $message,
            'info' => $data
        ));
    }
}
