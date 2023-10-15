$(document).ready(function() {
    //ajax para editar dados do usuario
    $("#FormDados").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'crud/updateDados.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    M.toast({
                        html: '<i class="material-icons">check</i>&nbsp' + data.mensagem,
                        classes: 'light-green darken-2'
                    });
                } else if (data.status === 'error') {
                    M.toast({
                        html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
                        classes: 'lime darken-4'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Manipule erros de comunicação com o servidor aqui
                console.error(xhr);
                console.error(status);
                console.error(error);
                M.toast({
                    html: '<i class="material-icons">error</i>&nbspErro de comunicação com o servidor',
                    classes: 'red darken-2'
                });
            }
        });
    });

   
});