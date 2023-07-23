remove = (id, route, token) => {
    if (confirm('Deseja realmente excluir esta marca?')) {

        $.ajax({
                url: route,
                type: 'post',
                data: {
                    "id": id,
                    "_token": token
                },
                beforeSend: function() {
                    //                $("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(ret) {
                alert("Marca removida com sucesso!");
                window.location.reload(true);
            })
            .fail(function(jqXHR, textStatus, msg) {
                console.log(jqXHR, textStatus, msg);
            });
    }
}