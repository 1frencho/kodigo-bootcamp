const CITIES = [
  { id: 0, name: 'Any', country: 'El Salvador' },
  { id: 1, name: 'Palma', country: 'El Salvador' },
  { id: 2, name: 'La costa del Sol', country: 'El Salvador' },
  { id: 3, name: 'Panchimalco', country: 'El Salvador' },
  { id: 4, name: 'Puerto el Triunfo', country: 'El Salvador' },
];

const offers = [
  { from: 1, to: 2, standardPrice: 4, discount: 5 },
  { from: 1, to: 3, standardPrice: 8, discount: 10 },
  { from: 1, to: 4, standardPrice: 15, discount: 15 },
];

function getOffers(origin, destiny) {
  if (isNaN(origin) || isNaN(destiny) || origin === 0 || destiny === 0) {
    return 'Invalid origin or destiny.';
  }

  const selectedOrigin = CITIES.find((city) => city.id === origin);
  const selectedDestiny = CITIES.find((city) => city.id === destiny);

  if (!selectedOrigin || !selectedDestiny) {
    return 'Invalid origin or destiny.';
  }

  const availableOffer = offers.find(
    (offer) =>
      offer.from === selectedOrigin.id && offer.to === selectedDestiny.id
  );

  if (!availableOffer) {
    return {
      selectedOrigin: selectedOrigin.name,
      selectedDestiny: selectedDestiny.name,
      standardPrice: 0,
      discount: 0,
      message: 'No available offers.',
    };
  }
  const totalToPay =
    availableOffer.standardPrice -
    availableOffer.standardPrice * (availableOffer.discount / 100);

  return {
    selectedOrigin: selectedOrigin.name,
    selectedDestiny: selectedDestiny.name,
    discount: availableOffer.discount,
    message: `Discount for trip from ${selectedOrigin.name} to ${selectedDestiny.name} is ${availableOffer.discount}%.`,
    standardPrice: availableOffer.standardPrice,
    totalToPay,
  };
}

console.log(getOffers(1, 2)); // Palma a La costa del Sol
console.log(getOffers(1, 3)); // Palma a Panchimalco
console.log(getOffers(1, 4)); // Palma a Puerto el Triunfo
console.log(getOffers(2, 3)); // La costa del Sol a Panchimalco, 0%
