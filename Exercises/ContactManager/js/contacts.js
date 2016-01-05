/* Creation of text for program options */
var options = "Options : \n1 : Lister les contacts \n2 : Ajouter un contact \n0 : Quitter";
/* Create array who contains all contacts */
var tableauContact = [];
/* Create contact object for facilitate creation of on contact */
var Contact = {
    /* initialization of contact and push in into array */
    initContact: function (nom, prenom) {
        this.nom = nom;
        this.prenom = prenom;
        tableauContact.push(this);
    }
};

/* Creation of first contact */
var Carole = Object.create(Contact);
/* Initialization of Carole */
Carole.initContact('Lévisse', 'Carole');

/* Creation of second contact */
var Melodie = Object.create(Contact);
/* Initialization of Melodie */
Melodie.initContact('Nelsonne', 'Mélodie');

/* Default text */
console.info("Bienvenue dans le gestionnaire des contacts !" + "\n" + options);
/* Creation of loop and seized variable declaration */
var saisi, nomContact, prenomContact;
do {
    saisi = Number(prompt("Choisissez une option :"));
    if (saisi == 1) {
        console.info("Voici la liste de tous vos contacts :");
        for (var i = 0; i < tableauContact.length; i++) {
            console.log("Nom : " + tableauContact[i].nom + ", prénom : " + tableauContact[i].prenom);
        }
        console.info(options);
    } else if (saisi == 2) {
        nomContact = prompt("Entrez le nom du nouveau contact :");
        prenomContact = prompt("Entrez le prenom du nouveau contact :");
        var nouveauContact = Object.create(Contact);
        nouveauContact.initContact(nomContact, prenomContact);
        console.info("Le nouveau contact a été ajouté" + "\n" + options);
    }
} while (saisi != 0)
{
    console.info("Au revoir");
}