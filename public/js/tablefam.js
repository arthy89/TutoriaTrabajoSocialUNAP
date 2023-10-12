var listaFamilia = []; //array de familiares
var contador = 1; //contador para el id
var max_id = 1;

// if para evitar errores por si no existe ninguna ficha
if (ficha_act) {
    //guardamos la lista de familiares guardados anteriormente
    var listaActFamilia = JSON.parse(ficha_act.familia);

    // buscamos el mayor id de familia
    listaActFamilia.forEach(function (item) {
        if (item.id > contador) {
            max_id = item.id;
        }
    });

    contador = max_id + 1; //sumamos +1 al maximo id y asignamos al contador

    // Recorrer la lista de familares actuales y agregamos a "listaFamilia"
    listaActFamilia.forEach(function (item) {
        var elemento = {
            id: item.id,
            nombre: item.nombre,
            parentesco: item.parentesco,
            idioma: item.idioma,
            residencia: item.residencia,
            direccion: item.direccion,
            celular: item.celular,
            estado: item.estado,
        };

        // actualizar 'nombre' OTRA MANERA DE HACERLO PASO POR PASO
        // $('.tablebody').on('blur', '.nombre-input', function() {
        //     var _nombre_ = $(this).val();
        //     var id = $(this).data('id');

        //     // buscar el elemento en 'listaFamilia' para actualizar el campo 'nombre'
        //     listaFamilia.forEach(function(elemento) {
        //         if (elemento.id === id) {
        //             elemento.nombre = _nombre_;
        //             return false; // termina de iterar entre la lista 'listaFamilia'
        //         }
        //     });

        //     actualizarFormInput();
        //     console.log(listaFamilia);
        // });
        // actualizar 'nombre'

        // FORMA CORTA DE ACTUALIZAR
        // nombre
        var actualizarNombre = function () {
            // asignamos el valor del input actual al array con el elemento correspondiente
            var _nombre_ = $(this).val();
            elemento.nombre = _nombre_;
            actualizarFormInput();
            console.log(listaFamilia);
        };

        // familiar
        var actualizarFamiliar = function () {
            if ($(this).val() !== "") {
                var _parentesco_ = $(this).val();
                elemento.parentesco = _parentesco_;
                actualizarFormInput();
                console.log(listaFamilia);
            }
        };

        // idioma
        var actualizarIdioma = function () {
            if ($(this).val() !== "") {
                var _idioma_ = $(this).val();
                elemento.idioma = _idioma_;
                actualizarFormInput();
                console.log(listaFamilia);
            }
        };

        // residencia
        var actualizarResidencia = function () {
            if ($(this).val() !== "") {
                var _residencia_ = $(this).val();
                elemento.residencia = _residencia_;
                actualizarFormInput();
                console.log(listaFamilia);
            }
        };

        // direccion
        var actualizarDireccion = function () {
            if ($(this).val() !== "") {
                var _direccion_ = $(this).val();
                elemento.direccion = _direccion_;
                actualizarFormInput();
                console.log(listaFamilia);
            }
        };

        // celular
        var actualizarCelular = function () {
            var _celular_ = $(this).val();
            elemento.celular = _celular_;
            actualizarFormInput();
            console.log(listaFamilia);
        };

        // estado
        var actualizarEstado = function () {
            if ($(this).val() !== "") {
                var _estado_ = $(this).val();
                elemento.estado = _estado_;
                actualizarFormInput();
                console.log(listaFamilia);
            }
        };

        // evento blur en el input clase nombre-input con el data correspondiente al id del elemento
        $('.nombre-input[data-id="' + elemento.id + '"]').on(
            "blur",
            actualizarNombre
        );
        $('.parentesco-input[data-id="' + elemento.id + '"]').on(
            "change",
            actualizarFamiliar
        );
        $('.idioma-input[data-id="' + elemento.id + '"]').on(
            "change",
            actualizarIdioma
        );
        $('.residencia-input[data-id="' + elemento.id + '"]').on(
            "change",
            actualizarResidencia
        );
        $('.direccion-input[data-id="' + elemento.id + '"]').on(
            "change",
            actualizarDireccion
        );
        $('.celular-input[data-id="' + elemento.id + '"]').on(
            "blur",
            actualizarCelular
        );
        $('.estado-input[data-id="' + elemento.id + '"]').on(
            "change",
            actualizarEstado
        );

        // listamos el array incial con los elementos añadidos al 'listaFamilia' y actualizamos el input
        listaFamilia.push(elemento);
        actualizarFormInput();
    });

    // verificamos que el array se cargo correctamente si existe
    console.log(listaFamilia);
}

