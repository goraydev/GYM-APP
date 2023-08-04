$(document).ready(function () {
    $('#select_subdep').on('change', function () {
        let id = $(this).val();
        $('#select_conv').empty();
        $('#select_conv').append('<option value="0" disabled selected>Procesando...</option>');

        //solicitud ajax
        $.ajax({
            type: 'GET',
            url: 'GetSubdependencia/' + id,
            success: function (response) {
                console.log(response);
                $('#select_conv').empty();
                response.forEach(element => {
                    $('#select_conv').append('<option value=' + element.id + '>' + element.nombre + '</option>');
                });
            }
            
        });
    });
});
