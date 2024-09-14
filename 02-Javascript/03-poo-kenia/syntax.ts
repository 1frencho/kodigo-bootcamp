export default function sintaxis() {
  //export
  //Declaracion de variables y constantes
  let nombre: string = 'Kenia';
  let edad: number = 25;
  let decimal: number = 105.67;
  let isEstudainte: boolean = true;
  let nulo: null = null;

  //variable que reciba mas de un tipo de dato
  let valor: number | string;
  valor = 'Hola'; //tipo de dato
  console.log(`Valor: ${valor}, Tipo de dato: ${typeof valor}`);
  valor = 54;
  console.log(`Valor: ${valor}, Tipo de dato: ${typeof valor}`);

  //variable que puede devolver cualquier tipo de dato
  let dato: any;
  dato = true;
  console.log(dato);

  //ARREGLOS, OBJETOS, INTERFACES
  //declarando un arreglo
  let frutas: any[] = ['fresa', 'manzana', 'pera', 'uva', true, 45];
  console.log(frutas);

  //clave - valor (declarando un objeto)
  let persona: object = {
    nombre: 'Kenia',
    apellido: 'Paiz',
    telefono: 4567,
    hobbies: ['ver tele', 'leer', 'dibujar'],
  };
  console.log(persona);
  //guardar libros (varios) = arreglo/ string

  //Tuplas / interfaces
  //Tuplas (condiciones, longitud pretederminada)
  let coordenadas: [number, number, string] = [12.45, 45.33, 'x'];
  coordenadas.push('y');
  console.log(coordenadas);
  //arreglos con objetos (json)

  //arreglo: coleccion de datos [] tipo de datos
  //[23,45,67,78]

  //tuplas: longitud predeterminadas

  let persona1: object = {
    nombre: 'carlos',
  };

  let persona2: object = {
    nombre: 'juan',
    apellido: 'perez',
  };

  interface Persona {
    //estructura de mi objeto
    nombre: string;
    apellido: string;
    telefono: number;
    correo: string;
    saludar(): string; //funcion
  }

  //Declaramos la estructura de la interfaz para cada objeto
  let juan: Persona = {
    nombre: 'juan',
    apellido: 'perez',
    telefono: 5678,
    correo: 'juan@gmail.com',

    saludar() {
      return 'Hola soy Juan, buenas noches';
    },
  };

  let ronee: Persona = {
    nombre: 'ronee',
    apellido: 'vasquez',
    telefono: 3452,
    correo: 'ronee@hotmail.com',

    saludar() {
      return 'Hola soy Ronee, buenas noches';
    },
  };
  //interfaces: declarando objetos
}

//REACT
