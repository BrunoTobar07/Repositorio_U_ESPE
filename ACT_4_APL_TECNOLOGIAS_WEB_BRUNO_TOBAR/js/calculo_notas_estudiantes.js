//REGISTRO DE NOTAS
let parcial1 = 12;
let parcial2 = 15;
let proyectoFinal = 18;

//CÁLCULO DE NOTA FINAL
let notaFinal = (parcial1 * 0.3) + (parcial2 * 0.3) + (proyectoFinal * 0.4);

//CALIFICACIONES POR CONSOLA 
console.log("Calificación del Parcial 1:", parcial1);
console.log("Calificación del Parcial 2:", parcial2);
console.log("Calificación del Proyecto Final:", proyectoFinal);
console.log("Calificación Final Calculada:", notaFinal.toFixed(2));

//OBSERVACIÓN DEL ESTUDIANTE
if (notaFinal >= 14) {
  console.log("Aprobado directamente.");

} else if (notaFinal >= 10 && notaFinal <= 13.9) {
  console.log("Debe ir a recuperación.");

} else {
  console.log("Pierde la materia.");
}
