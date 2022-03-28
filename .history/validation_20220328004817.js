(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();

function validate_pw2(pw2) {
  if (pw2.value !== $("#validation1").val()) {
    pw2.setCustomValidity("invalid");
  } else {
    pw2.setCustomValidity(""); // is valid
  }
}

function validate_edit_pw2(pw2) {
  if ($("#newPass2").val() !== $("#newPass").val()) {
    pw2.setCustomValidity("invalid");
  } else {
    pw2.setCustomValidity(""); // is valid
  }
}
