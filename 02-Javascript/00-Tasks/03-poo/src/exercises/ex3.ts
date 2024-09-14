/*

EJERCICIO 3. Crea una clase llamada Canción:
Atributos: título, género de la canción y un atributo privado que se llame autor.
Métodos: 
•	Crear un constructor que reciba como parámetros el título y género de la canción.
•	Utiliza los métodos get y set para recibir e imprimir la propiedad autor. 
•	Crea un método para mostrar los datos de la canción. 

*/

interface SongInterface {
  title: string;
  genre: string;
}

export class Song implements SongInterface {
  title = '';
  genre = '';
  private author = '';

  constructor(title: string, genre: string) {
    this.title = title;
    this.genre = genre;
  }

  setAuthor(author: string) {
    this.author = author;
  }

  getAuthor() {
    console.log(this.author);
    return this.author;
  }

  getSongDetails() {
    return {
      title: this.title,
      genre: this.genre,
      author: this.author,
    };
  }
}
