</main>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function() {
    $('.datatable').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('[data-toggle="tooltip"]').tooltip()
  });

  function load_edit_modal(id, url) {
    $('#modal-edit').modal('show');
    $.get('modal/' + url + '.php?id=' + id, {}, function(response) {
      $('#modal-edit-content').html(response); // Inject HTML into target element
    });
  }

  $(document).on('click', ".button-edit", function(e) {
    e.preventDefault();
    let button = $(e.target); // Button that triggered the modal
    let id = button.data('id'); // Extract department_id from data-attribute
    let url = button.data('url'); // Extract department_id from data-attribute

    load_edit_modal(id, url);

  });
</script>
<footer class="footer">
  <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
</footer>

</body>

</html>