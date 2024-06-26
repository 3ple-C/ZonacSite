// Toggle login
let signUp = document.getElementById('signup');
let login = document.getElementById('login');

let createAccount = () => {
    if (signUp.style.display = 'none') {
        signUp.style.display = 'block';
        login.style.display = 'none';
    } else if (signUp.style.display = 'block') {
        signUp.style.display = 'none';
        login.style.display = 'block';
    }

    console.log('block')
}

let signIn = () => {
    if (signUp.style.display = 'block') {
        signUp.style.display = 'none';
        login.style.display = 'block';
    }
}

