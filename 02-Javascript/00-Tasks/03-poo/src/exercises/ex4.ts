/*
EJERCICIO 4. Crea una clase llamada Cuenta y va contener lo siguiente:
Atributos: nombre, cantidad, tipo de cuenta y número de cuenta.
Métodos: 
•	Crear un constructor que reciba como parámetros el nombre, cantidad, tipo de cuenta y número de cuenta.
•	Crea un método llamado depositar y en base a la cantidad ingresada en el constructor haz una condición de que si la cantidad es menor a $5.00 que se imprima un mensaje que el valor a depositar debe ser mayor a $5.00 y sino solo imprima un mensaje de que se ha depositado correctamente y la cantidad depositada.
•	Crea un método llamado retirar, que reciba un parámetro llamado valor y en base a eso tienes que restar la cantidad menos el valor ingresado e imprimir un mensaje de lo que ha retirado y cuanto le queda en su cuenta.
Nota: Para el método retirar debes de validar que lo que se retire sea mayor de $5.00 ya que si no hay efectivo debes de tirar un mensaje que no hay nada en la cuenta.
•	Crea un método para mostrar los datos de su nombre, tipo de cuenta y número de cuenta. 
•	Define un objeto de la clase Cuenta y llama sus métodos.

*/
type AccountTypes =
  | 'Personal'
  | 'Business'
  | 'Student '
  | 'Savings '
  | 'Checking '
  | null;

interface AccountInterface {
  name: string;
  balance: number;
  type: AccountTypes;
  accountNumber: number | null;
  showAccountSummary: () => void;
}

export class Account implements AccountInterface {
  name = '';
  balance = 0;
  type: AccountTypes = null;
  accountNumber: null | number = null;

  constructor(
    name: string,
    amount: number,
    type: AccountTypes,
    accountNumber: number
  ) {
    this.name = name;
    this.type = type;
    this.accountNumber = accountNumber;
    this.deposit(amount);
  }

  showAccountSummary() {
    return {
      name: this.name,
      balance: this.balance,
      accountType: this.type,
      accountNumber: this.accountNumber,
    };
  }

  deposit(amount: number) {
    if (amount < 5) {
      console.warn('El valor a depositar debe ser mayor a $5.00');
      alert('El valor a depositar debe ser mayor a $5.00');
      return;
    }
    this.balance += amount;
    console.log('Se ha depositado correctamente:', amount);
    return this.showAccountSummary();
  }

  withdraw(amount: number) {
    if (amount < 5) {
      console.warn('El valor a retirar debe ser mayor a $5.00');
      alert('El valor a retirar debe ser mayor a $5.00');
      return;
    } else if (amount > this.balance) {
      console.warn(
        'No tienes fondos suficientes',
        `Balance actual: $${this.balance}`,
        `Intento de retiro: $${amount}`
      );
      return;
    }
    this.balance -= amount;
    console.log('Se ha retirado correctamente:', amount);
    return this.showAccountSummary();
  }
}