function agregarFamiliar() {
    // creamos el html para insertarlo en la tabla visual
    var familiarHtml = `
                    <tr>
                        <td>
                            <input type="text"
                                class="form-control form-control-border text-uppercase nombre-input">
                        </td>
                        <td>
                            <select class="form-control parentesco-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Padre</option>
                                <option value="2">Madre</option>
                                <option value="3">Abuelo(a)</option>
                                <option value="4">Hermano(a)</option>
                                <option value="5">Cónyuge</option>
                                <option value="6">Hijo(a)</option>
                                <option value="7">Tío(a)</option>
                                <option value="8">Primo(a)</option>
                                <option value="9">Sobrino(a)</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control idioma-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Español</option>
                                <option value="2">Quechua</option>
                                <option value="3">Aymara</option>
                            </select>
                        </td>
                        <td>
                            <input class="form-control form-control-border residencia-input text-uppercase"
                                type="text" placeholder="Dep-Prov-Ciu">
                        </td>
                        <td>
                            <input class="form-control form-control-border direccion-input text-uppercase" type="text" placeholder="Dir. de domicilio">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-border celular-input" onkeypress="validate()" inputmode="numeric" maxlength="9">
                        </td>
                        <td>
                            <select class="form-control estado-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Vivo</option>
                                <option value="2">Fallecido</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn bg-gradient-danger btn-sm" onclick="eliminarFamiliar(this)">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>
                `;

    // se agrega a la tabla visual de clase 'tablebody'
    $(".tablebody").append(familiarHtml);

    // creamos y agregamos elementos al array 'listaFamilia' - primero vacio porque se require el llenado por el usuario
    var familiar = {
        id: contador++,
        nombre: "",
        parentesco: "",
        idioma: "",
        residencia: "",
        direccion: "",
        celular: "",
        estado: "",
    };

    listaFamilia.push(familiar);
    actualizarFormInput();
    console.log(listaFamilia);

    // Actualizar los valores del array 'listaFamilia' segun corresponda

    // nombre
    $(".tablebody tr:last-child .nombre-input").on("blur", function () {
        var _nombre = $(this).val();
        familiar.nombre = _nombre;
        actualizarFormInput();
        console.log(listaFamilia);
    });

    // parentesco
    $(".tablebody tr:last-child .parentesco-input").change(function () {
        if ($(this).val() !== "") {
            var _parentesco = $(this).val();
            familiar.parentesco = _parentesco;
            actualizarFormInput();
            console.log(listaFamilia);
        }
    });

    // idioma
    $(".tablebody tr:last-child .idioma-input").change(function () {
        if ($(this).val() !== "") {
            var _idioma = $(this).val();
            familiar.idioma = _idioma;
            actualizarFormInput();
            console.log(listaFamilia);
        }
    });

    // residencia
    $(".tablebody tr:last-child .residencia-input").change(function () {
        if ($(this).val() !== "") {
            var _residencia = $(this).val();
            familiar.residencia = _residencia;
            actualizarFormInput();
            console.log(listaFamilia);
        }
    });

    // direccion
    $(".tablebody tr:last-child .direccion-input").change(function () {
        if ($(this).val() !== "") {
            var _direccion = $(this).val();
            familiar.direccion = _direccion;
            actualizarFormInput();
            console.log(listaFamilia);
        }
    });

    // celular
    $(".tablebody tr:last-child .celular-input").on("blur", function () {
        var _celular = $(this).val();
        familiar.celular = _celular;
        actualizarFormInput();
        console.log(listaFamilia);
    });

    // estado
    $(".tablebody tr:last-child .estado-input").change(function () {
        if ($(this).val() !== "") {
            var _estado = $(this).val();
            familiar.estado = _estado;
            actualizarFormInput();
            console.log(listaFamilia);
        }
    });
}

function eliminarFamiliar(btn) {
    var tr = $(btn).closest("tr");

    // obtener el indice del elemento a eliminar
    var index = $(btn).closest("tr").index();

    // eliminar el elemento del array
    listaFamilia.splice(index, 1);

    tr.remove();
    actualizarFormInput();
    console.log(listaFamilia);
}

function actualizarFormInput() {
    // logica para actualizar el input que sera mandado por el form
    $("#familiaInput").val(JSON.stringify(listaFamilia));
}
