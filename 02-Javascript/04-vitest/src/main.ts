import './style.css';
import typescriptLogo from './typescript.svg';
import viteLogo from '/vite.svg';
import { setupCounter } from './counter.ts';

export function Sum(a: number, b: number): number {
  return a + b;
}

export function Multiply(a: number, b: number): number {
  return a * b;
}
