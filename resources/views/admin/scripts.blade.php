{{-- js --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<script>
	$(document).ready(function() {
		$('#registro').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'colvis',				
				'copy', {
					extend: 'csvHtml5',
					title: 'Registrados',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Registrados_<?php echo date('YmdHis'); ?>'
					}
				}, {
					extend: 'excelHtml5',
					title: 'Registrados',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Registrados_<?php echo date('YmdHis'); ?>'
					}
				}/*, {
					extend: 'pdfHtml5',
					title: 'Registrados',
					orientation: 'landscape',
					pageSize: 'TABLOID',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Registrados_<?php echo date('YmdHis'); ?>'
					}
				}*/, 'print'
			],
			"procesing": true,
			"serverside": true,
			"stripeClasses": [],
			responsive: true,
			"pageLength": 10,
			language: {
				url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
			}

		});

		$('#verificado').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'colvis',
				'copy', {
					extend: 'csvHtml5',
					title: 'Verificados',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Verificados_<?php echo date('YmdHis'); ?>'
					}
				}, {
					extend: 'excelHtml5',
					title: 'Verificados',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Verificados_<?php echo date('YmdHis'); ?>'
					}
				}/*, {
					extend: 'pdfHtml5',
					title: 'Verificados',
					filename: function() {
						var d = new Date();
						var n = d.getTime();
						return 'Verificados_<?php echo date('YmdHis'); ?>'
					}
				}*/, 'print',
			],
			
			"procesing": true,
			"stripeClasses": [],
			"serverside": true,
			responsive: true,
			"pageLength": 10,
			language: {
				url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
			}

		});


	});

	$(window).on("load", function() {
		$('.z').change(function() {
			var id = $(this).parents('#selectboxx').attr('data-id');
			var valor = $(this).val();
			if (valor == 'Otro') {
				$('#div_otro_motivo' + id).css("display", "block");;
			} else {
				$('#div_otro_motivo' + id).css("display", "none");;
			}
			

		});
		
	});

	/*$(document).ready(function() {
		$('#motivo').change(function() {
			var valor = $(this).val();
			if (valor == 'Otro') {
				$('#div_otro_motivo').show();
			} else {
				$('#div_otro_motivo').hide();
			}

		})
		$('#div_otro_motivo').hide();
		$("#motivo").bind("change", function() {}).change();
	})*/
</script>