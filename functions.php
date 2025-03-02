<?php

#Carga una plantilla con los datos
function render_template(string $template, array $data = [])
{
    #Saca las variables del array asociativo
    extract($data);
    #carga el archivo plantilla desde la carpeta 'templates'
    require "templates/$template.php";
}

#obtine los datos desde una API
function get_data(string $url): array
{
    $result = file_get_contents($url);
    return json_decode($result, true);
}