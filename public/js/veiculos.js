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