$(document).ready(function(){
    $("#lugar").change(function () {
        $("#lugar option:selected").each(function () {
    IdDpto = $(this).val();
            $.post("routes/getMunicipio.php", { IdDpto: IdDpto }, function(data){
      $("#muni").html(data);
            }, "html");            
        });
    })
});

$(document).ready(function(){
    $("#bar").change(function () {
        $("#bar option:selected").each(function () {
    IdBarrio = $(this).val();
            $.post("routes/getSector.php", { IdBarrio: IdBarrio }, function(data){
      $("#sec").html(data);
      $("#sec").trigger("change");
            }, "html");            
        });
    })
});

$(document).ready(function(){
    $("#sec").change(function () {
        $("#sec option:selected").each(function () {
    IdSector = $(this).val();
            $.post("routes/getCentroReferencia.php", { IdSector: IdSector }, function(data){
      $("#centroc").html(data);
            }, "html");            
        });
    })
});

//Funciones de validacion
function caracterletra(e){
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toLowerCase();
letras = " abcdefghijklmnñopqrstuvwxyz";
especiales = [];
tecla_especial = false
for(var i in especiales){
  if(key == especiales[i]){
    tecla_especial = true;
    break;
  } 
} 
if(letras.indexOf(tecla)==-1 && !tecla_especial)
  return false;
}

function telefono(e){
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toLowerCase();
letras = " 0123456789";
especiales = [45];
tecla_especial = false
for(var i in especiales){
  if(key == especiales[i]){
    tecla_especial = true;
    break;
  } 
} 
if(letras.indexOf(tecla)==-1 && !tecla_especial)
  return false;
}

function des(value){
if(value==1){
  document.getElementById("secu").disabled=false;
  document.getElementById("uGrado").disabled=false;
  document.getElementById("sel1").disabled=false;
  document.getElementById("secu").disabled=false;
  document.getElementById("centroEduc").disabled=false;
  document.getElementById("secu").disabled=false;
  document.getElementById("Repro").disabled=false;
  document.getElementById("GradosRepro").disabled=false;
  document.getElementById("secu").disabled=false;
  document.getElementById("veces").disabled=false;
  document.getElementById("motivosRep").disabled=false;
  document.getElementById("expul").disabled=false;      
}
else{
  if(value==0){
    document.getElementById("secu").disabled=true;
    document.getElementById("uGrado").disabled=true;
    document.getElementById("sel1").disabled=true;
    document.getElementById("secu").disabled=true;
    document.getElementById("centroEduc").disabled=true;
    document.getElementById("secu").disabled=true;
    document.getElementById("Repro").disabled=true;
    document.getElementById("GradosRepro").disabled=true;
    document.getElementById("secu").disabled=true;
    document.getElementById("veces").disabled=true;
    document.getElementById("motivosRep").disabled=true;
    document.getElementById("expul").disabled=true;      
  }
}
}

function habilitar(value,id,id2,id3){
if(value==1){
  //habilitamos
  document.getElementById(id).disabled=false;
  document.getElementById(id2).disabled=false;
  document.getElementById(id3).disabled=false;
}
else{ if(value==0)
  //desabilitamos
  document.getElementById(id).disabled=true;
  document.getElementById(id2).disabled=true;
  document.getElementById(id3).disabled=true;   
}
}