document.addEventListener("DOMContentLoaded", () => {
  const lista = document.getElementById("lista");
  const form = document.getElementById("formUsuario");

  // Simulamos datos (hasta que tengas PHP funcionando)
  let usuarios = [
    { id: 1, nombre: "Juan", correo: "juan@mail.com" },
    { id: 2, nombre: "Ana", correo: "ana@mail.com" }
  ];

  // Renderizar usuarios
  function renderUsuarios() {
    lista.innerHTML = "";
    usuarios.forEach(u => {
      const li = document.createElement("li");
      li.textContent = `${u.id} - ${u.nombre} (${u.correo})`;
      lista.appendChild(li);
    });
  }

  renderUsuarios();

  // Manejo del formulario
  form.addEventListener("submit", e => {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;

    const nuevo = {
      id: usuarios.length + 1,
      nombre,
      correo
    };

    usuarios.push(nuevo);
    renderUsuarios();

    form.reset();
  });
});
