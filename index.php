<?php

#Carga los archivos esenciales
require_once 'consts.php';

require_once 'functions.php';

require_once 'classes/NextMovie.php';

#Obtener datos de la película desde la API
$next_movie = NextMovie::fetch_and_create_movie(API_URL);

#Obtiene y prepara los datos de la pelicula
$next_movie_data = $next_movie->get_data();
?>

<?php

#renderiza la cabecera de la página con el título de la peícula
render_template('head', ["title" => $next_movie_data["title"]]);

#renderiza el contenido principal de la página
render_template('main', array_merge(
    $next_movie_data, #datos generales de la película
    ["until_message" => $next_movie->get_until_message()] #muestra el mensaje con el tiempo restante
));
?>