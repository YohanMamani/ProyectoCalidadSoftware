<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Cetpro José Galvez</title>
    <link rel="stylesheet" type="text/css" href="/css/estilos-propios.css">


   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/custom-themes.css">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png" />

</head>


<body>
  
    <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
   
        @include('layouts/sidebar')

        <main class="page-content">

            @include('layouts/contenido_cabecera')
            
            @yield("contenido_principal")
            
            
    
        </main>
        <!-- page-content" -->
    </div>
   
    <!-- page-wrapper -->
    
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/jquery-1.12.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    

  <!--  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script src="/js/renderizar_select_grupo.js"></script>
    <script src="/js/renderizar_info_grupo.js"></script>
    <script src="/js/renderizar_info_profesor.js"></script>
    <script src="/js/renderizar_datos_generales_historial.js"></script>
    <script src="/js/renderizar_tabla_modulos.js"></script>
    <script src="/js/renderizar_select_grupo.js"></script>
    <script src="/js/renderizar_info_grupo.js"></script>
    <script src="/js/renderizar_info_profesor.js"></script>
    <script src="/js/renderizar_datos_generales_historial.js"></script>
    <script src="/js/renderizar_tabla_modulos.js"></script>
    <script src="/js/renderizar_info_alumno.js"></script>
    <script src="/js/pasar_modal.js"></script>
    <script type="text/javascript">

      $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var title = button.data('mytitle') 
      var cat_id = button.data('catid') 
      var modal = $(this)
      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


      $('#editopcion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var title = button.data('mytitle') 
      var cat_id = button.data('catid')
      var fpid = button.data('fpid') 
      var modal = $(this)
      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #fpid').val(fpid);
    })

      $('#editmodulo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var nombre = button.data('mytitle') 
      var cat_id = button.data('catid')
      var duracion = button.data('duracion') 
      var modal = $(this)
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #duracion').val(duracion);
    })      

      $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid') 
      console.log("cat_id");
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
    })
    </script>

@if (isset($confirmación)!=null)
<script>
    console.log("asdadsasd");
      $("#modal").modal();
</script>
@endif

</body>
</html>