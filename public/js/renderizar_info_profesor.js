$("#tag").change(function(event){
        $.get("/obtenerProfesor/"+event.target.value+"",function(response,profesor){
            console.log(response);
            $("#nombres").val(response.nom_prof);
            $("#apellido-materno").val(response.apeMaterno_prof);
            $("#apellido-paterno").val(response.apePaterno_prof);
            $("#sexo").val(response.sexo_prof);
            $("#fecha-nacimiento").val(response.fechaNac_prof);
            $("#domicilio").val(response.domicilio);
            $("#distrito").val(response.distritoDom_id);
            $("#estado").val(response.estado_prof);
            $("#dni").val(response.dni);
            $("#correo").val(response.correo);
            $("#idprof").val(response.id);
                    console.log("ASSDASD");

        });    
    
});