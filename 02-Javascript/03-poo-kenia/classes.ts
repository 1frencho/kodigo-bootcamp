export class Estudiante {
  //crear la plantilla
  //atributos

  //3 formas de acceso que tenemos
  //public: (acceso dentro de la clase, fuera de clase y clases hijas)
  //protected: (acceso dentro de la clase y clases hijas)
  //private: (acceso dentro de la clase)

  nombre: string;
  apellido: string;
  correo: string;
  protected carnet: string;
  private password: string;
  bootcamp: string;
  rol: string;

  //constructor() => inicializar un objeto
  constructor(
    nombre: string,
    apellido: string,
    correo: string,
    carnet: string,
    pass: string,
    bootcamp: string
  ) {
    //tenemos informacion estatica
    this.nombre = nombre;
    this.apellido = apellido;
    this.correo = correo;
    this.carnet = carnet;
    this.password = pass;
    this.bootcamp = bootcamp;
    this.rol = 'Estudiante';
    //Abstraccion, encapsulamiento, herencia y polimorfismo
    //modificadores de acceso => public(global), protected(dentro de la clase y clases hijas), private(acceso dentro la clase)
  }

  //metodos
  saludar() {
    this.bootcamp = 'FSJ24';
    let valor = 'texto';
    valor;
    this.apellido = 'chacon';
    console.log(`Hola me llamo ${this.nombre} y soy estudiante de Kodigo`);
  }

  //getter y setter (get y set)
  //retornamos la contrasena
  getPassword() {
    return this.password;
  }

  //capturamos el valor de la contrasena
  setPassword(password: string) {
    //password no pase de los 8 caracteres
    if (password.length > 8) {
      //personalizar un error
      throw new Error('Tu contrasena debe tener como minimo 8 caracteres');
      //console.log("Tu contrasena debe tener como minimo 8 caracteres");
    }
    this.password = password;
  }
}
//repaso (quizz) kahoot

//Crear objetos a partir de una clase
//instancies la clase

// let estudiante2 = new Estudiante("Juan","Perez","juan@yahoo.com"); //constructor se inicializa (marcos)
// estudiante2.nombre = "Marcela";
// estudiante2.saludar("Juan");
