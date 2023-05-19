require('bootstrap-datepicker/js/bootstrap-datepicker')
require('bootstrap-datepicker/js/locales/bootstrap-datepicker.fr')
require('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')
$(document).ready(function() {
    // you may need to change this code if you are not using Bootstrap Datepicker
    var dateToday = new Date();
    $('.js-datepicker').datepicker({
        format: 'dd-mm-yyyy',
        startDate : dateToday,
        language: 'fr',
        autoclose: true,
    });
});