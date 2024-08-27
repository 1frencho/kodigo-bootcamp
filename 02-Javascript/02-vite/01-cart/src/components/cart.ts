import Swal from 'sweetalert2';

// Array of courses
interface Course {
  id: string;
  img: string;
  title: string;
  price: number;
}

let coursesCart: Course[] = localStorage.getItem('coursesCart')
  ? JSON.parse(localStorage.getItem('coursesCart') as string)
  : [];

const cartBody = document.querySelector('#lista-carrito tbody');
let addCourseBtns: NodeListOf<HTMLButtonElement> =
  document.querySelectorAll('.button-carrito');

cartBody?.addEventListener('click', removeCourse);

export function addCourse(event: any) {
  if (event?.target?.classList?.contains('button-carrito')) {
    const selectedCourse = event.target.parentElement.parentElement;
    const course = readCourseDetails(selectedCourse);
    if (coursesCart.find((c) => c.id == course.id)) {
      Swal.fire({
        title: '¡Ya existe el curso en el carrito!',
        icon: 'info',
        confirmButtonText: 'Aceptar',
      });
      return;
    }
    coursesCart.push(course);
    console.log(coursesCart);
    renderCart(coursesCart);
    checkAlreadyInCart();

    Swal.fire({
      title: '¡Agregado al carrito!',
      icon: 'success',
      confirmButtonText: 'Aceptar',
    });
  }
}

export function readCourseDetails(courseElement: HTMLElement): Course {
  // Convert info to object
  const course: Course = {
    id: courseElement.querySelector('button')?.getAttribute('data-id') ?? '',
    img: courseElement.querySelector('img')?.src ?? '',
    title: courseElement.querySelector('h5')?.textContent ?? '',
    price:
      Number(courseElement.querySelector('.precio')?.textContent?.slice(1)) ??
      0,
  };
  return course;
}

export function renderCart(courses: Course[]) {
  if (!cartBody) return;
  cartBody.innerHTML = '';
  courses.map((course) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>
        <img src="${course.img}" width="100" />
      </td>
      <td>${course.title}</td>
      <td>${course.price}</td>
      <td>
        <button class="btn btn-danger w-100 delete-course" data-id="${course.id}">
          <i class="bi bi-trash-fill"></i>
        </button>
      </td>
    `;
    cartBody?.appendChild(row);
  });
}

export function removeCourse(event: any) {
  // Check if the clicked element or any of its parents has the 'delete-course' class
  const button = event.target.closest('.delete-course');
  if (button) {
    const idCourse = button.getAttribute('data-id');
    // sweetalert to confirm deletion
    Swal.fire({
      title: '¿Estás seguro de borrar el curso?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, borrar el curso',
    }).then((result) => {
      if (result.isConfirmed) {
        // remove course from cart
        coursesCart = coursesCart.filter((course) => course.id !== idCourse);
        renderCart(coursesCart);
        Swal.fire({
          title: '¡Carrito actualizado!',
          icon: 'success',
          confirmButtonText: 'Aceptar',
        });
        // remove course from cart
        checkAlreadyInCart();
        console.log(coursesCart);
      }
    });
  }
}

export function clearCart() {
  if (!cartBody || coursesCart.length === 0) return;
  renderCart([]);
  coursesCart = [];
  checkAlreadyInCart();
  Swal.fire({
    title: '¡Carrito vaciado!',
    icon: 'success',
    confirmButtonText: 'Aceptar',
  });
}

export function checkAlreadyInCart() {
  addCourseBtns.forEach((btn: HTMLButtonElement) => {
    const courseId = btn.getAttribute('data-id');
    if (coursesCart.find((c) => c.id == courseId)) {
      btn.disabled = true;
      btn.classList.add('disabled');
      btn.textContent = 'Ya existe en el carrito';
    } else {
      btn.disabled = false;
      btn.classList.remove('disabled');
      btn.textContent = 'Agregar al carrito';
    }
  });
  // Every action, save cart.
  saveCart();
  renderCart(coursesCart);
  cartSummary();
}

export function saveCart() {
  localStorage.setItem('coursesCart', JSON.stringify(coursesCart));
}

export function cartSummary() {
  const summary = document.querySelector('#carrito-summary');

  if (!summary) return;
  summary.innerHTML = `
    <p class="m-0">Cantidad: ${coursesCart?.length} </p>
    <p>Precio total: $${coursesCart.reduce(
      (acc, curr) => acc + parseFloat(Number(curr.price).toFixed(2)),
      0
    )}</p>
  `;
}
