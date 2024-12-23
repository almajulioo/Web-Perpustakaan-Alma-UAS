// function untuk mengatur cookie
function setCookie(name, value, days = 1) {
  const date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/`;
}

function getCookie(name) {
  const cookies = document.cookie.split("; ");
  for (const cookie of cookies) {
    const [key, value] = cookie.split("=");
    if (key === name) {
      return value;
    }
  }
  return null;
}

function deleteCookie(name) {
  setCookie(name, "", -1);
}

// Handle form cookie
const cookieForm = document.querySelector(".cookie-form");

cookieForm.addEventListener("submit", (event) => {
  const cookieName = cookieForm.elements.cookie_name.value;
  const cookieValue = cookieForm.elements.cookie_value.value;
  const action = event.submitter.value;

  if (action === "get") {
    event.preventDefault();
    const cookieMessage = document.getElementById("cookieMessage");
    cookieMessage.textContent = `Value : ${getCookie(cookieName)}`;
  } else if (action === "set") {
    setCookie(cookieName, cookieValue);
  }
  cookieForm.reset();
});

// Ganti theme
document.addEventListener("DOMContentLoaded", () => {
  if (getCookie("theme") === "dark") {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
});
