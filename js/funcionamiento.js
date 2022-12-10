function envioMail()
{

  $("#car_enviar").attr("disabled", true);
  $(".car_error").remove();

  var filtro=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;
  var s_email = $('#c_mail').val();
  

  if (filtro.test(s_email))
  {
    sendMail = "true";
  } 
  else
  {
    $('#c_mail').after("<span class='car_error' id='car_error_mail'>Ingrese e-mail valido.</span>");
    sendMail = "false";
  }
 

  if(sendMail == "true")
  {
    var datos = {

                 
                 "email" : $('#c_mail').val(),
                 

                };
    $.ajax({
            data: datos,
            url: 'index.php',
            type: 'post',
            beforeSend: function () {
               $("#car_enviar").val("Enviando…");
                                     },
            success: function (response) {
               $('form')[0].reset();
               $("#car_enviar").val("Enviar");
               $("#c_information p").html(response);
               $("#c_information").fadeIn('slow');
               $("#car_enviar").removeAttr("disabled");
                                          }
            });
  } 
  else
  {
    $("#car_enviar").removeAttr("disabled");
  }
}

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}