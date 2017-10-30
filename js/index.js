//This has to be at the top of the js file
$( "#search-open" ).click(function() {
  $( "#search-container" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});
$(".delete").click(function(){
  var r = confirm("Weet je zeker dat je deze advertentie wilt verwijderen?");
      if (r == true) {
        r = true;
    } else {
       r = false;
    }
    return r;
});

// getting all text objects from login
var email = document.forms["vform"]["email"];
var password = document.forms["vform"]["password"];

// getting all text objects from register
var email = document.forms["rform"]["email"];
var password = document.forms["rform"]["password"];


// getting all error display objects
var email_error = document.getElementById("email_error");
var password_error = document.getElementById("password_error");

// setting all event listeners
email.addEventListener("blur", emailVerify, true);
password.addEventListener("blur", passwordVerify, true);

// validate function
function Validate() {
  //email validation
  if(email.value == "")
  {
    email.style.border = "1px solid #ff5252";
    email_error.textContent = "Email is verplicht";
    email.focus();
    return false;
  }
  if(password.value == "")
  {
    password.style.border = "1px solid #ff5252";
    password_error.textContent = "Wachtwoord is verplicht";
    password.focus();
    return false;
  }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("content-container").style.marginLeft = "250px";
    document.getElementById("mainpic").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("content-container").style.marginLeft= "0";
    document.getElementById("mainpic").style.marginLeft = "0px";
}