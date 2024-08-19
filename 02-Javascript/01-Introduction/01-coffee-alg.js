/* 

Elabore un algoritmo para una tienda de café que tenga una promoción de descuento para vender al por mayor,
esto dependerá del número de café que compre las personas, si son más o igual de 5 café pero menor o igual a 10 tendrán un 20% de descuento,
si compra más de 10 pero menor o igual a 20 tendrán un 40% de descuento, si compra más de 20 tendrá el 50% de descuento.
Nota: El precio del café es de $25.00

*/

function coffeeShop(quantity) {
  const quantityParse = parseInt(quantity, 10);
  const COFFEE_PRICE = 25.0;
  console.log(quantityParse);
  if (quantityParse <= 0) {
    console.log('Not valid quantity. Please type a higher number.');
    return null;
  }
}

console.log(coffeeShop(0));
