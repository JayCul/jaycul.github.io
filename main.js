$(document).ready(function () {
  $("#pingForm").validate({
    rules: {
      fname: "required",
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        number: true,
      },
      message: "required",
    },
    errorElement: "span",
    messages: {
      fname: "Please enter your name",
      email: "Please enter a valid email address",
      phone: "Please enter your mobile number",
      message: "We'll like to hear from you",
    },
    submitHandler: function (form) {
      var dataparam = $("#pingForm").serialize();
      $("#loader").hide();

      $.ajax({
        type: "POST",
        async: true,
        url: "sendmsg.php",
        data: dataparam,
        datatype: "json",
        cache: true,
        global: false,
        beforeSend: function () {
          $("#loader").show();
        },
        success: function (data) {
          if (data == "success") {
            console.log(data);
            document.getElementById("fname").value = "";
            document.getElementById("emailer").value = "";
            document.getElementById("phone").value = "";
            document.getElementById("message").value = "";
            alert("Sent!, we'll be in touch...");
          } else {
            $(".no-config").show();
            console.log(data);
          }
        },
        complete: function () {
          $("#loader").hide();
        },
      });
    },
  });
});
