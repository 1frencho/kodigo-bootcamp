//Funcion declarativa
export function multiplicar(a: number, b: number): number {
  return a * b;
}

multiplicar(10, 5); //50
multiplicar(20, 100);
multiplicar(34, 56);

//expresion de funciones
export const agregarProducto = (): boolean => {
  return true;
};

//void() => no retorna valores
export function saludar(): void {
  //no retorna valores
  console.log('Hola');
}
