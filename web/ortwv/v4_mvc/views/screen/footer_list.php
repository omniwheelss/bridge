        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?=CONFIG::HOME_FOOTER_TITLE?> 	 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="./follow/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./follow/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./follow/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./follow/nprogress/nprogress.js"></script>
	<!-- daterangepicker -->
	<script type="text/javascript" src="./js/moment/moment.min.js"></script>
	<script type="text/javascript" src="./js/datepicker/daterangepicker_time.js"></script>
	
    <!-- Datatables -->
    <script src="./follow/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./follow/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./follow/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./follow/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./follow/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./follow/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./follow/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./follow/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./follow/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./follow/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./follow/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./follow/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="./follow/jszip/dist/jszip.min.js"></script>
    <script src="./follow/pdfmake/build/pdfmake.min.js"></script>
    <script src="./follow/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
  <!-- /datepicker -->
	<?php
		// Based on the date & Time format List will have both datetime and add will have only date
		if(isset($calendar_fields))
			echo $calendar_fields;
	?>
  <!-- /datepicker -->

    <!-- Datatables -->
    <script>
	
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
					
			<?php if (!isset($options)) { ?>
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdf",
                  className: "btn-sm",
                },
                {
                  extend: "print",
                  className: "btn-sm",
                },
			  <?php } ?>
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });

	  
    </script>
	
    <!-- /Datatables -->
  </body>
</html>