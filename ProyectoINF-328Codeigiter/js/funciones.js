function editarusu(id)
{
  //console.log(id);
  $('#nomedit0').val(id);
  cadena=$('#cadeeditar'+id).val();
  veccade=cadena.split("|");
  $('#nomedit').val(veccade[0]);
  $('#nomedit1').val(veccade[1]);
  $('#nomedit2').val(veccade[2]);
  $('#nomedit3').val(veccade[3]);
  $('#nomedit4').val(veccade[4]);
  $('#nomedit5').val(veccade[5]);
  //console.log(veccade);
}
function editarD(id)
{
  //console.log(id);
  $('#nomeditD0').val(id);
  cadenaD=$('#cadeeditarD'+id).val();
  veccade=cadenaD.split("|");
  $('#nomeditD').val(veccade[0]);
  $('#nomeditD1').val(veccade[1]);
  $('#nomeditD2').val(veccade[2]);
  $('#nomeditD3').val(veccade[3]);
  $('#nombrefile').html(veccade[4]);
  $('#ant_nombre').val(veccade[4]);
   $('#oldruta').val(veccade[4]);
  $('#nomeditD5').val(veccade[5]);
  $('#nomeditD6').val(veccade[6]);
  //console.log(veccade);
}
function editarA(id)
{
  $('#nomeditA0').val(id);
  cadena=$('#cadeeditarA'+id).val();
  $('#nomeditA').val(cadena);
}
function editarE(id)
{
  $('#nomeditE0').val(id);
  cadena=$('#cadeeditarE'+id).val();
  $('#nomeditE').val(cadena);
}

function mostrardoc(id)
{
  //console.log(id);
  var conte=$("#mostrar"+id).val();
  //console.log(conte);
   //$("#dialogmostrar").dialog();
   $("#miModal").modal("show");
   if (conte.indexOf('/') > -1) {
  $("#framem").attr("src", conte );
   } else {
     $("#framem").attr("src", "../proyecto/doc_subido/"+conte );
   }
}

