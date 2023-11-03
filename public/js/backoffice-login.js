/**
 * Funcion de arranque
 */
function bootstrapper() {
  const boton = document.getElementById("login_backoffice");
  boton.addEventListener("click", loginBackoffice);
}

bootstrapper();

/**
 *
 * @param {Record<string, any>} datos
 */
function validarDatos(datos) {
  const { required } = validaciones;

  if (!required(datos.email)) {
    mostrarError(".texto-error", "El campo email es obligatorio.");
    return false;
  }

  if (!required(datos.password)) {
    mostrarError(".texto-error", "El campo contraseña es obligatorio.");
    return false;
  }

  mostrarError(".texto-error", "");
  return true;
}

function obtenerDatos() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  return {
    email,
    password,
  };
}

async function loginBackoffice(evento) {
  evento.preventDefault();
  const datos = obtenerDatos();

  const es_valido = validarDatos(datos);

  if (!es_valido) return false;

  const payload = new FormData();
  payload.append("email", datos.email);
  payload.append("password", datos.password);

  try {
    const peticion = new FetchRequest("Login", "loginBackoffice");
    peticion.establecerMetodo("POST");
    peticion.establecerPayload(payload);

    const respuesta = await peticion.request();

    if (respuesta.status !== "success")
      throw "El usuario o contraseña son incorrectos.";

    window.location.href = `${BASE_URL}?c=Backoffice&m=backoffice_editar`;
  } catch (error) {
    Swal.fire({
      title: "Ha ocurrido un error",
      message: error,
    });
  }
}
