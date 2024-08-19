/* 
EJERCICIO 3:
CATEGORÍA AUMENTO
A 15%
B 30%
C 10%
D 20%

Calcular el aumento de trabajador tomando en cuenta la tabla de categorías de aumento.
Para este ejercicio deberá de asignar las siguientes variables: nombre, salario, categoría y
aumento. Deberá demostrar los datos del empleado y el aumento salarial.
*/

const SALARY_INCREASE = {
  A: 0.15,
  B: 0.3,
  C: 0.1,
  D: 0.2,
};

function employeeSummary(employeeName, currentSalary, category) {
  // if (
  //   category !== 'A' &&
  //   category !== 'B' &&
  //   category !== 'C' &&
  //   category !== 'D'
  // ) {
  //   return 'Invalid category';
  // }
  if (!SALARY_INCREASE.hasOwnProperty(category)) {
    return 'Invalid category';
  }

  const salaryFloat = parseFloat(currentSalary);
  const increase = salaryFloat * SALARY_INCREASE[category];
  return {
    employeeName,
    currentSalary,
    increase,
    totalSalary: salaryFloat + increase,
  };
}
console.log('Exercise 3:', employeeSummary('Marcos', 2500, 'B'));

/* 
EJERCICIO 4: Crear una función que en base a 2 números enteros que ingrese el usuario,
calcular cual número es el mayor y devolverlo. 
*/

function greaterNumber(num1, num2) {
  const parseNum1 = parseFloat(num1);
  const parseNum2 = parseFloat(num2);
  if (isNaN(parseNum1) || isNaN(parseNum2)) return 'Invalid values.';

  if (parseNum1 === parseNum2) {
    return 'Same values entered.';
  }

  return parseNum1 > parseNum2
    ? `Greater number: ${parseNum1}`
    : `Greater number: ${parseNum2}`;
}

console.log('Exercise 4:', greaterNumber(10, 23));
