$(document).ready(function () {
    $('#datatable tfoot th').each(function () {
        var title = $(this).text();
        if(title != ''){
            $(this).html('<input type="text" class="form-control" placeholder="Buscar" />');
        }
    });
    table = $('#datatable').DataTable({
        responsive: true,
        columnDefs: [
            {orderable: false, targets: -1}
        ],
        "language": {
            "info": "Mostrando _START_ a _END_ de _TOTAL_ items filtrados",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ items",
            "search": "Buscar:",
            "infoFiltered": "(de un total de _MAX_ items)",
        }
    });
    // Apply the search
    table.columns().every(function () {
        var self = this;
        $('input', this.footer()).on('keyup change', function () {
            if (self.search() !== this.value) {
                self.search(this.value).draw();
            }
        });
    });
    $('#datatable tfoot tr').appendTo('#datatable thead');
    stopLoading();
});

function stopLoading() {
    $('.loader').fadeOut(800);
    setTimeout(function() {
		$('.content-loading').hide();
		$('.content-loading').css('visibility', 'visible');
		$('.content-loading').fadeIn(500);
	}, 400);
}