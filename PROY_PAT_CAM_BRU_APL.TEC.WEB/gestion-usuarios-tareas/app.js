// Integrantes:
// MARTHA PATRICIA LAPUERTA QUINATOA
// CAMILA JOSE MALDONADO REINA
// BRUNO ALEJANDRO TOBAR IGUASNIA


// Creamos un array con usuarios y sus respectivas tareas
let usuarios = [
    {
        id: 1, 
        nombre: "Patricia",
        tareas: [
            { descripcion: "Limpiar casa", estado: "pendiente" },
            { descripcion: "Hacer compras", estado: "completada" }
        ]
    } 
];

// Variable global que usamos para asignar un ID único a cada nuevo usuario
let id = 2;

// Función que imprime el menú principal que se verá en consola
function menu (){
    console.log("MENU");
    console.log("1. Ver usuarios existentes");
    console.log("2. Agregar nuevo usuario");
    console.log("3. Ver tareas de un usuario");
    console.log("4. Agregar nueva tarea a un usuario");
    console.log("5. Marcar tarea como completada");
    console.log("6. Eliminar una tarea");
    console.log("7. Salir del programa");
}

// Muestra por consola la lista de usuarios registrados
function usuariosExistentes(){
    if (usuarios.length === 0){
        console.log("No hay usuarios registrados");
    } else {
        for(let usuario of usuarios){
            console.log(`ID: ${usuario.id} - Nombre: ${usuario.nombre}`);
        }
    }
}

// Agrega un nuevo usuario pidiendo su nombre por consola
function agregarUsuario(){
    let nombre = prompt("Ingrese el nombre del usuario");
    while (nombre === "") {
        console.log("No deje en blanco el nombre de usuario");
        nombre = prompt("Ingrese el nombre del usuario");
    }
    usuarios.push({ id: id++, nombre: nombre, tareas: [] });
    console.log("Usuario Agregado");
}

// Busca un usuario por su ID y lo devuelve
function buscarUsuario(idUsuario){
    return usuarios.find(usuario => usuario.id === idUsuario);
}

// Muestra las tareas de un usuario , incluyendo los detalles
function verTareas(idUsuario){
    let usuario = buscarUsuario(idUsuario);
    if (usuario){
        if (usuario.tareas.length === 0){
            console.log("El usuario no tiene tareas asignadas");
        } else {
            for (let i = 0; i < usuario.tareas.length; i++){
                let tarea = usuario.tareas[i];
                console.log(`${i + 1}. ${tarea.descripcion} - ${tarea.estado}`);
                console.log("Detalles de la tarea:");
                for (let key in tarea) {
                    console.log(`  ${key}: ${tarea[key]}`);
                }
            }
        }
    } else {
        console.log("No existe usuario");
    }
}

// Agrega una tarea nueva a un usuario existente
function agregarTarea(){
    let idUsuario = parseInt(prompt("Ingrese ID del usuario"));
    let usuario = buscarUsuario(idUsuario);
    if(usuario){
        let descripcion = prompt("Ingrese la descripción de la tarea: ");
        if (descripcion === ""){
            console.log("Agregue una descripción");
        } else {
            usuario.tareas.push({ descripcion: descripcion, estado: "pendiente" });
            console.log("Tarea Agregada");
        }
    } else {
        console.log("No existe usuario");
    }
}

// Marca una tarea de un usuario como completada
function marcarTarea(){
    let idUsuario = parseInt(prompt("Ingrese ID del usuario"));
    let usuario = buscarUsuario(idUsuario);
    if (usuario){
        if (usuario.tareas.length === 0){
            console.log("El usuario no tiene tareas asignadas");
            return;
        }
        verTareas(idUsuario);
        let indice = parseInt(prompt("Ingrese el número de la tarea completada")) - 1;
        if (usuario.tareas[indice]){
            usuario.tareas[indice].estado = "completada";
            console.log("Tarea marcada como completada");
        } else {
            console.log("Tarea no válida");
        }
    } else {
        console.log("No existe usuario");
    }
}

// Elimina una tarea específica del listado de un usuario
function eliminarTarea(){
    let idUsuario = parseInt(prompt("Ingrese ID del usuario"));
    let usuario = buscarUsuario(idUsuario);
    if (usuario){
        if(usuario.tareas.length === 0){
            console.log("El usuario no tiene tareas asignadas");
            return;
        }
        verTareas(idUsuario);
        let indice = parseInt(prompt("Ingrese el número de la tarea a eliminar")) - 1;
        if (usuario.tareas[indice]){
            usuario.tareas.splice(indice, 1);
            console.log("Tarea eliminada correctamente");
        } else {
            console.log("Tarea no válida");
        }
    } else {
        console.log("No existe usuario");
    }
}

// Inicia el programa y muestra el menú hasta que el usuario decida salir
function iniciarMenu(){
    let opcion;
    do {
        menu();
        opcion = prompt("Escoja una opción del 1 al 7: ");

        switch (opcion){
            case "1":
                usuariosExistentes();
                break;
            case "2":
                agregarUsuario();
                break;
            case "3":
                let idUsuario = parseInt(prompt("Ingrese ID del usuario"));
                verTareas(idUsuario);
                break;
            case "4":
                agregarTarea();
                break;
            case "5":
                marcarTarea();
                break;
            case "6":
                eliminarTarea();
                break;
            case "7":
                console.log("Saliendo del programa. ¡Hasta pronto!");
                break;
            default:
                console.log("La opción no existe. Intente nuevamente.");
        }
    } while (opcion !== "7");
}
