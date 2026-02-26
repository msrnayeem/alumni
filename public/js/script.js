$(function(){
  $("#dob").datepicker({
    dateFormat: "yy-mm-dd",  // MySQL-friendly format
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2026"
  });

  // Fade out error message after 5 seconds
  setTimeout(function(){
    $("#error-message").fadeOut("slow");
  }, 5000);
});
