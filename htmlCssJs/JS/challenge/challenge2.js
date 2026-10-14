const inscription = "!egassap a si sihT";
// Ton code ici
function decryptMessage(message) {
    return message.split('').reverse().join('');
}
console.log(decryptMessage(inscription));
// Attendu : "This is a passage!"