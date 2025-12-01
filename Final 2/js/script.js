function cargarContent(abrir){
    var ajax = new XMLHttpRequest();
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200){
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.setRequestHeader("Content-Type","text/html; charset=utf-8");
    ajax.send();
}

function cargarcalificaciones(){
    var contenedor;
    contenedor = document.getElementById('contenido');
    fetch("editarcalificaciones.php").then(response => response.text()).then(data => 
        contenedor.innerHTML = data
    );
}

function actualizarCalificacion(){
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "registrarCalificacion.php", true);
    ajax.onreadystatechange() = function() {
        if(ajax.readyState == 4 && ajax.status == 200){
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send();
}