$(function() {
  $(".datepicker").datepicker({
    format: "mm/dd/yyyy",
    todayHighlight: true,
    autoclose: true
  });

  $("#create-form")
    // Add button click handler
    .on("click", ".btn-add-option", function() {
      var $template = $("#optionTemplate"),
        $clone = $template
          .clone()
          .removeClass("d-none")
          .removeAttr("id")
          .insertBefore($template),
        $option = $clone.find('[name="option[]"]');
      $("#optionTemplate").before($option);
    })

    // Remove button click handler
    .on("click", ".btn-remove-option", function() {
      var $row = $(this).parents(".form-group"),
        $option = $row.find('[name="option[]"]');

      // Remove element containing the option
      $row.remove();
    })
    .on("click", ".btn-add-description", function() {
      var description = $(
        '<div class="form-group"><label>Description</label><div class="row"><div class="col-md-8 mb-3"><input type="text" class="form-control" id="description" name="description"></div></div></div>'
      );

      $("div.form-group:first").after(description);
      $(".btn-add-description").attr("disabled", "disabled");
    });
});
