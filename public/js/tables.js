$(document).ready(function () {
    let current_datetime = new Date();

    let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate();

    // Data table
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text:      '<i class="fas fa-file-pdf fa-2x text-danger"></i>',
                download: 'open',
                titleAttr: 'PDF',
                orientation: 'landscape',
                title: $('#formulario').val(),
                exportOptions: {
                    columns: ':visible',
                },
                messageBottom: 'Documento generado el: '+ formatted_date,
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel fa-2x text-success"></i>',
                titleAttr: 'Excel',
                title:  $('#formulario').val(),
                exportOptions: {
                    columns: ':visible'
                },
                messageBottom: 'Documento generado el: '+ formatted_date
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns fa-2x text-info"></i>',
                titleAttr: 'Ocultar Columnas'
            }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        }
    });
});
