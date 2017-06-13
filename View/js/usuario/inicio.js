$(document).ready(function () {
    $(".inputFecha").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0
    });
    var salida = new Date();
    salida.setDate(salida.getDate() + 2);

    $(".fechaEntradaPicker").datepicker("setDate", new Date());
    $(".fechaSalidaPicker").datepicker("setDate", salida);
});