const btnCerrar = document.getElementById('cerrar');
const divContenido = document.querySelector('.div-boton-cerrar, .div-error-sesion');

btnCerrar.addEventListener('click', function () {
    divContenido.style.display = 'none';
})