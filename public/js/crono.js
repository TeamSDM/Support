// const { each } = require("jquery");

var timeout=0;
var iniciar = $("#inicio").val();
var cerrar = $("#cerrar").val();
var tiempoId = [];
time = [[,]];
var tiempoInicial = []
var inicio;
var listaTiempo = [];   
//comprobar que no se guarde dos veces
//tomar la fecha al dar clic en cerrar 
//restar la fecha inicial y final 
//guardar ese resultado en una variable con formato fecha 
activar();
var listaId = [];
function activar(idInicio){

        //Tomar la fecha inicial al dar clic en ver con el id y almacenarlo en una lista ↓
        if (idInicio === undefined){
            // console.log("está indefinida")
        }
        else{
            if (tiempoInicial.includes(idInicio) === true){//se valida que el id esté dentro del array
                console.log("esto quiere decir que ya está")
            }
            else{
                inicio = new Date().getTime();// obtener la fecha inicial
                tiempoInicial.push(idInicio,inicio) //guarda el tiempo inicial junto con el id
                console.log(tiempoInicial)
            }
        }
        
        // console.log(listaTiempo)
        // console.log(listaId);
        // console.log("para");
        // return [listaId, listaTiempo];
        // time.push([idInicio,inicio]);
    // for(var tiempo in time){
    //     console.log(tiempo[0]);
    // }
    //     if (time.includes([idInicio]) == false){//comprar que el id no está en el array del tiempo inicial
    //         time.push([idInicio,inicio])
    //         window.time;
    //         // console.log(time[2][0]);
    //         funcionando();
    //     }
    //     else{
    //         console.log("x");
    //         // tiempoInicial.push(time); //guardar el tiempo iniciar
    //         funcionando();//que vaya a la función
    //     }
        localStorage.setItem('inicio', inicio);//guardar en el base de datos el tiempo inicial
        // console.log(tiempoInicial[0])
}
function guardarTiempo(time){

}
function funcionando()
{
    // obteneos la fecha actual
    var actual = new Date().getTime();
    
    // obtenemos la diferencia entre la fecha actual y la de inicio
    var diferencia = new Date(actual-inicio);
    
    // // mostramos la diferencia entre la fecha actual y la inicial
    // var result = LeadingZero(diferencia.getUTCHours())+":"+LeadingZero(diferencia.getUTCMinutes())+":"+LeadingZero(diferencia.getUTCSeconds());
    // console.log(result);
    // // document.getElementById('crono').innerHTML = result;
    
    // Indicamos que se ejecute esta función nuevamente dentro de 1 segundo
    timeout = setTimeout("funcionando()",1000);
}
function calculaPrecioTotal(precio){
    var impuestos = 1;
    var gastosEnvio = 10;
    var precioTotal = ( precio * impuestos ) + gastosEnvio;
    return precioTotal;
}
  
  var precioTotal = calculaPrecioTotal(); 
//   console.log(precioTotal)     
/* Funcion que pone un 0 delante de un valor si es necesario */
function LeadingZero(Time)
{return (Time < 10) ? "0" + Time : + Time;}
var tiempoFinal = []
function parar(idCerrar){
    fin = new Date().getTime();// obtener la fecha final
    tiempoFinal.push(idCerrar,fin) //guarda el tiempo inicial junto con el id
    for (var tiempo in tiempoInicial){
        console.log(tiempo)
    }
    if (tiempoInicial.includes(idCerrar) == true){ //se valida que el id si está dentro del la lista
        //Encontrar la posicion en la que se encuentra el id
        //sumar un lugar mas a esa posición y tomar ese dato
        //se resta el tiempoinicial con el tiempo final
        //almacenar ese dato en una variable para enviarla a php 
        console.log(tiempoInicial)
        
    }
    else{
        console.log(tiempoInicial)
    }
    
    
    
    
    //debo comparar id y restar los tiempo y así sacar el total del tiempo 
    //
//     clearTimeout(timeout);//esto por el momento ya que se debe hacer con el if
//     if(ids(idCerrar) == false){//si el id de cerrar está en la lista de los id
//         fin = new Date(); //fecha actual
//         finTotal = fin - inicio;
//         console.log(finTotal);
//         //proceder a pausar el cronometro
//         clearTimeout(timeout);
        
        
//         // Eliminamos el valor inicial guardado
//         localStorage.removeItem("inicio");
//         timeout=0;
//         estado(idCerrar);
//     }
//     else{
//         funcionando();
//     }
    
}

window.onload=function()//esto sgca que carga la pág que esta actualmente
{
    /* Si al iniciar el navegador, la variable inicio que se guarda 
    en la base de datos del navegador tiene valor, cargamos el valor e iniciamos el proceso. */
    if(localStorage.getItem("inicio")!=null)
    {
        inicio = localStorage.getItem("inicio");
        // document.getElementById("boton").value="Detener";
        funcionando();
    }
}
//lo unico que falta es que se guarde localmente y probar que si esta guardando por id y tiempo