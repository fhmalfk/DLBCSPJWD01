/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

// When the user scrolls the page, execute stick function
window.onscroll = function() {stick()};
function stick() {
// Get the header
var header = document.getElementById("myTopnav");
// Get the offset position of the navbar
var sticky = header.offsetTop;
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

//Create an interval changing element on the webpage, execute the function when the window loads
window.onload = function changeText () {
//The array will make up all elements which are displayed in sequence
  var words = ['Free shipping', '20% off', 'Free stuff','Free everything!!!!']; 
  var i=0;
  // Use the java interval function to execute our code every 3000 milliseconds 
  setInterval(function() { 
    //Exchange the defined HTML-element with the array value of our i-th key
    document.getElementById("changing").innerHTML =( words[ i ] ); 
    i ++;
    //Reset the increment value to zero, when its length equals the lenght of our array
    if (i == words.length){
      i = 0;
    }
  }, 3000);
}
//Display a success message when articles were added to the shopping cart
  function addedSuccess() {
    alert("Article added successfully");
  }



  