$(function() {

  $(".date").datepicker({
    autoclose: true,
    todayHighlight: true
  })

  $('#date').datepicker("setDate", new Date());
});