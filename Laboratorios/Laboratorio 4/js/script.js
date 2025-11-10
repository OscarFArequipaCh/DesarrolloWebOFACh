// script.js (completo)
const principal = document.getElementById("principal");
const mensaje = document.getElementById("mensaje");

// --- Cargar contenido dinámico ---
async function cargarContenido(url) {
  try {
    const res = await fetch(url);
    if (!res.ok) throw new Error("Error HTTP " + res.status);
    principal.innerHTML = await res.text();
    mensaje.textContent = "✅ Contenido cargado desde: " + url;
  } catch (err) {
    console.error("Error al cargar contenido:", err);
    mensaje.textContent = "❌ Error al cargar contenido.";
  }
}

// --- Crear modal dinámico (overlay) ---
function crearModal(htmlInner) {
  // si ya existe, la reemplazamos
  let overlay = document.getElementById("overlay-modal-crud");
  if (!overlay) {
    overlay = document.createElement("div");
    overlay.id = "overlay-modal-crud";
    Object.assign(overlay.style, {
      position: "fixed",
      top: 0,
      left: 0,
      width: "100%",
      height: "100%",
      display: "flex",
      justifyContent: "center",
      alignItems: "center",
      background: "rgba(0,0,0,0.5)",
      zIndex: 9999
    });
    document.body.appendChild(overlay);
  }
  overlay.innerHTML = `
    <div style="background:white; border-radius:8px; padding:18px; min-width:320px; max-width:520px;">
      ${htmlInner}
    </div>
  `;

  // cancelar: cualquier elemento con id btn-cancelar-modal cerrará
  const cancelar = overlay.querySelector("#btn-cancelar-modal");
  if (cancelar) cancelar.addEventListener("click", cerrarModalCRUD);

  return overlay;
}

function cerrarModalCRUD() {
  const overlay = document.getElementById("overlay-modal-crud");
  if (overlay) overlay.remove();
}

// --- Delegación de eventos en #principal ---
principal.addEventListener("click", (e) => {
  const target = e.target;

  // Abrir formulario insertar si botón con clase .btn-insertar
  if (target.classList.contains("btn-insertar")) {
    e.preventDefault();
    abrirFormularioInsert();
    return;
  }

  if (target.classList.contains("btn-insertar-paciente")) {
    e.preventDefault();
    abrirFormularioInsertPaciente();
    return;
  }

  if (target.classList.contains("btn-editar-paciente")) {
    e.preventDefault();
    const id = target.getAttribute("data-id");
    if (id) editarPaciente(id);
    return;
  }

  if (target.classList.contains("btn-eliminar-paciente")) {
    e.preventDefault();
    eliminarPaciente();
    return;
  }

  // Editar - botón con clase .btn-editar y data-id
  if (target.classList.contains("btn-editar")) {
    e.preventDefault();
    const id = target.getAttribute("data-id");
    if (id) abrirFormularioEditar(id);
    return;
  }

  // Eliminar
  if (target.classList.contains("btn-eliminar")) {
    e.preventDefault();
    const id = target.getAttribute("data-id");
    if (id) eliminarMedico(id);
    return;
  }

  if (target.classList.contains("btn-insertar-cita")) {
    e.preventDefault();
    insertarCita();
  }

  if (target.classList.contains("btn-eliminar-cita")) {
    e.preventDefault();
    eliminarCita(target.dataset.id);
  }

  if (target.classList.contains("btn-editar-cita")) {
    e.preventDefault();
    editarCita(target.dataset.id);
  }
});

