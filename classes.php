<?php

declare(strict_types=1);

#Clase para representar superhéroes
class SuperHero
{
    #Constructor para crear un superhéroe
    public function __construct(
        private string $name,
        public array $powers,
        public string $planet
    ) {
    }

    // Método para cuando ataca
    public function attack(): string
    {
        // Mensaje de ataque
        return "¡$this->name lanza un ataque con sus poderes!";
    }

    // Devuelve todos los datos del héroe
    public function show_all(): array
    {
        // Usa función de PHP
        return get_object_vars($this);
    }

    // Crea la descripción del héroe
    public function description(): string
    {
        // Junta los poderes
        $powers = implode(", ", $this->powers);

        // Arma el texto completo
        return "$this->name es un superhéroe originario de $this->planet y posee los siguientes poderes: $powers";
    }

    // Crea un héroe aleatorio
    public static function random(): SuperHero
    {
        // Nombres posibles
        $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
        // Poderes posibles
        $powers = [
            ["Superfuerza", "Vuelo", "Rayos láser"],
            ["Superfuerza", "Agilidad sobrehumana", "Telarañas"],
            ["Regeneración", "Fuerza aumentada", "Garras de adamantium"],
            ["Armadura potenciada", "Tecnología avanzada", "Propulsores"],
            ["Fuerza descomunal", "Resistencia", "Transformación"],
        ];
        // Planetas posibles
        $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

        // Elige un nombre al azar
        $name = $names[array_rand($names)];
        // Elige poderes al azar
        $power = $powers[array_rand($powers)];
        // Elige un planeta al azar
        $planet = $planets[array_rand($planets)];

        // Crea y devuelve el héroe
        return new self($name, $power, $planet);
    }
}

// Crea un héroe aleatorio
$hero = SuperHero::random();
// Muestra la descripción
echo $hero->description();