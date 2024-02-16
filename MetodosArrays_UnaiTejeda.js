//EJERCICIO 1
const numbers = [1, 2, 3, 4, 5];

const multipliedByTwo = numbers.map((number) => number * 2);

console.log(multipliedByTwo);



//EJERCICIO 2
const strings = ['hello', 'world', 'how', 'are', 'you'];

const lengths = strings.map((str) => str.length);

console.log(lengths);


//EJERCICIO 3
const people = [
  { name: 'Alice', age: 25 },
  { name: 'Bob', age: 30 },
  { name: 'Charlie', age: 35 },
  { name: 'Dave', age: 40 }
];

const ages = people.map((person) => person.age);

console.log(ages);


//EJERCICIO 4
const personas = [
  { name: 'Alice', age: 25 },
  { name: 'Bob', age: 17 },
  { name: 'Charlie', age: 35 },
  { name: 'Dave', age: 12 }
];

const minimumAge = 18;

const adults = personas
  .filter((person) => person.age >= minimumAge)
  .map((adult) => ({ name: adult.name, age: adult.age }));

console.log(adults);


//EJERCICIO 5
function maximo(array) {
  if (array.length === 0) {
    return undefined;
  }

  const maxNumber = array.reduce((max, currentNumber) => {
    return (currentNumber > max) ? currentNumber : max;
  }, array[0]);

  return maxNumber;
}

const numero = [4, 8, 2, 10, 5];
const result = maximo(numero);
console.log(result);


//EJERCICIO 6 
function invertirCadena(str) {
  const palabras = str.split(' ');

  const resultado = palabras.reduceRight((cadenaInvertida, palabra) => {
    return cadenaInvertida + ' ' + palabra;
  }, '');

  return resultado.trim();
}
const inputString = 'Hola gente mi nombre es Unai';
const resultadoInvertido = invertirCadena(inputString);
console.log(resultadoInvertido);


//EJERCICIO 7 
function soloPares(array) {
  const numerosPares = array.filter((numero) => numero % 2 === 0);

  return numerosPares;
}

const numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
const numerosPares = soloPares(numeros);
console.log(numerosPares);


//EJERCICIO 8
function palabrasLargas(array, n) {
  const palabrasLargasArray = array.filter((palabra) => palabra.length > n);

  return palabrasLargasArray;
}

const palabras = ['apple', 'banana', 'orange', 'grape', 'kiwi'];
const n = 5;
const palabrasLargasArray = palabrasLargas(palabras, n);
console.log(palabrasLargasArray);


//EJERCICIO 9
function encontrarPalabra(array, busqueda) {
  const palabraEncontrada = array.find((palabra) => palabra === busqueda);

  return palabraEncontrada !== undefined ? palabraEncontrada : null;
}

const words = ['apple', 'banana', 'orange', 'grape', 'kiwi'];
const palabraBusqueda = 'orange';
const palabraEncontrada = encontrarPalabra(words, palabraBusqueda);
console.log(palabraEncontrada);


//EJERCICIO 10
function contarVocales(str) {
  const stringEnMinusculas = str.toLowerCase();

  const vocales = ['a', 'e', 'i', 'o', 'u'];

  const cantidadVocales = stringEnMinusculas.split('').reduce((contador, caracter) => {
    return vocales.includes(caracter) ? contador + 1 : contador;
  }, 0);

  return cantidadVocales;
}

const texto = 'Hola, ¿cómo estás?';
const cantidad = contarVocales(texto);
console.log(cantidad);