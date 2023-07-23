setModelos = (route, token) => {
    let id_marca = $('#id_marca option:selected').val();
    //    alert(id_marca);
    $.ajax({
        url: route,
        type: 'post',
        data: {
            "id_marca": id_marca,
            "_token": token
        },
        beforeSend: function () {
            //                $("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (ret) {
            $("#div-select-modelos").html(ret);
        })
        .fail(function (jqXHR, textStatus, msg) {
            console.log(jqXHR, textStatus, msg);
        });
}

remove = (id, route, token) => {
    if (confirm('Deseja realmente excluir este veiculo?')) {

        $.ajax({
            url: route,
            type: 'post',
            data: {
                "id": id,
                "_token": token
            },
            beforeSend: function () {
                //                $("#resultado").html("ENVIANDO...");
            }
        })
            .done(function (ret) {
                alert("Veiculo removido com sucesso!");
                window.location.reload(true);
            })
            .fail(function (jqXHR, textStatus, msg) {
                console.log(jqXHR, textStatus, msg);
            });
    }
}

removeFoto = (id, route, token) => {
    if (confirm('Deseja realmente excluir esta foto?')) {

        $.ajax({
            url: route,
            type: 'post',
            data: {
                "id": id,
                "_token": token
            },
            beforeSend: function () {
                //                $("#resultado").html("ENVIANDO...");
            }
        })
            .done(function (ret) {
                alert("Foto removida com sucesso!");
                window.location.reload(true);
            })
            .fail(function (jqXHR, textStatus, msg) {
                console.log(jqXHR, textStatus, msg);
            });
    }
}
