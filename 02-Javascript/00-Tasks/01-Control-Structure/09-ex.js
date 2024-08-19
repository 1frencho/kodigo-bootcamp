/*
EJERCICIO 9:
Crear programa donde se introduce una temperatura en Celsius y salga el resultado en
Fahrenheit, una vez teniendo la temperatura en Fahrenheit deberá devolver lo siguiente:
• Si ºF está entre 14 y 32, sale la frase “Temperatura baja”
• Si ºF está entre 32 y 68, sale la frase “Temperatura adecuada”
• Si ºF está entre 68 y 96, sale la frase “Temperatura alta”
• Si no está entre ningún caso anterior la frase “Temperatura desconocida”
*/

function CelsiusToFahrenheit(Celsius) {
  const CelsiusFloat = parseFloat(Celsius);
  if (isNaN(CelsiusFloat)) {
    return 'Invalid value. Celsius must be a number.';
  }
  const result = (CelsiusFloat * 9) / 5 + 32;
  let msg = '';
  if (result >= 14 && result < 32) {
    msg = 'Temperatura baja.';
  } else if (result >= 32 && result < 68) {
    msg = 'Temperatura adecuada.';
  } else if (result >= 68 && result <= 96) {
    msg = 'Temperatura alta.';
  } else {
    msg = 'Temperatura desconocida.';
  }
  return {
    Celsius,
    Fahrenheit: result,
    msg,
  };
}

console.log('Exercise 9: ', CelsiusToFahrenheit(25.5));
