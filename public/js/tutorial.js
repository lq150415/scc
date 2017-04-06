(function ($) {

    var contador = 0;
    var plantillaFila =
     "<tr>"
       + "<td><input type='hidden' value='$1'>$2</td>"
       + "<td>$3</td>"
       + "<td>$4</td>"
       + "<td><button class='subir btn btn-primary'>&uarr;</button>"
       + "<button class='bajar btn btn-warning'>&darr;</button> </td>"
       + " <td> <button class='eliminar btn btn-danger'>-</button> </td>"
     + "</tr>";


    var fMover = function () {
        var $tr = $(this).parents("tr:first");
        if ($(this).is(".subir")) {
            $tr.insertBefore($tr.prev());
        } else {
            $tr.insertAfter($tr.next());
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
  + "<td><input type='hidden' value='$1'>$2</td>"
  + "<td>$3</td>"
  + "<td>$4</td>"
  + "<td><button class='subir btn btn-primary'>&uarr;</button>"
  + "<button class='bajar btn btn-warning'>&darr;</button></td>"
  + "<td><button class='eliminar btn btn-danger'>-</button></td>"
+ "</tr>";
