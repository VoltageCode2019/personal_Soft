(function(){

  document.addEventListener ("DOMContentLoaded", function(e) {

    /*Aplicacion de tareas*/
      
    // Variables
    const lista = document.getElementById("lista");
    const tareaInput = document.getElementById("tareaInput");
    const btnNuevaTarea = document.getElementById("btn-agregar");

    // Funciones
    var agregarTarea = function(){
      let tarea = tareaInput.value;
      let nuevaTarea = document.createElement("li");
      let enlace = document.createElement("a");
      let contenido = document.createTextNode(tarea);

      if (tarea === "") {
        tareaInput.setAttribute("placeholder", "Agrega una tarea valida");
        tareaInput.className = "error";
        return false;
      }

      // Agregamos el contenido al enlace
      enlace.appendChild(contenido);
      // Le establecemos un atributo href
      enlace.setAttribute("href", "#");
      // Agrergamos el enlace (a) a la nueva tarea (li)
      nuevaTarea.appendChild(enlace);
      // Agregamos la nueva tarea a la lista
      lista.appendChild(nuevaTarea);

      tareaInput.value = "";

      for (var i = 0; i <= lista.children.length -1; i++) {
        lista.children[i].addEventListener("click", () => {
          this.parentNode.removeChild(this);
        });
      }

    };
    var comprobarInput = function(){
      tareaInput.className = "";
      teareaInput.setAttribute("placeholder", "Agrega tu tarea");
    };

    var eleminarTarea = function(){
      this.parentNode.removeChild(this);
    };

    // Eventos

    // Agregar Tarea
    btnNuevaTarea.addEventListener("click", agregarTarea);

    // Comprobar Input
    tareaInput.addEventListener("click", comprobarInput);

    // Borrando Elementos de la lista
    for (var i = 0; i <= lista.children.length -1; i++) {
      lista.children[i].addEventListener("click", eleminarTarea);
    }
    
  });
  
}());