

const usernameOK= "admin";
const passwordOK= "pugmania";

// écouter le boutton
const loginButtonHTML = document.querySelector("form button");
loginButtonHTML.addEventListener('click', function () {
    console.log('click');


    // regarder que le champ soit bien rempli (  egale username + password, min 6 carac, max 20 carac, min 1 Majuscule, min une minuscule)

    const usernameInputHTML = document.getElementById('username');
    console.log('Username value :' , usernameInputHTML.value);


    const passwordInputHTML = document.getElementById('password');
    console.log('password value :' , passwordInputHTML.value);

    const messageHTML = document.getElementById('message');
    let message = ''

    console.log('usernameInputHTML.value.lenght', usernameInputHTML.value.length)
    if (usernameInputHTML.value.length >= 6){
        console.log ('lenght ok')
    } else {
        console.log ('lenght not ok');
    }
    

    if (usernameInputHTML.value === usernameOK && passwordInputHTML.value === passwordOK){
        console.log ('ok');
        message = message + 'login ok'

    } else {
        console.log ('not ok');
        message = message + 'login not ok'
    }

    messageHTML.innerHTML = message;


// si reussite, message connexion réussie

// si échec, message d'erreur
})




