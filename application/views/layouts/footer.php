		</div>

		<div class="footer-wrap pd-20 mb-20 card-box">
			Developer Assignment by Feiruz Mei Putra - 2021
		</div>
			
		<!-- js -->
		<script src="<?= base_url('assets/') ?>vendors/scripts/core.js"></script>
		<script src="<?= base_url('assets/') ?>vendors/scripts/script.min.js"></script>
		<script src="<?= base_url('assets/') ?>vendors/scripts/process.js"></script>
		<script src="<?= base_url('assets/') ?>vendors/scripts/layout-settings.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="<?= base_url('assets/') ?>vendors/scripts/datatable-setting.js"></script></body>

		<!-- add sweet alert js & css in footer -->
		<script src="<?= base_url('assets/'); ?>/src/plugins/sweetalert2/sweetalert2.all.js"></script>
		<script src="<?= base_url('assets/'); ?>/src/plugins/sweetalert2/sweet-alert.init.js"></script>

		<script>
		  $(function () {
		    $("#example1").DataTable();
		    $('#example2').DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": false,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false,
		    });
		  });
		</script>

		<style type="text/css">
			/*.halaman {
				zoom: 75%;
			}*/
		</style>

	</body>

	<?php
		if ($this->session->flashdata('tipe') == '1') {
			echo "
				<script type=\"text/javascript\">
				swal(
						{
							title: '".$this->session->flashdata('message')."',
							position: 'mid',
							type: 'warning',
							showConfirmButton: true,
							timer : 5000
						}
					)
				</script>";
		}else if ($this->session->flashdata('tipe') == '2') {
			echo "
				<script type=\"text/javascript\">
				swal(
						{
							title: '".$this->session->flashdata('message')."',
							position: 'mid',
							type: 'success',
							showConfirmButton: false,
							timer : 5000
						}
					)
				</script>";
		}
	?>
</html>