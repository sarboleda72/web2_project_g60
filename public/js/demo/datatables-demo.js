// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    }
  });
});
