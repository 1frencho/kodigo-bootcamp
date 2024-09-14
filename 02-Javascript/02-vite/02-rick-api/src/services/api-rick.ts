import { Rick } from '../interfaces/api-rick.interface';

const API_URL = `https://rickandmortyapi.com`;

export async function getCharacters(): Promise<Rick | null> {
  const response = await fetch(`${API_URL}/api/character`);
  const data: Rick = await response.json();
  return data;
}
