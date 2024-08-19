/* 
EJERCICIO 7:
Se realiza la carga de 10 valores enteros por teclado. Se desea conocer:
• La cantidad de valores negativos ingresados.
• La cantidad de valores positivos ingresados.
• La cantidad de múltiplos de 15.
• El valor acumulado de los números ingresados que son pares.
*/

function checkIntValues(numberArr) {
  if (!Array.isArray(numberArr)) {
    return 'Invalid entry';
  }
  if (numberArr?.some(isNaN)) {
    return 'Only an array of numeric values are allowed.';
  }
  let result = {
    negativeQuantity: 0,
    negativeValues: [],
    positiveQuantity: 0,
    positiveValues: [],
    multiplesFor15: [],
    evenNumbers: [],
  };
  // 0 is ignored.
  numberArr.forEach((number) => {
    if (number <= -1) {
      result.negativeValues.push(number);
      result.negativeQuantity++;
    } else if (number >= 1) {
      result.positiveValues.push(number);
      result.positiveQuantity++;
    }
    if (number % 15 === 0) {
      result.multiplesFor15.push(number);
    }
    if (number % 2 === 0) {
      result.evenNumbers.push(number);
    }
  });
  return result;
}

const values = [-32, 12, -23, 15, 30, -70, -30, 45, 28, 30];

console.log('Exercise 07: ', checkIntValues(values));

/* 
EJERCICIO 8:
Escriba un programa que muestre la tabla de multiplicar del 1 al 10 del número ingresado
por el usuario.
Ez pz
*/

function multiplicationTable(selectedTable, limit) {
  if (isNaN(selectedTable)) {
    return 'Invalid value entered. It must be a numeric value.';
  }
  console.log(`\nExercise 08: Selected table: ${selectedTable}`);
  console.log(`---------------`);
  for (let i = 1; i <= limit; i++) {
    console.log(`| ${selectedTable} x ${i} = ${selectedTable * i}`);
  }
  console.log(`---------------`);
}

multiplicationTable(8, 10);