// --- Insertar ---
async function abrirFormularioInsert() {
  try {
    const res = await fetch("../crud/medicos/form-insert.html");
    const html = await res.text();
    const overlay = crearModal(html);

    const form = overlay.querySelector("#form-insertar");
    if (!form) return;

    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/medicos/insert.php", { method: "POST", body: fd });
      const txt = await r.text();
      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        // recargar la vista de medicos
        cargarContenido("../crud/medicos/medico.php");
      } else {
        alert("Error: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("No se pudo cargar el formulario de inserción.");
  }
}

// --- Editar ---
async function abrirFormularioEditar(id) {
  try {
    // 1) Cargar HTML del formulario
    const resForm = await fetch("../crud/medicos/form-update.html");
    const htmlForm = await resForm.text();

    // 2) Crear modal con el formulario
    const overlay = crearModal(htmlForm);
    const form = overlay.querySelector("#form-editar");
    if (!form) return;

    // 3) Pedir los datos del médico (GET -> JSON)
    const resData = await fetch(`../crud/medicos/update.php?id=${encodeURIComponent(id)}`);
    if (!resData.ok) throw new Error("No se pudo obtener los datos");
    const data = await resData.json();

    // 4) Rellenar el formulario
    form.querySelector("input[name='id']").value = data.id || "";
    form.querySelector("input[name='nombre']").value = data.nombre || "";
    form.querySelector("input[name='especialidad']").value = data.especialidad || "";
    form.querySelector("input[name='telefono']").value = data.telefono || "";
    form.querySelector("input[name='correo']").value = data.correo || "";

    // 5) Enviar actualización
    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/medicos/update.php", { method: "POST", body: fd });
      const txt = await r.text();
      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        cargarContenido("../crud/medicos/medico.php");
      } else {
        alert("Error actualizando: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("Error al abrir el formulario de edición.");
  }
}

// --- Eliminar ---
async function eliminarMedico(id) {
  if (!confirm("¿Seguro que deseas eliminar este médico?")) return;
  try {
    const r = await fetch(`../crud/medicos/delete.php?id=${encodeURIComponent(id)}`);
    const txt = await r.text();
    if (txt.trim() === "ok") {
      cargarContenido("../crud/medicos/medico.php");
    } else {
      alert("Error eliminando: " + txt);
    }
  } catch (err) {
    console.error(err);
    alert("Error al eliminar.");
  }
}

function cerrarModal() {
    // Cierra el modal de imágenes si existe
    const modalImagen = document.getElementById("modal");
    if (modalImagen && modalImagen.style.display === "block") {
        modalImagen.style.display = "none";
    }

    // Cierra y elimina el modal de formulario si existe
    const modalFormulario = document.querySelector(".modal");
    if (modalFormulario) {
        modalFormulario.remove(); // elimina el modal del DOM
    }

    // Elimina cualquier overlay oscuro que quede
    const overlay = document.querySelector(".overlay, .fondo, .modal-backdrop");
    if (overlay) {
        overlay.remove(); // quita el fondo bloqueante
    }

    // Restaura scroll o cualquier bloqueo del body
    document.body.style.overflow = "auto";
}


// funciones para pacientes
async function abrirFormularioInsertPaciente() {
  try {
    const res = await fetch("../crud/pacientes/form-insert.html");
    const html = await res.text();
    const overlay = crearModal(html);

    const form = overlay.querySelector("#form-insertar");
    if (!form) return;

    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/pacientes/insert.php", { method: "POST", body: fd });
      const txt = await r.text();
      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        // recargar la vista de pacientes
        cargarContenido("../crud/pacientes/paciente.php");
      } else {
        alert("Error: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("No se pudo cargar el formulario de inserción.");
  }
}

// --- Editar ---
async function editarPaciente(id) {
  try {
    // 1) Cargar HTML del formulario
    const resForm = await fetch("../crud/pacientes/form-update.html");
    const htmlForm = await resForm.text();

    // 2) Crear modal con el formulario
    const overlay = crearModal(htmlForm);
    const form = overlay.querySelector("#form-editar");
    if (!form) return;

    // 3) Pedir los datos del médico (GET -> JSON)
    const resData = await fetch(`../crud/pacientes/update.php?id=${encodeURIComponent(id)}`);
    if (!resData.ok) throw new Error("No se pudo obtener los datos");
    const data = await resData.json();

    // 4) Rellenar el formulario
    form.querySelector("input[name='id']").value = data.id || "";
    form.querySelector("input[name='nombre']").value = data.nombre || "";
    form.querySelector("input[name='documento']").value = data.documento || "";
    form.querySelector("input[name='telefono']").value = data.telefono || "";
    form.querySelector("input[name='correo']").value = data.correo || "";

    // 5) Enviar actualización
    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/pacientes/update.php", { method: "POST", body: fd });
      const txt = await r.text();
      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        cargarContenido("../crud/pacientes/paciente.php");
      } else {
        alert("Error actualizando: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("Error al abrir el formulario de edición.");
  }
}

// --- Eliminar ---
async function eliminarPaciente(id) {
  if (!confirm("¿Seguro que deseas eliminar este paciente?")) return;
  try {
    const r = await fetch(`../crud/pacientes/delete.php?id=${encodeURIComponent(id)}`);
    const txt = await r.text();
    if (txt.trim() === "ok") {
      cargarContenido("../crud/pacientes/paciente.php");
    } else {
      alert("Error eliminando: " + txt);
    }
  } catch (err) {
    console.error(err);
    alert("Error al eliminar.");
  }
}

// === CRUD CITAS ===

// Abrir formulario de inserción
async function insertarCita() {
  try {
    const res = await fetch("../crud/citas/form-insert.php");
    const html = await res.text();
    const overlay = crearModal(html);

    const form = overlay.querySelector("#form-insertar-cita");
    if (!form) return;

    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/citas/insert.php", { method: "POST", body: fd });
      const txt = await r.text();
      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        cargarContenido("../crud/citas/citas.php");
      } else {
        alert("Error: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("No se pudo cargar el formulario de citas.");
  }
}

// Eliminar cita
async function eliminarCita(id) {
  if (!confirm("¿Seguro que deseas eliminar esta cita?")) return;
  try {
    const r = await fetch(`../crud/citas/delete.php?id=${encodeURIComponent(id)}`);
    const txt = await r.text();
    if (txt.trim() === "ok") {
      cargarContenido("../crud/citas/citas.php");
    } else {
      alert("Error al eliminar: " + txt);
    }
  } catch (err) {
    console.error(err);
    alert("Error eliminando cita.");
  }
}

// Editar Cita
async function editarCita(id) {
  try {
    const res = await fetch(`../crud/citas/form-edit.php?id=${encodeURIComponent(id)}`);
    const html = await res.text();
    const overlay = crearModal(html);

    const form = overlay.querySelector("#form-editar-cita");
    if (!form) return;

    form.addEventListener("submit", async (ev) => {
      ev.preventDefault();
      const fd = new FormData(form);
      const r = await fetch("../crud/citas/update.php", { method: "POST", body: fd });
      const txt = await r.text();

      if (txt.trim() === "ok") {
        cerrarModalCRUD();
        cargarContenido("../crud/citas/citas.php");
      } else {
        alert("Error al actualizar: " + txt);
      }
    });
  } catch (err) {
    console.error(err);
    alert("No se pudo cargar el formulario de edición.");
  }
}

function cerrarSesion() {
    if (confirm("¿Deseas cerrar sesión?")) {
        window.location.href = "../authentication/logout.php"; // Ruta de logout.php
    }
}
