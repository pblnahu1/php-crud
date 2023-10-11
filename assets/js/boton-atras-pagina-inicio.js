history.pushState(null, null, './index.php')
window.addEventListener('popstate', function (event) {
    history.pushState(null, null, './index.php');
});

// Manipulacion del navegador en el evento volver atrás
// Una vez que hago click en el boton Cerrar Sesión, me redirije a la página del login. Y si el usuario apreta volver atrás, lo manda a la página de inicio (index.php), y si apreta de vuelta, no le permite volver a la pagina principal donde yo cerré la sesión.