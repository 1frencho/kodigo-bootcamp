/*
Crear una clase Calculadora que contendrá los siguientes métodos:
•	Sumar
•	Restar
•	Multiplicar
•	Dividir
•	Potencia
•	Factorial
*/

interface CalculatorInterface {
  plus(a: number, b: number): number;
  minus(a: number, b: number): number;
  multiply(a: number, b: number): number;
  divide(a: number, b: number): number;
  power(a: number, b: number): number;
  factorial(a: number): number | string;
}

export class Calculator implements CalculatorInterface {
  plus(a: number, b: number): number {
    return a + b;
  }
  minus(a: number, b: number): number {
    return a - b;
  }
  multiply(a: number, b: number): number {
    return a * b;
  }
  divide(a: number, b: number): number {
    return a / b;
  }
  power(a: number, b: number): number {
    return a ** b;
  }
  factorial(a: number): number | string {
    if (a === 0) {
      return 1;
    } else if (a > 170) {
      return 'El número de factorial es demasiado grande';
    }
    return a * Number(this.factorial(a - 1));
  }
}

export function Exercise2() {
  const valueA: HTMLInputElement | null = document.querySelector('#a');
  const valueB: HTMLInputElement | null = document.querySelector('#b');

  if (!valueA || !valueB) return;

  const calculate = new Calculator();

  // Uso de bind para asegurar que el contexto de this en los métodos de la clase Calculator se mantenga correcto.
  // En tu implementación actual, cuando pasas las funciones de la clase como referencias en OPERATIONS,
  // el contexto de this puede perderse.

  const OPERATIONS = [
    {
      operator: '+',
      name: 'plus',
      handleOperation: calculate.plus.bind(calculate),
    },
    {
      operator: '-',
      name: 'minus',
      handleOperation: calculate.minus.bind(calculate),
    },
    {
      operator: '*',
      name: 'multiply',
      handleOperation: calculate.multiply.bind(calculate),
    },
    {
      operator: '/',
      name: 'divide',
      handleOperation: calculate.divide.bind(calculate),
    },
    {
      operator: '^',
      name: 'power',
      handleOperation: calculate.power.bind(calculate),
    },
    {
      operator: '!',
      name: 'factorial',
      handleOperation: calculate.factorial.bind(calculate),
    },
  ];

  function handleOperation(a: number, b: number) {
    if (Number(a) < 0 || Number(b) < 0) {
      return;
    }
    OPERATIONS.forEach((operation) => {
      const result = operation.handleOperation(a, b);
      const resultElement: HTMLSpanElement | null = document.querySelector(
        `#${operation.name}`
      );
      if (!resultElement) return;
      // Print text for every operation that is not factorial
      if (operation.name !== 'factorial') {
        resultElement.innerText = `${a} ${operation.operator} ${b} = ${result}`;
        return;
      }
      // Print text for factorial operation
      resultElement.innerText = `${a} ! = ${result}`;
    });
  }

  valueA?.addEventListener('input', () => {
    handleOperation(Number(valueA.value), Number(valueB.value));
  });
  valueB?.addEventListener('input', () => {
    handleOperation(Number(valueA.value), Number(valueB.value));
  });
}
