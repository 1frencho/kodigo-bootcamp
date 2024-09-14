/*

Crear una clase Cabecera Pagina, que contenga 3 métodos, el primer método que obtenga el título, color y fuente de la página, 
El segundo método que indique como desea que aparezca el título si centrado, derecha o izquierda y el tercer método que imprima todas las propiedades.
*/

type Positions = 'center' | 'right' | 'left';
type Fonts = 'Arial' | 'Verdana' | 'Georgia' | 'Times New Roman';

interface PageDetails {
  title: string;
  color: string;
  pageFont: Fonts;
  titlePosition: Positions;
}

export class PageHeader implements PageDetails {
  title = '';
  color = '';
  pageFont: Fonts = 'Arial';
  titlePosition: Positions = 'center';

  // constructor(title: string, color: string, pageFont: string) {
  //   this.title = title;
  //   this.color = color;
  //   this.pageFont = pageFont;
  //   this.titlePosition = titlePosition;
  // }
  // 1st Method
  setPageDetails(
    title: string,
    color: string,
    pageFont: Fonts,
    titlePosition: Positions = 'center'
  ) {
    this.title = title;
    this.color = color;
    this.pageFont = pageFont;
    this.titlePosition = titlePosition;
  }
  // 2nd Method
  setTitlePosition(titlePosition: Positions) {
    this.titlePosition = titlePosition;
  }

  // 3rd Method
  printInfo() {
    console.log('Title:', this.title);
    console.log('Color:', this.color);
    console.log('Page Font:', this.pageFont);
    return {
      title: this.title,
      color: this.color,
      pageFont: this.pageFont,
    };
  }
}

export function Exercise1() {
  // Events on HTML

  const formEx1: HTMLFormElement | null = document.querySelector('#form-1');
  const resultCard: HTMLDivElement | null = document.querySelector('#result1');

  formEx1?.addEventListener('submit', (e) => {
    e.preventDefault();
    const allValues = Object.fromEntries(
      new FormData(e.target as HTMLFormElement)
    );
    const { title, color, font, titlePosition } = allValues;
    const pageHeader = new PageHeader();
    pageHeader.setPageDetails(title as string, color as string, font as Fonts);
    pageHeader.setTitlePosition(titlePosition as Positions);
    if (!resultCard) return;

    // Clean result card
    resultCard.innerHTML = '';

    // Create title element
    const titleElement = document.createElement('h2');

    // Text position🥸
    if (titlePosition === 'center') {
      titleElement.classList.add('text-center');
    } else if (titlePosition === 'right') {
      titleElement.classList.add('text-right');
    } else {
      titleElement.classList.add('text-start');
    }
    titleElement.innerText = pageHeader.printInfo().title;

    // Color🎨
    titleElement.style.color = pageHeader.printInfo().color;

    // Font📜
    titleElement.style.fontFamily = pageHeader.printInfo().pageFont;

    resultCard.appendChild(titleElement);
  });
}
