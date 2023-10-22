const boton_editar_linea = document.getElementById("editar_linea");

if (boton_editar_linea)
  boton_editar_linea.addEventListener("click", editarLinea);

function obtenerInputs() {
  const id_coche = document.getElementById("id_coche").value;
  const origen = document.getElementById("origen").value;
  const destino = document.getElementById("destino").value;
  const hora_salida = document.getElementById("hora_salida").value;
  const hora_llegada = document.getElementById("hora_llegada").value;
  const precio = document.getElementById("precio").value;

  return {
    id_coche,
    origen,
    destino,
    hora_salida,
    hora_llegada,
    precio,
  };
}

const validaciones = {
  required: validarRequerido,
  typeNumber: validarNumero,
};

/**
 *
 * @param {string} valor
 * @returns {boolean} validacion
 */
function validarRequerido(valor) {
  if (valor === undefined || valor === null || valor === "") return false;
  return true;
}

function validarNumero(valor) {
  const regex = new RegExp(/^(\d){0,}$/, "g");

  return regex.test(valor);
}

/**
 *
 * @param {string} mensaje
 */
function mostrarError(mensaje) {
  const texto_error = document.querySelector(".texto-error");
  texto_error.innerHTML = mensaje;
}

/**
 *
 * @param {Record<string, any>} datos
 */
function validarDatos(datos) {
  const { required, typeNumber } = validaciones;

  if (!required(datos.id_coche)) {
    mostrarError("El campo id_coche debe ser obligatorio");
    return false;
  }

  if (!typeNumber(datos.id_coche)) {
    mostrarError("El campo id_coche debe ser de tipo numerico");
    return false;
  }

  if (!required(datos.origen)) {
    mostrarError("El campo origen debe ser obligatorio");
    return false;
  }

  if (!required(datos.destino)) {
    mostrarError("El campo destino debe ser obligatorio");
    return false;
  }

  if (!required(datos.hora_salida)) {
    mostrarError("El campo hora salida debe ser obligatorio");
    return false;
  }

  if (!required(datos.hora_llegada)) {
    mostrarError("El campo hora llegada debe ser obligatorio");
    return false;
  }

  if (!required(datos.precio)) {
    mostrarError("El campo precio debe ser obligatorio");
    return false;
  }

  if (!typeNumber(datos.precio)) {
    mostrarError("El campo precio debe ser de tipo numerico");
    return false;
  }

  mostrarError("");
  return true;
}

async function editarLinea() {
  Swal.fire({
    title: "Se agrego la linea exitosamente",
    icon: "info",
  });
  const datos = obtenerInputs();

  const es_valido = validarDatos(datos);

  if (!es_valido) return false;

  try {
    const payload = new FormData();

    Object.entries(datos).forEach(([key, value]) => {
      payload.append(key, value);
    });

    const response = await fetch(
      "http://127.0.0.1:8000/viauy/index.php?c=Backoffice&m=editarLinea",
      {
        method: "POST",
        headers: {
          "Access-Control-Allow-Origin": "*",
        },
        body: payload,
      }
    );

    const respuestaJSON = await response.json();

    if (respuestaJSON.status === "true") {
      console.log("Se creo satifactoriamente");
    }
  } catch (error) {
    console.error(error);
  }
}
