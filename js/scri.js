$(function() {
    // Inicializar el datepicker
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0, // Configurar la fecha mínima a la actual
        maxDate: '+3D', // Configurar la fecha máxima a 3 días a partir de la actual
        beforeShowDay: function(date) {
            var day = date.getDay(); // Obtener el día de la semana
            return [day < 6]; // Deshabilitar sábado y domingo
        },
        onSelect: function(selectedDate) {
            // Cuando se selecciona una fecha, habilitar las opciones de hora
            $("#hora").prop("disabled", false);

            // Obtener las horas disponibles para la fecha seleccionada y actualizar las opciones
            $.ajax({
                url: '../php/hora_posible.php', // Ruta al script PHP que obtiene las horas
                type: 'POST',
                data: { fecha: selectedDate },
                success: function(data) {
                    $("#hora").html(data);
                }
            });
        }
    });

    // Inicialmente deshabilitar las opciones de hora
    $("#hora").prop("disabled", true);
});

// Función para manejar el cambio en la selección de la hora
function handleHoraChange() {
    // Obtener el valor (ID) seleccionado
    var selectedId = $("#hora").val();
    console.log("ID de la hora seleccionada:", selectedId);

    // Otras acciones que desees realizar con el ID de la hora seleccionada
}