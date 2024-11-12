import { Multiply, Sum } from '../main';
import { describe, it, test, expect } from 'vitest';

describe('Calculator Tests', () => {
  test('should sum two numbers', () => {
    expect(Sum(1, 2)).toBe(3);
  });

  test('should multiply two numbers', () => {
    expect(Multiply(1, 2)).toBe(2);
  });
});
