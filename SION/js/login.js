function toggleForm() {
    const loginForm = document.getElementById('form-login');
    const registroForm = document.getElementById('form-registro');
    
    loginForm.classList.toggle('oculto');
    registroForm.classList.toggle('oculto');
}

function togglePasswordVisibility(id) {
    const passwordInput = document.getElementById(id);
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
}

function validateRegistrationForm() {
    // Se utiliza '#form-registro' para que coincida con el ID del HTML
    const nombre = document.querySelector('#form-registro input[name="nombre"]').value;
    const apellidos = document.querySelector('#form-registro input[name="apellidos"]').value;
    const correo = document.querySelector('#form-registro input[name="correo"]').value;
    const celular = document.querySelector('#form-registro input[name="celular"]').value;
    const direccion = document.querySelector('#form-registro input[name="direccion"]').value;
    const codigoPostal = document.querySelector('#form-registro input[name="codigo_postal"]').value;
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (!nombre || !apellidos || !correo || !celular || !direccion || !codigoPostal || !password || !confirmPassword) {
        alert("Por favor, completa todos los campos.");
        return false;
    }

    // Validaciones de formato
    const soloNumeros = /^\d+$/;
    if (!soloNumeros.test(celular)) {
        alert("El número de celular solo debe contener dígitos numéricos.");
        return false;
    }
    if (!soloNumeros.test(codigoPostal)) {
        alert("El código postal solo debe contener dígitos numéricos.");
        return false;
    }

    // Validación de la contraseña
    if (password.length !== 10) {
        alert("La contraseña debe ser de exactamente 10 caracteres.");
        return false;
    }
    if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
        return false;
    }
    
    return true;
}