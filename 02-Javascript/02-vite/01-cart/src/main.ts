import 'bootstrap/dist/css/bootstrap.min.css';
import './style.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'sweetalert2/dist/sweetalert2.min.css';
import {
  addCourse,
  cartSummary,
  checkAlreadyInCart,
  clearCart,
} from './components/cart';

// Calling load function when the DOM is ready

document.addEventListener('DOMContentLoaded', () => {
  const courseList = document.querySelector('#lista-cursos'); // Main
  const cleanBtn = document.querySelector('#vaciar-carrito'); // Clean btn
  courseList?.addEventListener('click', addCourse);
  cleanBtn?.addEventListener('click', clearCart);
  checkAlreadyInCart();
  cartSummary();
});
