// Se pide una cadena al usuario mediante prompt
var cadena = prompt('Ingrese una cadena:','');

// Muestra la cadena ingresada
document.writeln('La cadena es: ' + cadena);
document.writeln('<br>');

// .length devuelve la cantidad de caracteres
document.writeln('La longitud de la cadena es: ' + cadena.length);
document.writeln('<br>');

// .charAt(0) obtiene el primer carácter
document.writeln('La primera letra es: ' + cadena.charAt(0));
document.writeln('<br>');

// .substring(inicio, fin) obtiene caracteres desde inicio hasta fin-1
document.writeln('Los primeros 3 caracteres son: ' + cadena.substring(0, 3));
document.writeln('<br>');

// .indexOf() busca una subcadena; si no existe devuelve -1
if (cadena.indexOf('hola') != -1)
    document.writeln('Se ingreso la subcadena hola');
else
    document.writeln('No se ingreso la subcadena hola');
document.writeln('<br>');

// .toUpperCase() convierte toda la cadena a MAYÚSCULAS
document.writeln('La cadena en mayusculas es: ' + cadena.toUpperCase());
document.writeln('<br>');

// .toLowerCase() convierte toda la cadena a minúsculas
document.writeln('La cadena en minusculas es: ' + cadena.toLowerCase());
