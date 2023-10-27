const boton_editar_linea = document.getElementById("editar_linea");

if (boton_editar_linea)
  boton_editar_linea.addEventListener("click", agregarLinea);

cargarFiltros();

async function cargarFiltros() {
  const peticion = new FetchRequest("Backoffice", "obtenerFiltros");

  const { data } = await peticion.request();

  llenarServicios(data.servicios);
  llenarRutas(data.rutas);
}

function llenarRutas(rutas) {
  if (!rutas) return false;

  const selector_rutas = document.getElementById("rutas");
  selector_rutas.innerHTML = "<option value=''>SELECCIONAR</option>";

  rutas.forEach(function (ruta) {
    const opcion_nueva = document.createElement("option");
    opcion_nueva.value = ruta.id;
    opcion_nueva.innerText = ruta.nombre;

    selector_rutas.appendChild(opcion_nueva);
  });
}

function llenarServicios(servicios) {
  if (!servicios) return false;

  const selector_servicio = document.getElementById("servicios");
  selector_servicio.innerHTML = "<option value=''>SELECCIONAR</option>";

  servicios.forEach(function (servicio) {
    const opcion_nueva = document.createElement("option");
    opcion_nueva.value = servicio.id;
    opcion_nueva.innerText = servicio.nombre;

    selector_servicio.appendChild(opcion_nueva);
  });
}

function obtenerInputs() {
  const servicio = document.getElementById("servicios").value;
  const ruta = document.getElementById("rutas").value;
  const duracion = document.getElementById("duracion_viaje").value;
  const precio = document.getElementById("precio").value;

  return {
    servicio,
    ruta,
    duracion,
    precio,
  };
}
//#region utilidades
const validaciones = {
  required: validarRequerido,
  typeNumber: validarNumero,
  typeTime: validarTiempo,
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

function validarTiempo(valor) {
  const regex = new RegExp(/^(\d){2,2}:(\d){2,2}:(\d){2,2}$/, "g");

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
//#endregion

//#region peticion
/**
 *
 * @param {string} controlador nombre del controlador sin el postfijo _Controller
 * @param {string} accion Nombre de la funcion del controlador
 */
function FetchRequest(controlador, accion) {
  /** @private */
  this.baseURL = "http://127.0.0.1:8000/viauy/index.php";

  this.url = `${this.baseURL}?c=${controlador}&m=${accion}`;

  /** @private */
  this.body = null;

  /** @private */
  this.headers = {
    "Access-Control-Allow-Origin": "*",
  };

  /** @private */
  this.method = "GET";

  this.agregarEncabezado = function (key, value) {
    this.headers[key] = value;
  };

  this.establecerPayload = function (body) {
    this.body = body;
  };

  this.establecerMetodo = function (method) {
    this.method = method;
  };

  this.request = function () {
    let data = this;
    return new Promise(function (resolve, reject) {
      fetch(data.url, {
        method: data.method,
        headers: data.headers,
        body: data.body,
      }).then(function (response) {
        response
          .json()
          .then(function (jsonResponse) {
            resolve(jsonResponse);
          })
          .catch(function (error) {
            reject(error);
          });
      });
    });
  };
}
//#endregion
/**
 *
 * @param {Record<string, any>} datos
 */
function validarDatos(datos) {
  const { required, typeNumber, typeTime } = validaciones;

  if (!required(datos.servicio)) {
    mostrarError("El campo servicio debe ser obligatorio");
    return false;
  }

  if (!required(datos.ruta)) {
    mostrarError("El campo ruta debe ser obligatorio");
    return false;
  }

  if (!required(datos.duracion)) {
    mostrarError("El campo duracion debe ser obligatorio");
    return false;
  }

  if (!typeTime(datos.duracion)) {
    mostrarError("El campo duracion debe tener el formato HH:mm:ss");
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

async function agregarLinea() {
  const datos = obtenerInputs();
  console.log(datos);

  const es_valido = validarDatos(datos);

  if (!es_valido) return false;

  try {
    const payload = new FormData();

    Object.entries(datos).forEach(([key, value]) => {
      payload.append(key, value);
    });

    const peticion = new FetchRequest("Backoffice", "agregarLinea");
    peticion.establecerMetodo("POST");
    peticion.establecerPayload(payload);

    const respuesta = await peticion.request();

    if (respuesta.status !== "success") throw respuesta;

    Swal.fire({
      title: "Se agrego la linea exitosamente",
      icon: "success",
    });
  } catch (error) {
    console.error(error);
    Swal.fire({
      title: "Ha ocurrido un error al agregar la linea",
      icon: "error",
    });
  }
}
