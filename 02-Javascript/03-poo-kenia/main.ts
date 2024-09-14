import './style.css';
import sintaxisTS from './syntax';
import { variable1 } from './test';
import { Estudiante } from './classes';
import { Coach } from './extends';

//Llamando a la funcion de sintaxis
sintaxisTS();
console.log(variable1);
//creando un objeto
let estudiante1 = new Estudiante(
  'Kenia',
  'Chacon',
  'kenia@gmail.com',
  'KP001',
  '123',
  'FSJ24'
); //inicializar el constructor
console.log(estudiante1);
estudiante1.nombre = 'Maria Jose';
estudiante1.apellido = 'Ramirez';
estudiante1.bootcamp = 'Bootcamp FSJ24A';
//estudiante1.carnet = "KP455";
// estudiante1.password = "hh";
console.log(estudiante1.apellido);

estudiante1.saludar();
//Utilizando metodo get y set
estudiante1.setPassword('KP2024');
console.log(estudiante1.getPassword());

//crear un coach ()
let coach = new Coach(
  'Oscar',
  'Lemus',
  'oscar@kodigo.org',
  'oscar',
  '12345-6',
  'FSJ22'
);
console.log(coach);
coach.getDui(); //12345-6
coach.verPerfil();
