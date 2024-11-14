</div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>

<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../../dist/js/pages/dashboard.js"></script> -->
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
  document.addEventListener('DOMContentLoaded', function() {
    const logoutLink = document.querySelector('.logoutLink');

    if (logoutLink) {
      logoutLink.addEventListener('click', function(e) {
        e.preventDefault(); // Prevents the default action of the link

        swal({
          title: "Are you sure you want to logout?",
          text: "Logging out will end your session.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willLogout) => {
          if (willLogout) {
            // Redirect to logout page or perform logout action
            window.location.href = "../../logout.php";
          }
        });
      });
    }
  });


  function confirmDelete(departmentId) {
    swal({
      title: "Are you sure you want to delete this account?",
      text: "Once deleted, you will not be able to recover this record!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        // You can add the success message here after deletion if needed
        swal("Poof! Department has been deleted!", {
          icon: "success",
        }).then(() => {
          // Redirect to the delete script with the user ID
          window.location.href = 'delete_department.php?department_id=' + departmentId;
        });
      } else {
        swal("Department is safe!");
        // If canceling deletion, you might not need to perform any action here

      }
    });
  }


  // Script to handle opening the edit modal and passing the department_id
  $(document).ready(function() {
    $(document).on('click', ".delete", function(e) {
      e.preventDefault();
      let form = $(this).closest('form');
      swal({
        title: "Are you sure you want to continue?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((isConfirm) => {
        if (isConfirm) {
          console.log("Form submitting..."); // Check if this logs to console
          form.submit();
        }
      });
    });

    $(document).on('click', ".button-edit", function(e) {
      e.preventDefault();
      let button = $(e.target); // Button that triggered the modal
      let id = button.data('id'); // Extract department_id from data-attribute
      let url = button.data('url'); // Extract department_id from data-attribute

      load_edit_modal(id, url);

    });

    function load_edit_modal(id, url) {
      $('#modal-edit').modal('show');
      $.get('modal/' + url + '.php?id=' + id, {}, function(response) {
        $('#modal-edit-content').html(response); // Inject HTML into target element
      });
    }

    // $('#modal-edit').on('show.bs.modal', function(event) {
    //   var button = $(event.relatedTarget); // Button that triggered the modal
    //   var departmentId = button.data('department-id'); // Extract department_id from data-attribute
    //   var department = button.data('department'); // Extract department_id from data-attribute
    //   var modal = $(this);
    //   modal.find('.modal-body #department_id').val(departmentId); // Set the department_id in the modal form
    //   modal.find('.modal-body #department_course').val(department); // Set the department_id in the modal form
    // });
  });



  $(function() {
    $('.datatable').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>

</html>
<?php
if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [3])) {
  header("Location: ../pages/chair");
} else if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [5])) {
  header("Location: ../pages/student");
}
?>