
console.log('coucou 55');
// document.addEventListener('DOMContentLoaded', function () {});

console.log('coucou');
const closeBtn = document.querySelector('.close-button');
const hamburger = document.querySelector('#hamburger');

closeBtn.addEventListener('click', function () {
    hamburger.checked = false; // Décoche la case à cocher
});

    
// var text = document.getElementById('text');
// console.log(text);
// console.log(text.innerText);
let quantite = 1;

const quantiteHTML = document.getElementById('quantite')
const priceHTML = document.getElementById('price')

// Init the price
if (priceHTML){
    priceHTML.innerText = '0';
}

// Init the quantite
if (quantiteHTML) {
    quantiteHTML.innerText = quantite;
}

let pricePerSize = 19.99;

function calculAndUpdatePrice() {
    // toString = Transform into string (permet de manipuler une chaîne de caractères)
    if (priceHTML){
        priceHTML.innerText = (pricePerSize * quantite).toFixed(2).toString();

    }
}
calculAndUpdatePrice()

const lessQuantiteButtonHTML = document.getElementById('less-quantite');

if (lessQuantiteButtonHTML) {
    lessQuantiteButtonHTML.addEventListener('click', () => {
        console.log('---------- [less-quantite] ----------',quantite);
    
        if (quantite > 1) {
            console.log('is more than 1');
            quantite = quantite - 1;
            quantiteHTML.innerText = quantite;
            calculAndUpdatePrice();
        }
    
    
        console.log('Price = ' , quantite)
    });
}

const moreQuantiteButtonHTML = document.getElementById('more-quantite');

if (moreQuantiteButtonHTML){
    moreQuantiteButtonHTML.addEventListener('click', () => {
        console.log('---------- [more-quantite] ----------',quantite);
    
        quantite = quantite + 1;
        quantiteHTML.innerText = quantite;
        calculAndUpdatePrice();
    
        console.log('Price = ' , quantite)
    });
}

const selectSizeHtml = document.getElementById('select-size');



if(selectSizeHtml) {
    selectSizeHtml.addEventListener('change', () => {
        console.log('selectSizeHtml.value =>', selectSizeHtml.value);
    
        if (selectSizeHtml.value === '1.5') {
            pricePerSize = 19.99
        } else {
            pricePerSize = 27.99
        }
        console.log(pricePerSize)
    
    
        calculAndUpdatePrice();
    
    })
}

function calculAndUpdatePrice() {
    const price = (pricePerSize * quantite).toFixed(2);
    if(priceHTML) {
        // Met à jour le contenu du rond-vert avec le prix calculé et le signe €
        priceHTML.innerText = price + '€';
    }
    // const green = document.querySelector('.green-circle span')
    // if (green) {
    //     green.innerText = price + '€';
    // }
}

calculAndUpdatePrice();

/* 
Il initialise une variable quantite à 1.
Il récupère des éléments HTML avec les identifiants quantite et price.
Il initialise le prix à 0 et affiche la quantité initiale.
Il définit la variable pricePerSize à 19.99.
Il définit une fonction calculAndUpdatePrice qui calcule le prix en multipliant pricePerSize par quantite, le formate avec deux décimales et le met à jour dans l'élément HTML du prix.
Il ajoute des gestionnaires d'événements pour les boutons "less-quantite" et "more-quantite" pour augmenter ou diminuer la quantité et mettre à jour le prix en conséquence.
Il ajoute un gestionnaire d'événements pour l'élément select-size qui met à jour pricePerSize en fonction de la sélection.
Il réutilise la fonction calculAndUpdatePrice pour mettre à jour le prix dans un élément HTML avec la classe green-circle en ajoutant le signe €. */

