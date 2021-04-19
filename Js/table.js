var contador = 1;
var usuarios = new Array();

for (var i = 0; i < 3; i++) {
    var objG = {
        id: 12 + i,
        nit: 234567 + i,
        nombre: "Grafschrei" + i,
        direccion: "Cll 72 # 15 -8 " + i,
        telefono: 4607856 + i,
    };
    usuarios.push(objG);
}

//usuarios[usuarios.length] = objG;

$(document).ready(function () {
    $("#nuevo-usuario").on("click", function () {
        if (contador === 1) {
            removerAlerts();
        }

        if (validarNuevoUsuario()) {
            alert("entro");
            addUsuario();
            actualizarTabla();
            contador++;
            $("#modalNuevoUsuario").modal("hide");
            document.getElementById("form-nu").reset();
        }
    });
    actualizarTabla();
});
function leerDatosNuevoUsuario() {
    var obj = {
        id: $("#form-nu #txt-id-u").val().trim(),
        nit: $("#txt-nit-u").val().trim(),
        nombre: $("#txt-nombres-u").val().trim(),
        direccion: $("#txt-direccion-u").val().trim(),
        telefono: $("#txt-telefono-u").val().trim(),
    };
    return obj;
}

function addUsuario() {
    alert("en");
    var obj = leerDatosNuevoUsuario();
    usuarios.push(obj);
}

function actualizarTabla() {
    $("#tbl-usuarios>tbody").html("");
    for (var i = 0; i < usuarios.length; i++) {
        var obj = usuarios[i];
        var html =
            "" +
            "<tr>" +
            "<td>" +
            obj.id +
            "</td>" +
            "<td>" +
            obj.nit +
            "</td>" +
            "<td>" +
            obj.nombre +
            "</td>" +
            "<td>" +
            obj.direccion +
            "</td>" +
            "<td>" +
            obj.telefono +
            "</td>" +
            "<td>" +
            '<a id="btn-ver-' +
            i +
            '" class="btn btn-success"  data-toggle="modal" data-target="#modalDetalle"><i class="fa fa-edit"></i> </a>' +
            '<a id="btn-eliminar-' +
            i +
            '"style="margin-left: 10px" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
            "</td>" +
            "</tr>";
        $("#tbl-usuarios>tbody").append(html);
        addEvtEliminar(i);
        addEvtVer(i);
    }
}

function addEvtEliminar(i) {
    $("#btn-eliminar-" + i).click(function () {
        var usuario = usuarios[i];
        //var ii = $(this).attr("id").replace("btn-eliminar-", "");
        var rta = confirm(
            "¿Está seguro de eliminar a " +
            usuario.nombre +
            "?"
        );
        if (rta) {
            usuarios.splice(i, 1);
            actualizarTabla();
        }
    });
}

function addEvtVer(i) {
    $("#btn-ver-" + i).click(function () {
        var usuario = usuarios[i];
        var htmlModal = $("#modalDetalle .modal-body").html();
        //alert(htmlModal);
        htmlModal = htmlModal.replace("#nombres#", usuario.nombres);
        htmlModal = htmlModal.replace("#apellidos#", usuario.apellidos);
        htmlModal = htmlModal.replace("#telefono#", usuario.telefono);
        htmlModal = htmlModal.replace("#email#", usuario.email);
        htmlModal = htmlModal.replace("#cedula#", usuario.cedula);
        //alert(htmlModal);
        $("#modalDetalle .modal-body").html(htmlModal);
    });
}

function getMensajeValidacion(mensaje) {
    var html =
        '<div class="alert alert-success">' +
        mensaje +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        "</button>" +
        "</div>";
    return html;
}

function validarNuevoUsuario() {
    var vali = true;
    var nuevoUsuario = leerDatosNuevoUsuario();
    var id2 = nuevoUsuario.id.split(" ");
    removerAlerts();

    if (
        nuevoUsuario.id === null ||
        nuevoUsuario.id.length === 0 ||
        nuevoUsuario.id === ""
    ) {
        var mensajeHtml = getMensajeValidacion("El campo id no puede estar vacio");
        $("#txt-usuario-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (id2.length >= 2) {
        var mensajeHtml = getMensajeValidacion(
            "El campo no puede ser mas de dos palabras"
        );
        $("#txt-usuario-u").parent(".form-group").append(mensajeHtml);
    }
    if (
        nuevoUsuario.nit === null ||
        nuevoUsuario.nit.length === 0 ||
        nuevoUsuario.nit === ""
    ) {
        var mensajeHtml = getMensajeValidacion("El campo nit no puede estar vacio");
        $("#txt-nombres-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (
        nuevoUsuario.nombre === null ||
        nuevoUsuario.nombre.length === 0 ||
        nuevoUsuario.nombre === ""
    ) {
        var mensajeHtml = getMensajeValidacion(
            "El campo nombre no puede estar vacio"
        );
        $("#txt-apellidos").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (
        nuevoUsuario.direccion === null ||
        nuevoUsuario.direccion.length === 0 ||
        nuevoUsuario.direccion === ""
    ) {
        var mensajeHtml = getMensajeValidacion(
            "El campo dirección no puede estar vacio"
        );
        $("#txt-telefono-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (
        nuevoUsuario.telefono === null ||
        nuevoUsuario.telefono.length === 0 ||
        nuevoUsuario.telefono === ""
    ) {
        var mensajeHtml = getMensajeValidacion(
            "El campo telefono no puede estar vacio"
        );
        $("#txt-email-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }

    return vali;
}

function removerAlerts() {
    $("#form-nu .alert").remove();
}
