<script>
    $('#preview').attr('src', '/codliveditor/lienzo/ver/render/document/');
    let ambit, resul;
    leer();
    $('#agregartheme').click(function () {
        agregar();
    });
    $('#vertheme').click(function () {
        verpdf();
    });

    function leer() {
        $.ajax({
                url: " /codliveditor/bd",
                data: "",
                method: "get",
                success: function (result) {
                    console.log('fue exitoso traer los nombres');
                    $("#listtheme").empty();

                    $("#listtheme").append('<option value="emptyval"></option>');
                    console.log(result);
                    for (let a = 0; a < result.length; a++) {
                        $("#listtheme").append("<option value='" + a + "' >" + result[a]['nombreTemplate'] + "</option>");
                    }
                    $('#listtheme').on('change', function () {
                        cambios($(this), result);
                    });
                },
                error: function (result) {
                    console.log(result);
                    $("#listtheme").append('<option value="">Error</option>');
                },
                beforeSend: function () {
                    console.log("cargando ...");
                    $("#listtheme").empty();
                }
            }
        );
    }

    function cambios(ambit, resul) {
        if ($('#listtheme').val() != "emptyval") {
            $('#agregartheme').prop('disabled', true);
            $('#actualizartheme').prop('disabled', false);
            $('#eliminartheme').prop('disabled', false);
            $('#vertheme').prop('disabled', false);
            $('#guardarvista').prop('disabled', false);

            $("#nombreva").attr("value", resul[ambit.val()]['nombreTemplate']);
            $("#css").html(resul[ambit.val()]['css']);
            $("#html").html(resul[ambit.val()]['html']);
            $("#js").html(resul[ambit.val()]['js']);
            $("#actualizartheme").click(function () {
                Actualizar(resul);
            });
            $("#guardarvista").click(function () {
                guardarvista(resul)
            });
        } else {
            $('#agregartheme').prop('disabled', false);
            $('#actualizartheme').prop('disabled', true);
            $('#eliminartheme').prop('disabled', true);
            $('#vertheme').prop('disabled', true);
            $('#guardarvista').prop('disabled', true);

            $("#nombreva").attr("value", " ");
            $("#css").html("");
            $("#html").html("");
            $("#js").html("");
        }
    }

    function agregar() {
        var dato = $('#tokenid').val();
        var paramet = {
            '_token': dato
        };
        paramet['nombre'] = $('#nombreva').val();
        paramet['css'] = $('#css').val();
        paramet['html'] = $('#html').val();
        paramet['js'] = $('#js').val();
        $.ajax({
            url: "/codliveditor/bd",
            dataType: "json",
            data: paramet,
            method: "post",
            success: function (result) {
                console.log(result);
                console.log('Si agrego correctamente');
                leer();
            }, error: function (result) {
                console.log('No agrego correctamente');
                console.log(result);
                leer();
            }, beforeSend: function () {
                console.log("cargando ...");
            }
        });
    }

    function Actualizar(resul) {
        var dato = $('#tokenid').val();
        var paramet = {
            '_token': dato,
            '_method': 'put'
        };
        // Busqueda de notas credito
        paramet['nombre'] = $('#nombreva').val();
        paramet['css'] = $('#css').val();
        paramet['html'] = $('#html').val();
        paramet['js'] = $('#js').val();
        $.ajax({
            url: "/codliveditor/bd/" + resul[$('#listtheme').val()]['id'],
            dataType: "json",
            data: paramet,
            method: "put",
            success: function (result) {
                leer();
            },
            error: function (result) {
                console.log(result);
            },
            beforeSend: function () {
                console.log("cargando ...");
            }
        });
    }

    function guardarvista(resul) {
        $.ajax({
            url: "/codliveditor/lienzo/" + resul[$('#listtheme').val()]['id'],
            dataType: "json",
            data: '',
            method: "get",
            success: function (result) {
                console.log(result);
            },
            error: function (result) {
                console.log(result);
            },
            beforeSend: function () {
                console.log("cargando ...");
            }
        });
    }

    function verpdf() {
        var dato = $('#tokenid').val();
        var paramet = {
            '_token': dato
        };
        paramet['nombre'] = $('#nombreva').val();
        paramet['css'] = $('#css').val();
        paramet['html'] = $('#html').val();
        paramet['js'] = $('#js').val();
        $.ajax({
            url: "/codliveditor/lienzo/ver/pdf",
            dataType: "json",
            data: paramet,
            method: "post",
            success: function (result) {
                console.log("Funciono");
                console.log(result);
                window.open(result, 'Download');

            }, error: function (result) {
                console.log("No Funciono");
                console.log(result);

            }, beforeSend: function () {
                console.log("descargando ...");
            }
        });
    }
</script>
