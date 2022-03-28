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
  console.log("2: " + pw2.value + "       1: " + $("#vlad1").val());
  if (pw2.value !== $("#vlad1").val()) {
    pw2.setCustomValidity("invalid");
  } else {
    pw2.setCustomValidity(""); // is valid
  }
}

function test() {
  console.log($("#vlad3").val());
  console.log($("#role").val());
}
