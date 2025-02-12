// === MENU MOVIL BOTON===
document.querySelector("#mtoggle").addEventListener("click", () => {
  document.querySelector("#menu-mobile").classList.toggle("hidden");
});

// === MODALES PARA REGISTRARSE Y LOGUEARSE ===
const userIcon = document.getElementById("userIcon");
const loginModal = document.getElementById("loginModal");
const closeModal = document.getElementById("closeModal");
const registerModal = document.getElementById("registerModal");
const closeModal2 = document.getElementById("closeModal2");

userIcon.addEventListener("click", function (event) {
  event.preventDefault();
  loginModal.classList.remove("hidden");
});

closeModal.addEventListener("click", function () {
  loginModal.classList.add("hidden");
});

loginModal.addEventListener("click", function (event) {
  if (event.target === loginModal) {
    loginModal.classList.add("hidden");
  }
});

closeModal2.addEventListener("click", function () {
  registerModal.classList.add("hidden");
});

registerModal.addEventListener("click", function (event) {
  if (event.target === registerModal) {
    registerModal.classList.add("hidden");
  }
});

document.querySelector("#registerLink").addEventListener("click", () => {
  loginModal.classList.add("hidden");
  registerModal.classList.remove("hidden");
});

document.querySelector("#loginLink").addEventListener("click", () => {
  registerModal.classList.add("hidden");
  loginModal.classList.remove("hidden");
});

// === PETICION PARA LOGUEARSE===
let login = document.querySelector("#loginForm");
login.addEventListener("submit", (e) => {
  e.preventDefault();

  let divErrores = document.querySelector("#loginErrors");
  divErrores.innerHTML = "";
  let datos = new FormData(login);

  fetch("../actions/login.php", {
    method: "POST",
    body: datos,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data.errors) {
        Object.keys(data.errors).forEach((key) => {
          const errorDiv = document.createElement("div");
          errorDiv.classList.add("text-1xl", "text-red-500", "mb-2");
          errorDiv.textContent = data.errors[key];
          divErrores.appendChild(errorDiv);
        });
      }
      if (data.success) {
        window.location.href = data.redirect;
      }
    });
});

// === PETICION  PARA REGISTRARSE===
let registro = document.querySelector("#registerForm");
registro.addEventListener("submit", (e) => {
  e.preventDefault();

  let divErrores = document.querySelector("#errorContainer");
  divErrores.innerHTML = "";
  let datos = new FormData(registro);

  fetch("../actions/register.php", {
    method: "POST",
    body: datos,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data.errors) {
        Object.keys(data.errors).forEach((key) => {
          const errorDiv = document.createElement("div");
          errorDiv.classList.add("text-1xl", "text-red-500", "mb-2");
          errorDiv.textContent = data.errors[key];
          divErrores.appendChild(errorDiv);
        });
      }
      if (data.success) {
        registerModal.classList.add("hidden");
        loginModal.classList.remove("hidden");
      }
    });
});
