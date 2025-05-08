function obtenerDepartamentos() {
    fetch("departamento.php")
        .then(response => {
            if (!response.ok) throw new Error("Error al obtener departamentos");
            return response.text();
        })
        .then(data => {
            document.querySelector('#departamento').innerHTML = data;
            document.querySelector('#provincia').innerHTML = '';
            document.querySelector('#municipio').innerHTML = '';
        })
        .catch(error => console.error("Fetch error:", error));
}

function obtenerProvincias() {
    const departamento_id = document.getElementById('departamento').value;
    fetch(`provincia.php?id=${departamento_id}`)
        .then(response => {
            if (!response.ok) throw new Error("Error al obtener provincias");
            return response.text();
        })
        .then(data => {
            document.querySelector('#provincia').innerHTML = data;
            document.querySelector('#municipio').innerHTML = '';
        })
        .catch(error => console.error("Fetch error:", error));
}

function obtenerMunicipios() {
    const provincia_id = document.getElementById('provincia').value;
    fetch(`municipio.php?id=${provincia_id}`)
        .then(response => {
            if (!response.ok) throw new Error("Error al obtener municipios");
            return response.text();
        })
        .then(data => {
            document.querySelector('#municipio').innerHTML = data;
        })
        .catch(error => console.error("Fetch error:", error));
}
