document.querySelector("#mtoggle").addEventListener("click", () => {
  document.querySelector("#menu-mobile").classList.toggle("hidden");
});

const userIcon = document.getElementById("userIcon");
const loginModal = document.getElementById("loginModal");
const closeModal = document.getElementById("closeModal");

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

document
  .getElementById("registerForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario recargue la página

    const formData = new FormData(this); // Recoge los datos del formulario

    // Usamos fetch para enviar los datos al servidor sin hacer nada con la respuesta
    fetch("../actions/register.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // Si la respuesta fue exitosa, no hacemos nada
        if (response.ok) {
          // Si deseas mostrar un mensaje de éxito, puedes hacerlo aquí,
          // pero si no quieres hacerlo, simplemente no haces nada.
        } else {
          // Si hay un error con la respuesta, lo puedes manejar aquí.
          console.error("Hubo un error en el registro");
        }
      })
      .catch((error) => {
        // Captura errores si los hay en la petición fetch
        console.error("Error al enviar formulario:", error);
      });
  });
