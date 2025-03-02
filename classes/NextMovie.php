<?php

#Clase para manejar info sobre películas
class NextMovie
{
    // Propiedades en las que son privadas solo pueden ser accedidas dentro de la propia clase
    private string $title;
    private int $days_until;
    private string $following_production;
    private string $release_date;
    private string $poster_url;
    private string $overview;
    private ?string $next_poster;
    private ?int $next_days;
    private ?string $next_release;
    private ?string $next_overview;

    #Constructor inicializa la clave con los valores que se le pasan 
    public function __construct(
        string $title,
        int $days_until,
        string $following_production,
        string $release_date,
        string $poster_url,
        string $overview,
        ?string $next_poster = null,
        ?int $next_days = null,
        ?string $next_release = null,
        ?string $next_overview = null
    ) {
        $this->title = $title;
        $this->days_until = $days_until;
        $this->following_production = $following_production;
        $this->release_date = $release_date;
        $this->poster_url = $poster_url;
        $this->overview = $overview;
        $this->next_poster = $next_poster;
        $this->next_days = $next_days;
        $this->next_release = $next_release;
        $this->next_overview = $next_overview;
    }

    #Mensaje de estreno de los días restantes
    public function get_until_message(): string
    {
        $days = $this->days_until;

        if ($days === 0) return "¡Se estrena hoy! 🎬";
        if ($days === 1) return "Se estrena mañana 🎬";
        if ($days < 7) return "Se estrena esta semana 🎬";
        if ($days < 30) return "Se estrena este mes 🎬";
        return "Faltan $days días para el estreno 🎬";
    }

    #Crear desde la API
    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        #Obtener datos
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);

        #Crear objeto
        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"]['title'] ?? "Por confirmar",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
            $data["following_production"]['poster_url'] ?? null,
            $data["following_production"]['days_until'] ?? null,
            $data["following_production"]['release_date'] ?? null,
            $data["following_production"]['overview'] ?? null
        );
    }

    #Obtener todos los datos
    public function get_data(): array
    {
        return [
            'title' => $this->title,
            'days_until' => $this->days_until,
            'following_production' => $this->following_production,
            'release_date' => $this->release_date,
            'poster_url' => $this->poster_url,
            'overview' => $this->overview,
            'next_poster' => $this->next_poster,
            'next_days' => $this->next_days,
            'next_release' => $this->next_release,
            'next_overview' => $this->next_overview
        ];
    }
}