<?php

#Archivo para probar cosas básicas de PHP

#Variables básicas
$name = 'Juan'; 
$isDev = true; 
$age = 20; 

#URL del logo
define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg');

#Saludos
$output = "Saludos $name, tienes $age años. 😝";
#Mensaje según la edad
$outputAge = match (true) {
  $age < 2    => "Apenas eres un bebé, $name 👶",
  $age < 10   => "Todavía eres un niño, $name 👦",
  $age < 18   => "Estás en la adolescencia, $name 👨‍🎓",
  $age === 18 => "Acabas de alcanzar la mayoría de edad, $name 🍺",
  $age < 40   => "Eres un joven adulto, $name 👨‍💼",
  $age < 60   => "Estás en la madurez, $name 👴",
  default     => "Ya tienes bastante sabiduría acumulada, $name 👴",
};

#Datos de persona
$person = [
  "name" => "Pablo",
  "age" => 78,
  "isDev" => true,
  "languages" => ["PHP", "JavaScript", "Python"],
];
#Cambio el nombre
$person["name"] = "pheralb"; 
#Agrego un lenguaje más
$person["languages"][] = "Ruby"; 
?>

<!-- Lista de lenguajes -->
<ul>
  <?php foreach ($bestLanguages as $key => $language) : ?>
      <li><?= $key . " - " . $language ?></li>
  <?php endforeach; ?>
</ul>

<!-- Mensaje de edad -->
<h2><?= $outputAge ?></h2>

<!-- Logo de PHP -->
<img src="<?= LOGO_URL ?>" alt="Logo de PHP" width="200">
<!-- Mensaje de saludo -->
<h1>
  <?= $output ?>
</h1>