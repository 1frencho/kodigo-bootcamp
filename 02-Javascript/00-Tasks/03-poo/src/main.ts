import './input.css';

// Exercise 1

import { Exercise1 } from './exercises/ex1';
import { Exercise2 } from './exercises/ex2';
import { Song } from './exercises/ex3';
import { Account } from './exercises/ex4';
import { Employee } from './exercises/ex5';

addEventListener('DOMContentLoaded', () => {
  // Exercise 1
  Exercise1();
  // Exercise 2
  Exercise2();

  // Exercise 3
  const LVLY = new Song('LVLY', 'K-pop');
  LVLY.setAuthor('Kep1er');
  console.log('Exercise 3');
  console.table(LVLY.getSongDetails());

  // Exercise 4
  console.log('Exercise 4');

  const accountManagement = new Account(
    'Marcos Alfaro',
    50,
    'Personal',
    123123341
  );
  accountManagement.deposit(400);
  console.table(accountManagement.showAccountSummary());
  accountManagement.withdraw(35);
  console.table(accountManagement.showAccountSummary());
  // Warn: Funds are not enough
  accountManagement.withdraw(465);

  // Exercise 5
  console.log('Exercise 5');

  const softwareDevelopmentEmployee = new Employee(
    'Marcos',
    'Alfaro',
    'La Libertad...',
    '6666-9999',
    18
  );
  softwareDevelopmentEmployee.setSalary(2100);
  console.table(softwareDevelopmentEmployee.personalDetails());

  document.querySelector('body')?.classList?.remove('hidden');
});
