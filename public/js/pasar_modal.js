  $('delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid') 
      console.log("JJJIJJ");
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
})