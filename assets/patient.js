$(function () {
  console.log("Patient methods ready!");

  // Change gender based on sex, as default
  $("#sex").on("change", function() {
    switch ($(this).val()) {
      case "f":
        $("#gender")
          .val("a")
          .trigger("change");
        break;
      case "m":
        $("#gender")
          .val("o")
          .trigger("change");
        break;
      default:
        $("#gender")
          .val("e")
          .trigger("change");
        break;
    }
  });

  // Submit data
  $("#submit").on("click", function() {
    // Disable submit for now
    let btn = $(this);
    btn
      .addClass("is-loading")
      .attr("disabled", true);

    // Check if all required fields are filled
    let filled = true;
    $("[required]").each(function() {
      if ($(this).val() == "") {
        filled = false;
        $(this).trigger("change");
      }
    });

    // If all required fields are filled...
    if (filled) {
      // Get patient data
      let patient = {
        name: $("#name").val(),
        dob: $("#dob").val(),
        sex: $("#sex").val(),
        gender: $("#gender").val(),
        classificationPre: $("#classificationPre").val()
      };

      // Run ajax
      $.ajax({
        url: $("#save-link").val(),
        method: "post",
        data: patient
      })
        .fail(function() {
          $("#msg")
            .removeClass("is-hidden")
            .addClass("is-danger")
            .children("p")
            .html("Erro de conexão com servidor");
          // Reenable submit
          btn
            .removeClass("is-loading")
            .attr("disabled", false);
        } )
        .done(function(r) {
          window.location.replace($("#redirect-link").val() + "/" + r.id);
        });
    } else {
      // Reenable submit
      btn
        .removeClass("is-loading")
        .attr("disabled", false);
    }
  });
});