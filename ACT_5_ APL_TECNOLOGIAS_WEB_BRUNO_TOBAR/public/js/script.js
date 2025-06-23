$(document).ready(function () {
    $('#agregar').click(function () {
        const texto = $('#nuevaTarea').val().trim();
        if (texto !== '') {
            const nuevaTarea = `
                <li class="list-group-item d-flex justify-content-between align-items-center tarea">
                    <span class="texto">${texto}</span>
                    <input type="text" class="form-control editarTexto me-2" style="display:none; width:auto;">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-warning editar">Editar</button>
                        <button class="btn btn-sm btn-success actualizar" style="display:none;">Actualizar</button>
                        <button class="btn btn-sm btn-secondary completar">Completar</button>
                        <button class="btn btn-sm btn-danger eliminar">Eliminar</button>
                    </div>
                </li>
            `;
            $('#listaTareas').append(nuevaTarea);
            $('#nuevaTarea').val('');
            $('.mensaje').fadeIn().delay(1000).fadeOut();

            asignarEventos(); 
        }
    });

    $('#vaciarLista').click(function () {
        $('#listaTareas').empty();
    });

    function asignarEventos() {
        $('.completar').off('click').click(function () {
            $(this).parent().siblings('.texto').toggleClass('completada');
        });

        $('.eliminar').off('click').click(function () {
            $(this).parent().parent().remove();
        });

        $('.editar').off('click').click(function () {
            var li = $(this).parent().parent();
            var texto = li.find('.texto').text();
            li.find('.editarTexto').val(texto).show();
            li.find('.texto').hide();
            $(this).hide();
            li.find('.actualizar').show();
        });

        $('.actualizar').off('click').click(function () {
            var li = $(this).parent().parent();
            var nuevoTexto = li.find('.editarTexto').val().trim();
            if (nuevoTexto !== '') {
                li.find('.texto').text(nuevoTexto).show();
            }
            li.find('.editarTexto').hide();
            $(this).hide();
            li.find('.editar').show();
        });
    }
});
