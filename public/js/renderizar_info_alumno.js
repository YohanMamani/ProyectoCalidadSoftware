$("#tags").change(function(event){
        $.get("/obtenerAlumno/"+event.target.value+"",function(response,alumno){
            console.log(response);
            console.log("sassdfssdf");
            console.log(response.nombres);
            $("#nombres").val(response.nombres);
            $("#apellido-materno").val(response.apeMaterno);
            $("#apellido-paterno").val(response.apePaterno);
            $("#sexo").val(response.sexo);
            $("#fecha-nacimiento").val(response.fnacimiento);
            $("#domicilio").val(response.domicilio);
            $("#distrito").val(response.distrito_id);
            $("#estado").val(response.estado_alumno);
            $("#dni").val(response.dni);
            $("#correo").val(response.correo);
        });    
    
});