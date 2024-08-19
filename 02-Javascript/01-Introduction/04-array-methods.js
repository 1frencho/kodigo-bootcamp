let people = [
  {
    name: 'Isaac',
    age: 16,
  },
  {
    name: 'Christian',
    age: 20,
  },
  {
    name: 'Edgar',
    age: 39,
  },
  {
    name: 'Carlos',
    age: 55,
  },
  {
    name: 'Pedro',
    age: 25,
  },
];

// Loop through an array
people.map((person) => {
  if (person.age >= 18) {
    console.log(
      `${person.name} tiene ${person.age} años, por lo que es mayor de edad.`
    );
  } else {
    console.log(
      `${person.name} tiene ${person.age} años, por lo que es menor de edad.`
    );
  }
});

// Filter by people who have 18 years or higher.

const legalAgePeople = people.filter((person) => person.age >= 18);

console.log(legalAgePeople);

// Return first person who have 18 years or higher.

people.find((person) => person.age >= 18);

// Add more people at the end.

people.push({
  name: 'Carolina',
  age: 30,
});
console.log(people);

// Add more people at the first of the array.

people.unshift({
  name: 'Lola',
  age: 12,
});

console.log(people);
