(function ($) {

    var contador = 0;
    var tiempo = 0;
    var plantillaFila =
    "<tr>"
      + "<td><select name='piv_pro[]'><option value='no'>NO</option><option value='si'>SI</option></select><label></label></td>"
      + "<td><input type='hidden' value='$1' name='id_mat[]'>$2</td>"
      + "<td>$3</td>"
      + "<td>$4</td>"
      + "<td><input type='text' class='form-control' name='obs_pro[]'></td>"
      + "<td><button class='subir btn btn-primary' type='button'><span class='glyphicon glyphicon-arrow-up' type='button'> </span> </button>"
      + " <button class='bajar btn btn-warning' type='button'><span class='glyphicon glyphicon-arrow-down' type='button'> </span></button>"
      + " <button class='eliminar btn btn-danger' type='button'><span class='glyphicon glyphicon-remove-sign' type='button'> </span></button></td>"
    + "</tr>";


    var fMover = function () {
        var $tr = $(this).parents("tr:first");
        if ($(this).is(".subir")) {
            $tr.insertBefore($tr.prev());
            $tr.css( "background-color", "rgba(34, 233, 12, 0.5)" )
            $tr.fadeTo('slow', 0.9, function(){
              $(this).css( "background-color", "#ffffff" ).delay(2000).fadeTo('slow', 2);
           });
        } else {
            $tr.insertAfter($tr.next());
            $tr.css( "background-color", "rgba(34, 233, 12, 0.5)" )
            $tr.fadeTo('slow', 0.9, function(){
              $(this).css( "background-color", "#ffffff" ).delay(2000).fadeTo('slow', 2);
           });

            console.log($tr);
        }
    };
    var fEliminar = function () {
        $(this).parents("tr:first").remove();
    };

    $(document).ready(function () {
      function nuevo (data,data2,data3) {
         contador++;
         var filaNueva =
             $(plantillaFila.replace("$1", data).replace("$2", data2).replace("$3", data3));

         $("#table").append(filaNueva);
     }
        $("#table")
            .on("click", ".subir", fMover)
            .on("click", ".bajar", fMover)
            .on("click", ".eliminar", fEliminar);
    });
})(jQuery);
function nuevo (data,data2,data3,data4) {

   var filaNueva =
       $(plantillaFila.replace("$1", data).replace("$2", data2).replace("$3", data3).replace("$4", data4));

   $("#table").append(filaNueva);
}
var plantillaFila =
"<tr>"
+ "<td><select name='piv_pro[]'><option value='no'>NO</option><option value='si'>SI</option></select><label></label></td>"
  + "<td><input type='hidden' value='$1' name='id_mat[]'>$2</td>"
  + "<td>$3</td>"
  + "<td>$4</td>"
  + "<td><input type='text' class='form-control' name='obs_pro[]'></td>"
  + "<td><button class='subir btn btn-primary' type='button'><span class='glyphicon glyphicon-arrow-up' type='button'> </span> </button>"
  + " <button class='bajar btn btn-warning' type='button'><span class='glyphicon glyphicon-arrow-down' type='button'> </span></button>"
  + " <button class='eliminar btn btn-danger' type='button'><span class='glyphicon glyphicon-remove-sign' type='button'> </span></button></td>"
+ "</tr>";
