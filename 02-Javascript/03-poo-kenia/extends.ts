//Clase base
class Persona {
  //atributos
  nombre: string;
  apellido: string;
  correo: string;
  protected password: string;
  //el atributo dui va recibir ya sea una cadena o numeros
  private dui: string | number;
  //bootcamp:string; //clase hija donde yo lo necesito

  //metodos en comun
  constructor(
    nombre: string,
    apellido: string,
    correo: string,
    pass: string,
    dui: string | number
  ) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.correo = correo;
    this.password = pass;
    this.dui = dui;
  }

  //creamos el metodo get y set para el atributo privado
  getDui() {
    return this.dui;
  }

  setDui(dui: string | number) {
    this.dui = dui;
  }

  verPerfil() {
    //code..
    console.log(
      `Datos Personales: Nombre Completo ${this.nombre} ${this.apellido}`
    );
  }
}

//CLASES HIJAS
export class Coach extends Persona {
  //atributos exclusivos para el coach
  bootcamp: string;

  constructor(
    nombre: string,
    apellido: string,
    correo: string,
    pass: string,
    dui: string | number,
    bootcamp: string
  ) {
    //reutilizar codigo
    //heredar el constructor padre
    super(nombre, apellido, correo, pass, dui);
    this.bootcamp = bootcamp;
  }

  //cambiamos el comportamiento de un metodo de la clase padre
  verPerfil(): void {
    console.log(
      `Coach: ${this.nombre} ${this.apellido}, Bootcamp: ${this.bootcamp}`
    );
  }
}

//Polimorfismo (el polimorfismo existe solo cuando tenemos herencia)
