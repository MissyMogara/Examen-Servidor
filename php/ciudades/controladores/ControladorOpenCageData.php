<?php 

namespace app\controladores;

class ControladorOpenCageData {
    public static function llamarApi($ciudad, $pais) {
        $api_key = file_get_contents("./api-keys/OpenCage.txt");
        $url = "https://api.opencagedata.com/geocode/v1/json?q=" . $ciudad . "+" . $pais . "&key=" . $api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch);
        $outputAR = json_decode($output);

        // $respuesta = file_get_contents($url);
        // $ciudad = json_decode($respuesta);
        return $outputAR;
    }
}


?>