function CargarMedicos() {
    fetch('medicos.php').then(response => {
        if (!response.ok) throw new Error('Error al obtener los medicos');
        return response.text();
    }).then(data => {
        document.getElementById("resultado").innerHTML = data;

        const btnInsert = document.getElementById("btn-insert-medico");
        if (btnInsert) {
            btnInsert.onclick = () => CargarFormulario('form-insert-medico.html');
        }
    })
};

function insertMedico() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-insert-medico'));
    var contendor = document.getElementById('resultado');
    fetch("insertarMedico.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        contendor.innerHTML=data;
        mostrarExito('Medico Insertado Exitosamente');
        CargarMedicos();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function formEditMedico(id) {
    //let contendor = document.getElementById('resultado');
    fetch(`form-edit-medico.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        abrirModal(data,true)
    });
}

function editMedico() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-edit-medico'));
    //let contendor = document.getElementById('resultado');
    fetch("editarMedico.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarMedicos();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function deleteMedico(id) {
    //let contendor = document.getElementById('resultado');
    fetch(`eliminarMedico.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarMedicos();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
} 

function CargarPacientes() {
    fetch('pacientes.php').then(response => {
        if (!response.ok) throw new Error('Error al obtener los pacientes');
        return response.text();
    }).then(data => {
        document.getElementById("resultado").innerHTML = data;

        const btnInsert = document.getElementById("btn-insert-paciente");
        if (btnInsert) {
            btnInsert.onclick = () => CargarFormulario('form-insert-paciente.html');
        }
    })
};

function insertPaciente() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-insert-paciente'));
    var contendor = document.getElementById('resultado');
    fetch("insertarPaciente.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        contendor.innerHTML=data;
        mostrarExito('Paciente Insertado Exitosamente');
        CargarPacientes();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function formEditPaciente(id) {
    //let contendor = document.getElementById('resultado');
    fetch(`form-edit-paciente.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        abrirModal(data, true);
    });
}

function editPaciente() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-edit-paciente'));
    //let contendor = document.getElementById('resultado');
    fetch("editarPaciente.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarPacientes();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function deletePaciente(id) {
    //let contendor = document.getElementById('resultado');
    fetch(`eliminarPaciente.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarPacientes();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
} 

function CargarCitas() {
    fetch('citas.php').then(response => {
        if (!response.ok) throw new Error('Error al obtener citas');
        return response.text();
    }).then(data =>{
        document.getElementById("resultado").innerHTML = data;
        const btnInsert = document.getElementById("btn-insert-cita");
        if (btnInsert) {
            btnInsert.onclick = () => CargarFormulario('form-insert-cita.php');
        }
    })
};

function insertCita() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-insert-cita'));
    //var contendor = document.getElementById('resultado');
    fetch("insertarCitas.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarCitas();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function formEditCita(id) {
    //let contendor = document.getElementById('modal');
    fetch(`form-edit-cita.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        abrirModal(data, true);
    });
}

function editCita() {
    cerrarModal();
    var datos = new FormData(document.querySelector('#form-edit-cita'));
    //let contendor = document.getElementById('resultado');
    fetch("editarCita.php", {method:"POST", body:datos}).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarCitas();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
}

function deleteCita(id) {
    //let contendor = document.getElementById('resultado');
    fetch(`eliminarCita.php?id=${id}`).then(response => response.text()).then(data => {
        //contendor.innerHTML=data;
        mostrarExito(data);
        CargarCitas();
        setTimeout(function(){
            cerrarModal();
        }, 5000);
    });
} 

function CargarFormulario(url) {
    fetch(url).then(response => {
        if (!response.ok) throw new Error('Error al cargar formulario');
        return response.text();
    }).then(data => {
        //document.getElementById("resultado").innerHTML = data;
        abrirModal(data, true);
    })
}

function abrirModal(htmlContent, boton) {
    const modal = document.getElementById("modal");
    const overlay = document.getElementById("modal-overlay");
    //document.getElementById("buton-close").style.display = boton === false ? "none" : "block";
    document.getElementById("modal-close").style.display = boton === false ? "none" : "block";
    document.getElementById("modal-content").innerHTML = htmlContent;
    
    //document.getElementById("modal").style.display = "block";

    overlay.classList.remove("hidden");
    modal.classList.remove("hidden");

    setTimeout(() => {
        overlay.style.opacity = "1";
        modal.style.opacity = "1";
    }, 10);
}

function cerrarModal() {
    const modal = document.getElementById("modal");
    //document.getElementById("modal").style.display = "none";
    const overlay = document.getElementById("modal-overlay");

    // Fade-out
    overlay.style.opacity = "0";
    modal.style.opacity = "0";

    // Esperar a que termine la animación
    setTimeout(() => {
        overlay.classList.add("hidden");
        modal.classList.add("hidden");
    }, 300);
}

function mostrarExito(msg) {
    abrirModal(`<h3 style="color:green; font-size:20px;">✔ ${msg}</h3>`, false);
}

function mostrarError(msg) {
    abrirModal(`<h3 style="color:red;">✘ ${msg}</h3>`, false);
}