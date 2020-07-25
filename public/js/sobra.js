// var iniciar = $("#pruebas").val();
// function prueba(){
//     console.log(iniciar);
    
//     if (iniciar == "Ver") { //botón en "Empezar"
//         empezar() //ir  la función empezar
//     }
//     else {  //Botón en "Reiniciar"
//         reiniciar()  //ir a la función reiniciar
//     }
// }
// visor=document.getElementById("reloj"); //localizar pantalla del reloj
//     //asociar eventos a botones: al pulsar el botón se activa su función.

//     // boton1 = getElementById(boton1);
//     // // console.log(boton1);
//     // iniciar.onclick = activo; 
//     // document.cron.boton2.onclick = pausa;

// //     //estado inicial de los botones
// // iniciar.disabled=false;
// // document.cron.boton2.disabled=true;

//     //variables de inicio:
//     var marcha=0; //control del temporizador
//     var cro=0; //estado inicial del cronómetro.

//     //botón Empezar / Reiniciar
//     // function activo (){
//     // if (inicio == "Empezar") { //botón en "Empezar"
//     //     empezar() //ir  la función empezar
//     //     }
//     // else {  //Botón en "Reiniciar"
//     //     reiniciar()  //ir a la función reiniciar
//     //     }
//     // }
//     // function pausa (){ 
//     //     if (marcha==0) { //con el boton en "continuar"
//     //        continuar() //ir a la función continuar
//     //        }
//     //     else {  //con el botón en "parar"
//     //        parar()  //ir a la funcion parar
//     //        }
//     // }
//      //empezar el cronometro
//     function empezar() {
//         emp=new Date(); //fecha inicial (en el momento de pulsar)
//         elcrono=setInterval(tiempo,10); //poner en marcha el temporizador.
//         marcha=1; //indicamos que se ha puesto en marcha.
//         iniciar = "Reiniciar"; //Cambiar estado del botón
//         //document.cron.boton2.disabled=false; //activar botón de pausa
//     }
//       //temporizador
//     function tiempo() { 
//         actual=new Date(); //fecha a cada instante	
        
//         //tiempo del crono (cro) = fecha instante (actual) - fecha inicial (emp)	
//         cro=actual-emp; //milisegundos transcurridos.	
//         cr=new Date(); //pasamos el num. de milisegundos a objeto fecha.	
//         cr.setTime(cro); 
        
//         //obtener los distintos formatos de la fecha:	
//         cs=cr.getMilliseconds(); //milisegundos 	
//         cs=cs/10; //paso a centésimas de segundo.	
//         cs=Math.round(cs); //redondear las centésimas	
//         sg=cr.getSeconds(); //segundos 	
//         mn=cr.getMinutes(); //minutos 	
//         ho=cr.getHours()-1; //horas 	
        
//         //poner siempre 2 cifras en los números			 
//         if (cs<10) {cs="0"+cs;} 
//         if (sg<10) {sg="0"+sg;} 
//         if (mn<10) {mn="0"+mn;} 
//         //llevar resultado al visor.
//         // visor.innerHTML=ho+" "+mn+" "+sg+" "+cs; // se visualiza el tiempo en pantalla del cronometro
//         //console.log(visor=ho+" "+mn+" "+sg+" "+cs);
//         //total = ho+mn+sg+cs;
        
//     }
//     //parar el cronómetro
//     function parar() { 
//         clearInterval(elcrono); //parar el crono
//         marcha=0; //indicar que está parado.
//         document.cron.boton2.value="Continuar"; //cambiar el estado del botón
//     }
//     //Continuar una cuenta empezada y parada.
//     function continuar() {
//         emp2=new Date(); //fecha actual
//         em = emp2 - emp;/* ←--- tiempo total hasta que se pausó el cronometro */
//         emp2.setTime(em);//tiempo en formato fecha
//         console.log(em);
//         emp2=emp2.getTime(); //pasar a tiempo Unix
//         emp3=emp2-cro; //restar tiempo anterior
//         emp=new Date(); //nueva fecha inicial para pasar al temporizador 
//         emp.setTime(emp3); //datos para nueva fecha inicial.
        
//         elcrono=setInterval(tiempo,10); //activar temporizador
//         marcha=1; //indicar que esta en marcha
//         // document.cron.boton2.value="parar"; //Cambiar estado del botón
//         // document.cron.boton1.disabled=false; //activar boton 1 si estuviera desactivado
//     }
// //if ($status==Resuelto);
//     //volver al estado inicial
//     function reiniciar() {
//         if (marcha==1) {  //si el cronómetro está en marcha:
//             clearInterval(elcrono); //parar el crono
//             marcha=0;	//indicar que está parado
//         }
// 		     //en cualquier caso volvemos a los valores iniciales
//         cro=0; //tiempo transcurrido a cero
//         //visor.innerHTML = "0 00 00 00"; //visor a cero
//         inicio = "Ver"; //estado inicial primer botón
//         // document.cron.boton2.value="Parar"; //estado inicial segundo botón
//         // document.cron.boton2.disabled=true;  //segundo botón desactivado	 
//     }	


/// cronometro que se puede usar aun saliendo del navegador
// var inicio=0;
// var timeout=0;

// function empezarDetener(elemento)
// {
//     if(timeout==0)
//     {
//         elemento.value="Detener";// empezar el cronometro 
//         inicio=new Date().getTime();// Obtenemos el valor actual
//         localStorage.setItem("inicio",inicio); // Guardamos el valor inicial en la base de datos del navegador

//         funcionando();// iniciamos el proceso
//     }else{
//         // detemer el cronometro

//         elemento.value="Empezar";
//         clearTimeout(timeout);

//         // Eliminamos el valor inicial guardado
//         localStorage.removeItem("inicio");
//         timeout=0;
//     }
// }

// function funcionando()
// {
//     // obteneos la fecha actual
//     var actual = new Date().getTime();

//     // obtenemos la diferencia entre la fecha actual y la de inicio
//     var diff=new Date(actual-inicio);

//     // mostramos la diferencia entre la fecha actual y la inicial
//     var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());
//     document.getElementById('crono').innerHTML = result;

//     // Indicamos que se ejecute esta función nuevamente dentro de 1 segundo
//     timeout=setTimeout("funcionando()",1000);
// }

// /* Funcion que pone un 0 delante de un valor si es necesario */
// function LeadingZero(Time)
// {
//     return (Time < 10) ? "0" + Time : + Time;
// }

// window.onload=function()
// {
//     if(localStorage.getItem("inicio")!=null)
//     {
//         // Si al iniciar el navegador, la variable inicio que se guarda
//         // en la base de datos del navegador tiene valor, cargamos el valor
//         // y iniciamos el proceso.
//         inicio=localStorage.getItem("inicio");
//         document.getElementById("boton").value="Detener";
//         funcionando();
//     }
// }
