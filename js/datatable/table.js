/**
 * Crea una tabla de datos.
 *
 * @param {type} idTable - Identificador de la tabla.
 * @param {type} titulo - Titulo de la tabla.
 * @param {type} columnsSearch - Columnas en las que se puede buscar.
 */
function createDataTable(
  idTable,
  title,
  columnsSearch,
  orientation = 'portrait',
  searchingOpt = true,
  paginationOpt = true,
  lengthChangeOpt = true,
  paginateOpt = true,
  infoOpt = true,
) {
  const tabla = document.getElementById(idTable);
  let titulo = title;
  const dataTable = new DataTable(tabla, {
    layout: {
      top: 'buttons',
      topStart: 'pageLength',
      topEnd: 'search',
      bottomStart: 'paging',
      bottomEnd: 'info',
    },
    columnDefs: [
      {
        targets: columnsSearch, // Solo buscar en la tercera columna
        searchable: true,
      },
      {
        targets: '_all', // Resto de las columnas
        searchable: false,
        orderable: false,
        orderData: false,
      },
    ],
    lengthMenu: [17, 34, 51, 68, 85],
    language: {
      search: 'Buscar',
      searchPlaceholder: 'Buscar...',
      info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      infoEmpty: 'Mostrando 0 a 0 de 0 registros',
      paginate: {
        previous: 'Anterior',
        next: 'Siguiente',
      },
      lengthMenu: 'Mostrar _MENU_ registros',
      zeroRecords: 'No se encontraron resultados',
      infoFiltered: '(filtrado de _MAX_ registros totales)',
      emptyTable: 'No hay registros para mostrar',
      loadingRecords: 'Cargando...',
      processing: 'Procesando...',
    },
    searching : searchingOpt,
    pagination: paginationOpt,
    lengthChange: lengthChangeOpt,
    paginate: paginateOpt,
    info:infoOpt,
    buttons: [
      {
        extend: 'excelHtml5',
        text: 'Exportar',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        title: titulo,
        pageSize: 'A4',
        header: {
          title: [
            {
              text: `Consulta ${titulo}`,
              style: {
                fontSize: '16px',
                font: 'bold',
                alignment: 'center',
              },
            },
          ],
        },
      },
      {
        extend: 'pdfHtml5',
        text: 'PDF',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
        title: titulo,
        orientation: orientation,
        customize: function (doc) {
          doc.defaultStyle.alignment = 'right';
          doc.content[1].table.headerRows = 1; // Asegura que el encabezado se repita en cada página
          doc.content[1].table.body[0].forEach(function (cell) {
            cell.fontSize = 10; // Establece el tamaño de fuente del thead a 16px
          });
        },
        pageSize: 'A4',
        header: {
          title: [
            {
              text: titulo,
              style: {
                fontSize: '16px',
                font: 'bold',
                alignment: 'center',
              },
            },
          ],
        },
      },
      {
        extend: 'print',
        text: 'Imprimir',
        titleAttr: 'Imprimir',
        className: 'btn btn-primary',
        title: titulo,
        pageSize: 'A4',
        // customize: function (win) {
        //   $(win.document.body).find('tbody').css('font-size', '10px');
        //   $(win.document.body).find('tbody').css('text-align', 'right');
        //   $(win.document.body).find('thead').css('font-size', '10px');
        //   $(win.document.body).find('tfoot').css('font-size', '5px');
        //   var footer = $('<footer>')
        //     .css({
        //       position: 'fixed',
        //       bottom: '0',
        //       left: '0',
        //       width: '100%',
        //       'background-color': '#f8f9fa',
        //       padding: '2px',
        //       'text-align': 'center',
        //       'font-size': '8px',
        //     })
        //     .html('Caja Municipal de Jubilados y Pensionados de Santa Fe.');
        //   // Agregar el pie de pagina al cuerpo del documento
        //   $(win.document.body).append(footer);
        // },
        header: {
          title: [
            {
              text: titulo,
              style: {
                fontSize: '12px',
                font: 'bold',
                alignment: 'center',
              },
            },
          ],
          alignment: 'center',
        },
      },
    ],
  });
}
