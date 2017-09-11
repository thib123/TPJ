//conditions

var speed = 70;


if(speed<80)
{
	if(speed < 50)
	{
		console.log("Accélère papi");
	}
	else{
		console.log("Vitesse ok!");
	}
}
else if(speed < 100)
{
	console.log("ralentir un peu")
}
else // sup à 100
{
	console.log("Ralentir de toute urgence !");
}


// le switch 

var favoriteColor = "blue";

switch(favoriteColor)
{
	case "yellow":
	case "blue":
			console.log("c'est bleu / jaune");
		break;
	case "red":
			console.log("c'est rouge");
		break;

		default:
			console.log("Couleur inconnue");

}	

// boucles

var number = 0;

do
{
	console.log(number);
	number++;
}
while(number<3);

/*while(number<3)
{
	console.log(number);
	number++; // pas de boucles infinies
}*/

// le for

for(var number = 0; number < 5; number++)
{
		console.log(number);
}


// fonctions + scopes

function multiply(number1,number2)
{
	return number1*number2;
	/*return result; // retourner une valeur*/
}

var a = 5;
var b = 6;

var result = multiply(a,b);

console.log(result);

//

function multiply(number1,number2,number3)
{
	var resultMultiply = number1*number2*number3; // connue seulement dans la fonction (avec le var)
	return resultMultiply;
}

var a = 5;
var b = 6;

var result = multiply(a,b,a);

console.log(result);

// Array

var fruits = ["Pomme", "Banane", "Orange", "Pêche"];

for(var i = 0; i < fruits.length; i++)
{
	console.log(fruits[i]);
}
/*console.log(fruits.length); => Donne 4*/
/*console.log(fruits); => imprime les 4 */
/* console.log(fruits[0]); imprime le 1er fruit*/

fruits.push("Kiwi"); /* Push = add, pop=enlève dernière valeur */
console.log(fruits);

var agrumes = fruits.slice(2,4); /* 2 a 4 (non inclu) */
console.log(agrumes);

//
var myArray = [[0,1] , [5,7,8] , [12,18]];

console.log(myArray[1][1]); /* => 7 */

// objects

var dog = { 
			Name: "Poly", 
			color: "White",
			age: 4
			};

for (var property in dog)
{
	console.log(dog[property]);
}

/* ou/et */
console.log(dog.age); /* etc */
console.log(dog["color"]);

// construct
var dog = new Object();
dog.name = "Poly";
dog.color = "white";
dog.age = "4";
// + methode
dog.aboyer = function(number);
{
	while(number>0)
	{
			console.log(number.toString() + "Wouaf");
			number--;

	}
}
dog.aboyer(4);

// prototypes 

function Dog(name, color, age)
{
	this.name = name;
	this.color = color;
	this.age = age;
	this.aboyer = function()
	{
		console.log("Wouaf" + this.name);
	}
}

var berger = new Dog("Poly", "White"; 5);
var caniche = new Dog("Rex", "black", 2);
console.log(berger);
console.log(caniche);

berger.aboyer();