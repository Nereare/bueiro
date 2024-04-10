// JQuery import
const $ = require("jquery");
global.$ = global.jQuery = $;
// Method
$(function () {
  console.log("Page ready!");

  // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
  $(".navbar-burger").on("click", function () {
    $(".navbar-burger").toggleClass("is-active");
    $(".navbar-menu").toggleClass("is-active");
  });

  // Create checkbox-button functionality
  $(".checkbutton").on("change", function () {
    if ($(this).is(":checked")) {
      $(this).parent()
        .addClass("is-primary")
        .find(".mdi")
        .removeClass("mdi-checkbox-blank-outline mdi-checkbox-marked")
        .addClass("mdi-checkbox-marked");
    } else {
      $(this).parent()
        .removeClass("is-primary")
        .find(".mdi")
        .removeClass("mdi-checkbox-blank-outline mdi-checkbox-marked")
        .addClass("mdi-checkbox-blank-outline");
    }
  });

  // Check if required fields are filled
  $("[required]").on("change input", function() {
    // Change color code if missing data
    if ($(this).val() == "" || $(this).val() == null) {
      if ($(this).prop("nodeName").toLowerCase() === "select") {
        $(this).parent().addClass("is-danger");
      } else {
        $(this).addClass("is-danger");
      }
    } else {
      if ($(this).prop("nodeName").toLowerCase() === "select") {
        $(this).parent().removeClass("is-danger");
      } else {
        $(this).removeClass("is-danger");
      }
    }
  }).trigger("change");

  // Close notification
  $(".notification .delete").on("click", function() {
    $(this).parent()
      .addClass("is-hidden")
      .children("p").html("");
  });
});