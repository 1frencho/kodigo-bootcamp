import './style.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { getCharacters } from './services/api-rick';

const charactersHTML = document.getElementById('characters');

async function main() {
  if (!charactersHTML) return;
  try {
    const data = await getCharacters();
    if (!data) return;
    console.log(data);

    data.results.map((character) => {
      const item = document.createElement('div');
      item.classList.add('card');
      item.classList.add('shadow');
      item.style.width = '150px';
      item.innerHTML = `
      <div class="col-md-4 col-sm-6 col-xs-12 w-100">
        <img src="${character.image}" alt="${character.name}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">${character.name}</h5>
          <p class="card-text">${character.status}</p>
        </div>
      </div>
    `;
      charactersHTML.appendChild(item);
    });
  } catch (error) {
    console.error(error);
    charactersHTML.innerHTML = 'Something went wrong';
  }
}

main();
