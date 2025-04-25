// Alert message
alert("Welcome! Let's explore some fun facts about life!");

// Variables
let firstName = "Pwan";
let lastName = "Pandit";
let fullName = firstName + " " + lastName;

let averageAge = 72;
let weeksInYear = 52;
let totalWeeks = averageAge * weeksInYear;

// Time of day logic
let hour = new Date().getHours();
let greeting;

if (hour >= 5 && hour < 12) {
  greeting = "Good morning!";
} else if (hour >= 12 && hour < 18) {
  greeting = "Good afternoon!";
} else {
  greeting = "Good evening!";
}

// Display output on screen
document.getElementById("name").innerText = "Full Name: " + fullName;
document.getElementById("weeks").innerText = "Average weeks in a human lifetime: " + totalWeeks;
document.getElementById("greeting").innerText = greeting;

