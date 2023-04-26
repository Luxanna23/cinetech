let prenom = document.querySelector("#prenom");
let nom = document.querySelector("#nom");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
let password2 = document.querySelector("#password2");
let formSignUp = document.querySelector("#signup");
let message = document.querySelector("#message");

function isSignUp() {
  if (prenom.value == "") {
    document.getElementById("message").innerText = "Le champs prenom ne peut pas être vide.";
    return false;
  } else if (prenom.value.length < 3) {
    document.getElementById("message").innerText = "Le prénom est trop court";
    return false;
  } else if (nom.value == "") {
    document.getElementById("message").innerText = "Le champs nom ne peut pas être vide.";
    return false;
  } else if (nom.value.length < 3) {
    document.getElementById("message").innerText = "Le nom est trop court";
    return false;
  } else if (email.value == "") {
    document.getElementById("message").innerText =
      "Le champs email ne peut pas être vide.";
    return false;
  } else if (password.value == "") {
    document.getElementById("message").innerText =
      "Le champs mot de passe ne peut pas être vide.";
    return false;
  } else if (password2.value == "") {
    document.getElementById("message").innerText =
      "Le champs confirmation de mot de passe ne peut pas être vide.";
    return false;
  } else if (password.value !== password2.value) {
    document.getElementById("message").innerText =
      "Les deux mots de passe ne sont pas identiques.";
    return false;
  } else {
    return true;
  }
}

formSignUp.addEventListener("submit", (e) => {
  if (isSignUp() == false) {
    e.preventDefault();
  }
});