$(document).ready(function($) {

//var base_url = 'http://localhost/biblioteca/index.php/'
//var base_url = $('body').attr('uri')+'index.php/';
var base_url = $('body').attr('uri');
//var url_file = $('body').attr('uri');
/*function inicio()
{
    mostrar_datos("");
    $("#camp_query_docs").keyup(function(event) {
       buscar = $("#camp_query_docs").val();
       mostrar_datos(buscar);
    });


}*/




$('#ver').click(function(event) {
  //console.log(base_url);
  /* Act on the event */
url=base_url+"/home/mostrar_busqueda";
$.post(url,{buscar:$('#camp_query_docs').val()},function(respuesta){
//console.log(respuesta);
var registros = eval(respuesta);
html = "";
html = "<table class='table table-responsive table-bordered'><thead>";
html += "<tr><th>titulo_p</th><th>titulo_s</th><th>idioma</th><th>tipo</th><th>ruta</th><th>descripcion</th><th>palabras_clave</th><th>";
html += "</thead><tbody>";
for (var i = 0; i < registros.length; i++) {
    html += "<tr><td>"+registros[i]["titulo_p"]+"</td>";
    html += "<td>"+registros[i]["titulo_s"]+"</td>";
    html += "<td>"+registros[i]["idioma"]+"</td>";
    html += "<td>"+registros[i]["tipo"]+"</td>";
    html += "<td><button type='button' class='btn btn-primary' onclick='mostrardoc("+registros[i]["id"]+")'; >Ver</button><input type=hidden id='mostrar"+registros[i]["id"]+"'  value='"+registros[i]["ruta"]+"'   > </td>";
    html += "<td>"+registros[i]["descripcion"]+"</td>";
    html += "<td>"+registros[i]["palabras_clave"]+"</td></tr>";
};
html += "</tbody></table>";

html += '	<div id="miModal" class="modal fade"  role="dialog"><div class="modal-dialog modal-lg " ><!-- Contenido del modal --><div class="modal-content"><div class="modal-header">  <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">  <iframe style="width:100%" height="500px" id="framem"></iframe></div><div class="modal-footer">  <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button></div></div></div></div>';
$("#muestraver").html(html);

});


//$pepe=$_REQUEST[pepe];
/*
  $.ajax({
        url: 'http://localhost:8080/proyecto/application/controllers/home/mostrar_busqueda',
        type: 'POST',
        data: { buscar: $('#camp_query_docs').val() },
        success: function(respuesta)
        {

          console.log(data);
          //alert(respuesta);
          var registros = eval(respuesta);
          html = "";
          html = "<table class='table table-responsive table-bordered'><thead>";
          html += "<tr><tr>#</th><th>titulo_p</th><th>titulo_s</th><th>idioma</th><th>tipo</th><th>ruta</th><th>descripcion</th><th>palabras_clave</th><th>";
          html += "</thead><tbody>";
          for (var i = 0; i < registros.length; i++) {
              html += "<tr><td>"+registros[i]["titulo_p"]+"</td><td>"+registros[i]["titulo_s"]+"</td><td>"+registros[i]["idioma"]+"</td><td>"+registros[i]["tipo"]+"</td><td>"+registros[i]["ruta"]+"</td><td>"+registros[i]["descripcion"]+"</td><td>"+registros[i]["palabras_clave"]+"</td></tr>";
          };
          html += "</tbody></table>";
          $("#resultados_docs").html(html);
        }
    }); */

});


/////////////////////////////// menus///////////////////////////////////

$('#btn_query_docs').click(function(event) {
url=base_url+"/home/mostrar_busqueda";
$.post(url,{buscar:$('#camp_query_docs').val()},function(respuesta){
//console.log(respuesta);
var registros = eval(respuesta);
html = "";
html = "<table class='table table-responsive table-bordered table-striped table-condensed table-hover'><thead class='thead-dark'>";
html += "<tr><th>titulo_p</th><th>titulo_s</th><th>idioma</th><th>tipo</th><th>ruta</th><th>descripcion</th><th>palabras_clave</th><th>";
html += "</thead><tbody>";
for (var i = 0; i < registros.length; i++) {
    html += "<tr><td>"+registros[i]["titulo_p"]+"</td>";
    html += "<td>"+registros[i]["titulo_s"]+"</td>";
    html += "<td>"+registros[i]["idioma"]+"</td>";
    html += "<td>"+registros[i]["tipo"]+"</td>";
    html += "<td><button type='button' class='btn btn-primary' onclick='mostrardoc("+registros[i]["id"]+")'; >Ver</button><input type=hidden id='mostrar"+registros[i]["id"]+"'  value='"+registros[i]["ruta"]+"'   > </td>";
    html += "<td>"+registros[i]["descripcion"]+"</td>";
    html += "<td>"+registros[i]["palabras_clave"]+"</td></tr>";
};
html += "</tbody></table>";

html += '	<div id="miModal" class="modal fade"  role="dialog"><div class="modal-dialog modal-lg " ><!-- Contenido del modal --><div class="modal-content"><div class="modal-header">  <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">  <iframe style="width:100%" height="500px" id="framem"></iframe></div><div class="modal-footer">  <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button></div></div></div></div>';
$("#resultados_docs").html(html);

});

});



/////////////////////////////////// editar usuario modal ADMINISTRACION







////////////////////////////////////menus//////////////////////////////////////


function mostrar_datos(valor)
{

  console.log('entro');
  /*  $.ajax({
        url: 'http://localhost:8080/proyecto/application/controllers/home/mostrar',
        type: 'POST',
        data: {buscar:valor},
        success: function(respuesta)
        {
          //alert(respuesta);
          var registros = eval(respuesta);
          html = "";
          html = "<table class='table table-responsive table-bordered'><thead>";
          html += "<tr><tr>#</th><th>titulo_p</th><th>titulo_s</th><th>idioma</th><th>tipo</th><th>ruta</th><th>descripcion</th><th>palabras_clave</th><th>";
          html += "</thead><tbody>";
          for (var i = 0; i < registros.length; i++) {
              html += "<tr><td>"+registros[i]["titulo_p"]+"</td><td>"+registros[i]["titulo_s"]+"</td><td>"+registros[i]["idioma"]+"</td><td>"+registros[i]["tipo"]+"</td><td>"+registros[i]["ruta"]+"</td><td>"+registros[i]["descripcion"]+"</td><td>"+registros[i]["palabras_clave"]+"</td></tr>";
          };
          html += "</tbody></table>";
          $("#resultados_docs").html(html);
        }
    });*/
}


});
