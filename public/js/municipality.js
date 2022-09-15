    // Funcion para consultar los municipios
    $("#departament").change(function () {
        consultMunicipality();
    });

    function consultMunicipality() {
        var data = {
            "departament" : $('#departament').val(),
        }
        var select = "";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/consultMunicipality",
            data: data,
            dataType: "json",
            success: function (response) {
                Object.keys(response['ciudades']).forEach(function (key){
                    select += '<option>'+response['ciudades'][key]+'</option>';
                });

                $('#municipality').html(select);
            }
        });
    }
