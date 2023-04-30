// global Variables
let emailInput = document.getElementById("emailIn"),
  submitBtn = document.querySelector("input[type=submit]"),
  passWord1 = document.getElementById("pw1"),
  passWord2 = document.getElementById("pw2"),
  msgBox = document.querySelector(".msgBox"),
  matched = false,
  passComf = false,
  databaseCheck = false;

// message Function
function setMsg(m) {
  msgBox.textContent = m;
  msgBox.classList.remove("hide");
}

// controll form
submitBtn.addEventListener("click", (e) => {
  //================================= cheking database Ajax ==================================
  let request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.status === 200 && request.readyState === 4) {
      if (request.responseText == "alreadyUsed") {
        databaseCheck = false;
        setMsg("l'email que vous insérez est déjà utilisé");
      } else {
        databaseCheck = true;
      }
    }
  };
  request.open("POST", "CONTROLL/checkEmail.php", true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.send(`email=${emailInput.value}`);
  // ==================================================================

  if (emailInput.value.match(/\w+@\w+.(com|ma|org|ofppt-edu|info)/gi)) {
    matched = true;
  } else {
    matched = false;
    setMsg("l'email que vous insérez est invalide.");
  }
  if (passWord1.value == passWord2.value) {
    passComf = true;
  } else {
    passComf = false;
    setMsg("les mots de passe doivent être identiques");
  }

  if (matched == false || passComf == false || databaseCheck == false) {
    e.preventDefault();
  }
});

// pour passer verre l'autre input en utilisent clavier key==Enter
let inputs = document.querySelectorAll("input");
inputs.forEach((input, index) => {
  input.addEventListener("keydown", (e) => {
    if (e.key == "Enter") {
      if (index != 3) {
        e.preventDefault();
      }
      inputs[index + 1].focus();
    }
  });
});

// afficher | masquer mot de passe
let showSpan = document.querySelector(".afficher");

passWord2.addEventListener("keyup", () => {
  if (passWord2.value == "") {
    showSpan.style.display = "none";
  } else {
    showSpan.style.display = "block";
  }
});

showSpan.onclick = () => {
  if (showSpan.classList.contains("masquer")) {
    showSpan.textContent = "Afficher";
    showSpan.classList.remove("masquer");
    passWord1.type = "password";
    passWord2.type = "password";
  } else {
    showSpan.textContent = "Masquer";
    showSpan.classList.add("masquer");
    passWord1.type = "text";
    passWord2.type = "text";
  }
};
