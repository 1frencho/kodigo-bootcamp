/* 
EJERCICIO 10:
Se cuenta con la siguiente información:
• Las edades de 5 estudiantes del turno mañana.
• Las edades de 6 estudiantes del turno tarde.
• Las edades de 11 estudiantes del turno noche.
Nota: Las edades de cada estudiante se deberán ingresar por la web.
Lo que queremos devolver:
• Obtener el promedio de las edades de cada turno (tres promedios).
• Imprimir dichos promedios (promedio de cada turno).
• Mostrar por pantalla un mensaje que indique cuál de los tres turnos tiene un
promedio de edades mayor.
*/

(function () {
  // Global variables
  let studentList = JSON.parse(localStorage.getItem('studentList')) ?? [];
  const studentListHTML = document.getElementById('student-list');

  const studentForm = document.getElementById('student-form');
  studentForm.addEventListener('submit', addStudent);

  const cleanBtn = document.getElementById('cleanStorage');
  cleanBtn.addEventListener('click', cleanStorage);

  const quantityStudents = document.getElementById('quantityStudents');

  const loadStudentListBtn = document.getElementById('loadStudentList');
  loadStudentListBtn.addEventListener('click', loadStudentList);

  const countMorning = document.getElementById('countMorning');
  const countAfternoon = document.getElementById('countAfternoon');
  const countEvening = document.getElementById('countEvening');

  const maxAverageTurnHTML = document.getElementById('maxAverageTurn');

  const TURNS = ['Morning', 'Afternoon', 'Evening'];

  function studentSummaryAndSchedule() {
    const summary = TURNS.reduce((acc, turn) => {
      const studentsInTurn = studentList.filter(
        (student) => student.turn === turn
      );
      const totalAge = studentsInTurn.reduce(
        (sum, student) => sum + student.age,
        0
      );
      const averageAge =
        studentsInTurn.length > 0 ? totalAge / studentsInTurn.length : 0;
      acc[turn.toLowerCase()] = {
        count: studentsInTurn.length,
        averageAge: averageAge.toFixed(2),
      };

      return acc;
    }, {});
    return summary;
  }

  function addStudent(event) {
    event.preventDefault();

    const { name, age, turn } = event.target;
    const id = crypto.randomUUID();
    studentList.push({
      id,
      name: name.value,
      age: parseInt(age.value, 10),
      turn: turn.value,
    });
    localStorage.setItem('studentList', JSON.stringify(studentList));
    cleanStudentListHTML();
    getStudentList();

    // Clear form
    name.value = '';
    age.value = '';
    turn.value = 'Morning';
    setQuantityStudents(studentList);
  }

  function getStudentList() {
    cleanStudentListHTML();
    studentList.forEach((student) => {
      const item = document.createElement('li');
      item.classList.add('list-group-item');
      item.innerHTML = `
        <div class="d-flex justify-content-between align-items-center">
          <p class="m-0">${student.name} - ${student.age} - ${student.turn}</p>
          <button class="btn btn-danger" type="button" onClick="StudentManager.removeStudent('${student.id}')">
            Delete
          </button>
        </div>
      `;
      studentListHTML.appendChild(item);
    });
    setQuantityStudents(studentList);
  }

  function loadStudentList() {
    studentList = STUDENT_LIST;
    setQuantityStudents(studentList);
    localStorage.setItem('studentList', JSON.stringify(studentList));
    cleanStudentListHTML();
    getStudentList();
  }

  // First panel: Displays the number of students and the average age of the students.
  function setQuantityStudents(students) {
    quantityStudents.innerText = `Current students (${students.length})`;
    const { morning, afternoon, evening } = studentSummaryAndSchedule();
    countMorning.innerText = `${morning.count} students. \n Average age: ${morning.averageAge} years.`;
    countAfternoon.innerText = `${afternoon.count} students. \n Average age: ${afternoon.averageAge} years.`;
    countEvening.innerText = `${evening.count} students. \n Average age: ${evening.averageAge} years.`;
    let maxAverageTurn = 'None';

    if (
      afternoon.averageAge > morning.averageAge &&
      afternoon.averageAge > evening.averageAge
    ) {
      maxAverageTurn = 'Afternoon';
    } else if (
      evening.averageAge > morning.averageAge &&
      evening.averageAge > afternoon.averageAge
    ) {
      maxAverageTurn = 'Evening';
    } else if (
      morning.averageAge > afternoon.averageAge &&
      morning.averageAge > evening.averageAge
    ) {
      maxAverageTurn = 'Morning';
    }
    maxAverageTurnHTML.innerText = `${maxAverageTurn}`;
  }

  function removeStudent(id) {
    studentList = studentList.filter((student) => student.id !== id);
    setQuantityStudents(studentList);
    localStorage.setItem('studentList', JSON.stringify(studentList));
    cleanStudentListHTML();
    getStudentList();
  }

  // It is used on cleaning storage and removing a record.
  function cleanStorage() {
    studentList = [];
    localStorage.removeItem('studentList');
    setQuantityStudents(studentList);
    cleanStudentListHTML();
  }

  function cleanStudentListHTML() {
    studentListHTML.innerHTML = '';
  }

  getStudentList();

  // Mock manual data
  const STUDENT_LIST = [
    {
      id: '4f79f5f4-4601-4672-8a86-b16d72e0e6c4',
      name: 'Marcos',
      age: 18,
      turn: 'Morning',
    },
    {
      id: '0a32d29e-ed32-46fe-82cd-d20141193963',
      name: 'Juan',
      age: 25,
      turn: 'Morning',
    },
    {
      id: 'c035a901-4885-4173-9096-53bf1c068758',
      name: 'Karla',
      age: 17,
      turn: 'Morning',
    },
    {
      id: 'ed79b27a-3787-4690-a5ae-2c00e7713d2b',
      name: 'Carlos',
      age: 18,
      turn: 'Morning',
    },
    {
      id: '5d31d5fb-cd57-4f08-858e-112fa0e1331d',
      name: 'Jesús',
      age: 15,
      turn: 'Morning',
    },
    {
      id: '8fb35831-8d8f-4208-88d6-e7e1c85eac38',
      name: 'Celis',
      age: 17,
      turn: 'Afternoon',
    },
    {
      id: '61615a5e-6f33-48ff-9f50-815b5dcffe61',
      name: 'Félix',
      age: 36,
      turn: 'Afternoon',
    },
    {
      id: '916aad81-60d6-4c7e-8005-364f68c90ec1',
      name: 'Alberto',
      age: 16,
      turn: 'Afternoon',
    },
    {
      id: 'f6f1b0fd-12ac-4ba2-8776-2622dfb8f2ae',
      name: 'Andrea',
      age: 15,
      turn: 'Afternoon',
    },
    {
      id: '5e3ce5c1-6682-4125-8359-ea7c93d6db0d',
      name: 'Fabiola',
      age: 15,
      turn: 'Afternoon',
    },
    {
      id: '0916bf5d-03f0-44e9-9e0e-580e7460b83d',
      name: 'Mauricio',
      age: 18,
      turn: 'Afternoon',
    },
    {
      id: 'a13f17ca-3b73-4f69-8a82-39cd7cf29c37',
      name: 'Ángel Pérez',
      age: 18,
      turn: 'Evening',
    },
    {
      id: '2f36da74-a350-41ba-a94b-54d79dceaf57',
      name: 'Juan Torres',
      age: 25,
      turn: 'Evening',
    },
    {
      id: '527fc961-75e8-404f-8229-4508e31c4243',
      name: 'Sofia Maldonado',
      age: 33,
      turn: 'Evening',
    },
    {
      id: '394ed7f7-c882-41e4-9872-0fd3beace15d',
      name: 'Carlos Alberto',
      age: 33,
      turn: 'Evening',
    },
    {
      id: 'fb2c3cb9-f475-4b74-90d5-ace7f21d69f7',
      name: 'Sonia Paz',
      age: 19,
      turn: 'Evening',
    },
    {
      id: '18484399-bb0b-4505-a852-f13408587abc',
      name: 'Kevin',
      age: 29,
      turn: 'Evening',
    },
    {
      id: '059de497-c230-456b-bf31-44d758d004df',
      name: 'Ximena ',
      age: 19,
      turn: 'Evening',
    },
    {
      id: 'aaa5e331-bcab-415a-9c36-de2972446180',
      name: 'Christian',
      age: 29,
      turn: 'Evening',
    },
    {
      id: '6f7ac49f-13b4-4439-b572-cacf32fb98d4',
      name: 'Ronaldo',
      age: 33,
      turn: 'Evening',
    },
    {
      id: '04a26c13-7d74-4e64-8b83-cc935efd8a1d',
      name: 'Juan Carlos',
      age: 44,
      turn: 'Evening',
    },
    {
      id: '34a85898-7221-49e2-968f-01365505cbd2',
      name: 'Kwon Nayeon',
      age: 23,
      turn: 'Evening',
    },
  ];
  // New thing learned. Expose necessary functions globally.
  window.StudentManager = {
    removeStudent,
  };
})();
