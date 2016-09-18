
function verif_formulaire()
{
  var degats = document.formulaire.degats.value;
  var forcePerso = document.formulaire.forcePerso.value;

  if(degats < 0) 
  {
    alert("Veuillez saisir un chiffre compris entre 0 et 100");
    return false;
  }
  if(degats > 100) 
  {
    alert("Veuillez saisir un chiffre compris entre 0 et 100");
    return false;
  }
  if(isNaN(degats))
  {
    alert("Veuillez entrez un chiffre");
    return false;
  }

  if(forcePerso < 0) 
  {
    alert("Veuillez saisir un chiffre compris entre 0 et 100");
    return false;
  }
  if(forcePerso > 100) {
    alert("Veuillez saisir un chiffre compris entre 0 et 100");
    return false;
  }
  if(isNaN(forcePerso))
  {
    alert("Veuillez entrez un chiffre");
    return false;
  }
}