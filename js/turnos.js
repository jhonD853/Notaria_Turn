let ultimaActualizacion = 0;

function mostrarTurnosPasados() {
    // Realizar una solicitud AJAX para obtener los turnos pasados desde la base de datos
    $.ajax({
        url: 'php/obtener_turnos_pasados.php',
        type: 'GET',
        success: function(data) {
            // Mostrar los turnos pasados en la interfaz, omitiendo el turno actual
            const turnoActual = $('#turnoActual').text();
            $('#turnosPasados').html(data.replace(turnoActual, ''));

            ultimaActualizacion = new Date().getTime(); // Actualizar el tiempo de la última actualización
        },
        error: function() {
            // Manejar errores de la solicitud AJAX
            console.error('Error al obtener los turnos pasados.');
        }
    });
}

function mostrarTurnoActual() {
    // Realizar una solicitud AJAX para obtener el turno actual desde la base de datos
    $.ajax({
        url: 'php/obtener_turno_actual.php',
        type: 'GET',
        success: function(data) {
            // Mostrar el turno actual solo si ha cambiado desde la última actualización
            const turnoAnterior = $('#turnoActual').text();
            if (data !== turnoAnterior) {
                $('#turnoActual').text(data);
                ultimaActualizacion = new Date().getTime(); // Actualizar el tiempo de la última actualización
            }
        },
        error: function() {
            // Manejar errores de la solicitud AJAX
            console.error('NULL.');
        }
    });
}

// Función para marcar el turno actual como atendido
function marcarTurnoAtendido() {
    const idTurnoActual = $('#turnoActual').data('id'); // Asegúrate de asignar un atributo data-id en tu HTML
    if (idTurnoActual) {
        // Realizar una solicitud AJAX para marcar el turno como atendido
        $.ajax({
            url: 'php/marcar_turno_atendido.php',
            type: 'POST',
            data: { idTurno: idTurnoActual },
            success: function(data) {
                // Actualizar los turnos después de marcar como atendido
                mostrarTurnosPasados();
                mostrarTurnoActual();
            },
            error: function() {
                // Manejar errores de la solicitud AJAX
                console.error('Error al marcar el turno como atendido.');
            }
        });
    }
}

// Mostrar los turnos pasados y el turno actual al cargar la página
mostrarTurnosPasados();
mostrarTurnoActual();

// Actualizar dinámicamente cada 5 segundos
setInterval(function() {
    const ahora = new Date().getTime();
    const tiempoTranscurrido = ahora - ultimaActualizacion;

    if (tiempoTranscurrido >= 600000) { // 600000 milisegundos = 10 minutos
        // Mostrar "Sin turnos de espera" si han pasado 10 minutos sin actualizaciones
        $('#turnosPasados').html('<div>Sin turnos de espera</div>');
        $('#turnoActual').text('Sin turnos de espera');
    } else {
        // Actualizar los turnos si han pasado menos de 10 minutos
        mostrarTurnosPasados();
        mostrarTurnoActual();
    }
}, 5000);
