/* 
EJERCICIO 5: Realizar una función para una tienda de coches en donde se deberá calcular:
Si el coche a la venta es un FORD FIESTA, aplicar un 5% de descuento en la compra. Si el
coche a la venta es un FORD FOCUS, el descuento será del 10% y si es un FORD ESCAPE
el descuento será del 20%. Mostrar en html el coche seleccionado y el descuento que se
aplicara en base a lo que selecciono el usuario.
*/

const CARS = [
  {
    id: 1,
    brand: 'Ford',
    model: 'Fiesta',
    image:
      'https://www.lacitycars.com/blog/wp-content/uploads/2023/12/1_658189e668a25.jpg',
    price: 4500,
    discount: 5,
  },
  {
    id: 2,
    brand: 'Ford',
    model: 'Focus',
    image:
      'https://www.autonocion.com/wp-content/uploads/2021/08/Ford-Focus-ST-Edition-14-1130x754.jpg',
    price: 8000,
    discount: 10,
  },
  {
    id: 3,
    brand: 'Ford',
    model: 'Escape',
    image:
      'https://img.remediosdigitales.com/cef723/ford-escape-hybrid-2023-mexico-precio_/840_560.jpg',
    price: 8800,
    discount: 20,
  },
];

const carsContainer = document.getElementById('cars-container');
const totalContainer = document.getElementById('total-container');
const model = document.getElementById('model');
const price = document.getElementById('price');
const discount = document.getElementById('discount');
const totalDiscount = document.getElementById('totalDiscount');
const total = document.getElementById('total');

function selectCar(id_car) {
  const selectedCar = CARS.find((cars) => cars.id == id_car);
  const totalDiscountTxt = parseFloat(
    selectedCar.price * (selectedCar.discount / 100)
  );
  const totalToPay = parseFloat(selectedCar.price - totalDiscountTxt);
  model.innerText = selectedCar.model;
  price.innerText = `$${selectedCar.price.toString()}`;
  discount.innerText = `Discount (${selectedCar.discount}%):`;
  totalDiscount.innerText = `-$${totalDiscountTxt}`;
  total.innerText = `$${totalToPay}`;
  // Scroll to total container
  totalContainer.scrollIntoView({ behavior: 'smooth' });

  return {
    selectedCar,
    totalDiscountTxt,
    totalToPay,
  };
}

CARS.forEach((car) => {
  const card = document.createElement('div');
  card.classList.add('col-md-6', 'col-lg-4');
  card.innerHTML = `<div class="card p-4 h-100">
    <img class="img-fluid" src="${car.image}" alt="${car.brand}"/>
    <div class="d-flex justify-content-between mt-4">
      <h2 class="fs-6">
        ${car.brand} ${car.model} <span class="text-warning">(${car.discount}%)</span>
      </h2>
      <p class="fw-bold text-muted">$${car.price}</p>
    </div>
    <button class="btn btn-info text-white fw-bold w-100" onclick="selectCar(${car.id})">
      Select
    </button>
  </div>`;
  carsContainer.appendChild(card);
});
