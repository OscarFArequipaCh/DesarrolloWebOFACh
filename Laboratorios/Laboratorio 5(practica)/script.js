function CargarMedicos() {
    fetch('medicos.php').then(response => {
        if (!response.ok) throw new Error('Error al obtener los medicos');
        return response.text();
    }).then(data => {
        document.getElementById("resultado").innerHTML = data;
    })
};

async function CargarPacientes() {
    try {
        const res = await fetch('pacientes.php');
        if (!res.ok) throw new Error('Error al obtener los pacientes');

        document.getElementById("resultado").innerHTML = await res.text();

        const btnInsert = document.getElementById("btn-insert-paciente");
        if (btnInsert) {
            btnInsert.onclick = () => CargarFormulario('form-insert-paciente.html');
        }

    } catch (err) {
        console.error(err);
    }
}

async function CargarFormulario(url) {
    const res = await fetch(url);
    document.getElementById("resultado").innerHTML = await res.text();
}

async function enviarFormulario(url, datos) {
    const cont = document.getElementById('resultado');
    const res = await fetch(url, { method: "POST", body: datos });

    cont.innerHTML = await res.text();  
    CargarPacientes();
}

function insertPaciente() {
    const datos = new FormData(document.querySelector('#form-insert-paciente'));
    enviarFormulario("insertarPaciente.php", datos);
}

function editPaciente() {
    const datos = new FormData(document.querySelector('#form-edit-paciente'));
    enviarFormulario("editarPaciente.php", datos);
}

async function formEditPaciente(id) {
    const res = await fetch(`form-edit-paciente.php?id=${id}`);
    document.getElementById('resultado').innerHTML = await res.text();
}

function deletePaciente(id) {
    fetch(`eliminarPaciente.php?id=${id}`)
        .then(r => r.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            CargarPacientes();
        });
}

function CargarCitas() {
    fetch('citas.php').then(response => {
        if (!response.ok) throw new Error('Error al obtener citas');
        return response.text();
    }).then(data =>{
        document.getElementById("resultado").innerHTML = data;
    })
};
