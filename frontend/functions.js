function validateJWT() {
    document.addEventListener('DOMContentLoaded', () => {
        const token = localStorage.getItem('jwt')
        if (!token) {
            window.location.href = 'login.html'
        }
    })
}


function validateJWTLogin() {
    const tokenJWT = localStorage.getItem('jwt')
    if (tokenJWT) {
        window.location.href = 'index.html'
    }
};

document.getElementById("logout").addEventListener("click", logout);

function logout() {
  localStorage.removeItem("jwt");
  window.location.href = 'login.html'
}