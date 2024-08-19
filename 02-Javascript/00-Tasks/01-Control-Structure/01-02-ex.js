/* 
EJERCICIO 1: Crear una función que en base a la edad que ingreso el usuario devolver un
mensaje si la persona es mayor de edad o no. Utilizar para la condición el operador ternario.
*/

function isAdult(age) {
  const ageInt = parseInt(age);
  if (isNaN(ageInt)) return 'Invalid value. Age must be a number. Ex(1-110)';
  if (ageInt <= 0 || ageInt > 110) {
    return 'Invalid range. Type a valid number between (1-110)';
  }
  const yearsText = ageInt > 1 ? 'years old' : 'year old';
  return ageInt >= 18 && ageInt <= 110
    ? `Age: (${ageInt} ${yearsText}). Person is an adult.`
    : `Age: (${ageInt} ${yearsText}). Person is a young minor.`;
}
console.log('Exercise 1: ' + isAdult('1'));

/*
EJERCICIO 2: Crear una función que determine la nota final de un alumno, la cual depende
de lo siguiente: 
• Examen =20%
• tareas = 40%
• asistencia = 10%
• investigación = 30%

grades: {
  final_test: number,
  tasks: number,
  attendance: number,
  research: number,
}
*/

function studentResume(studentName, studentId, grades) {
  if (
    !studentName ||
    !studentId ||
    !grades.final_test ||
    !grades.tasks ||
    !grades.attendance ||
    !grades.research
  ) {
    return 'All fields are required';
  }

  const formatGrades = {
    // ...grades,
    final_test: parseFloat(grades.final_test),
    tasks: parseFloat(grades.tasks),
    attendance: parseFloat(grades.attendance),
    research: parseFloat(grades.research),
  };

  // Check for each valid item and correct range.
  for (const key in formatGrades) {
    const element = formatGrades[key];
    if (isNaN(element)) {
      return `${key} has an invalid type, it must be a number.`;
    } else if (element < 1 || element > 10) {
      return `${key} has an invalid range, it must be between 1 and 10.`;
    }
  }

  // Calculate each grade by percentage.
  // Ex. Final_test: 9.5 * 0.20 = 1.9 of 10
  const calculatedGrades = {
    final_test: formatGrades.final_test * 0.2,
    tasks: formatGrades.tasks * 0.4,
    attendance: formatGrades.attendance * 0.1,
    research: formatGrades.research * 0.3,
  };

  const average =
    calculatedGrades.final_test +
    calculatedGrades.tasks +
    calculatedGrades.attendance +
    calculatedGrades.research;

  return {
    studentName,
    studentId,
    average,
  };
}

const grades = {
  final_test: 10,
  tasks: 9,
  attendance: 10,
  research: 5,
};

const result = studentResume('Marcos', 'MA-2024', grades);

console.log('Exercise 2: ', result);
