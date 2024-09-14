/**
EJERCICIO 5. Crear una clase abstracta Persona y va contener lo siguiente:
Atributos: nombre, apellido, dirección, teléfono y edad.
Métodos: 
•	Crear un método constructor para recibir los datos.
•	Crea un método que en base a la edad imprima un mensaje si es mayor de edad o no.
•	Crea un método para mostrar todos los datos personales (será el método abstracto).
•	Crea una clase extra llamada Empleado y va contener un atributo llamado sueldo.
•	En la clase Empleado añade los métodos cargar sueldo e imprimir sueldo.
•	La clase Empleado va heredar de la clase Persona.
•	Define un objeto de la clase Empleado y que se imprima los datos del empleado y su sueldo.
 */

export abstract class Person {
  name = '';
  lastName = '';
  address = '';
  phoneNumber: string | null = null;
  age = 0;

  constructor(
    name: string,
    lastName: string,
    address: string,
    phoneNumber: string,
    age: number
  ) {
    this.name = name;
    this.lastName = lastName;
    this.phoneNumber = phoneNumber;
    this.address = address;
    this.age = age;
  }

  abstract personalDetails(): object;

  isAdult() {
    // return this.age >= 18 ? true : false;
    return this.age >= 18 ? 'Es mayor de edad' : 'Es menor de edad';
  }
}

export class Employee extends Person {
  salary: number;

  constructor(
    name: string,
    lastName: string,
    address: string,
    phoneNumber: string,
    age: number,
    salary = 0
  ) {
    super(name, lastName, address, phoneNumber, age);
    this.salary = salary;
  }

  personalDetails(): object {
    return {
      name: this.name,
      lastName: this.lastName,
      address: this.address,
      phoneNumber: this.phoneNumber,
      age: this.age,
      salary: this.salary,
    };
  }

  setSalary(amount: number) {
    this.salary = amount;
  }

  getSalary(): number {
    return this.salary;
  }
}
