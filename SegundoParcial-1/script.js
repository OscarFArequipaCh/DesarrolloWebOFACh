function cargarContenido(){
    var ajax = new XMLHttpRequest();
    ajax.open("get", "galeria.php", true);
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200){
            document.querySelector("#contenido").innerHTML = ajax.responseText;
        }
    }
    ajax.setRequestHeader("Content-Tytpe","text/html;charset=utf-8");
    ajax.send();
}

function cargarFormReceta() {
    //var content = document.getElementById('contenido');
    fetch("form_receta.php").then(response => response.text()).then(data => {
        //content.innerHTML = data;
        modalForm(data)
    })
}

function insertarReceta(){
    var ajax = new XMLHttpRequest();
    var datos = new FormData(document.querySelector('#form-insert-receta'));
    ajax.open("post", "guardar_receta.php", true);
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200){
            document.querySelector("#contenido").innerHTML = ajax.responseText;
            cargarContenido();
            cerrarModalForm();
        }
    }
    ajax.send(datos);
}

function cargarFiltrador(){
    var content = document.getElementById('contenido');
    fetch("listar_recetas.php").then(response => response.text()).then(data => {
        content.innerHTML = data;
    })
}

function filtrar(){
    var idtipo = document.getElementById('idtiporeceta').value;
    var content = document.getElementById('contenido');
    fetch(`listar_recetas.php?idtiporeceta=${idtipo}`).then(response => response.text()).then(data => {
        content.innerHTML = data;
    })
}

function cargarTemas(){
    var content = document.getElementById('contenido');
    fetch("temas.html").then(response => response.text()).then(data => {
        content.innerHTML = data;
    })
}
function modal(id){
    console.log(id);
    var image = document.getElementById(id).src;
    console.log(image);
    document.getElementById("imagenModal").src = image;
    document.getElementById('modal').style.display = 'block';
}

function cerrarModal(){
    document.getElementById('modal').style.display = 'none';
}

function modalForm(data){
    document.getElementById('contenidoModal').innerHTML = data;
    document.getElementById('modal-formulario').style.display = 'block';
}

function cerrarModalForm(){
    document.getElementById('modal-formulario').style.display = 'none';
}