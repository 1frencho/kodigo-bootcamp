// Traditional for

for (let i = 1; i <= 5; i++) {
  console.log(i);
}

const friends = {
  Juan: 10,
  María: 20,
};

// For in

for (let friend in friends) {
  console.log({ friend, age: friends[friend] });
}

// For ... of
const fruits = ['Apple', 'Pear', 'Pineapple', 'Strawberry'];
for (let fruit of fruits) {
  console.log(fruit);
}

// General differences

// Traditional for: It's affordable to control hoy many times do something...

// For-In: It's for watching things by its name, suitable for objects.

// For-Of: It's like checking elements each one, works perfectly for arrays.
// - Easy and secure.
