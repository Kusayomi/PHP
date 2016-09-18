<?php 
class Personnage
{
  private $_id,
          $_degats,
          $_nom,
          $_niveau,
          $_experience,
          $_forcePerso,
          $_nombreCoup,
          $_dateCoup,
          $_dateCreation,
          $_dateConnexion;

  const CEST_MOI = 1;
  const PERSONNAGE_TUE = 2;
  const PERSONNAGE_FRAPPER = 3;
  const PERSO_ENDORMI = 4;
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) 
    {
      $method = 'set'.ucfirst($key);

      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  public function estEndormi()
  {
    return $this->_dateCoup > time();
  }
  public function prochainCoup()
  {
    $secondes = $this->_dateCoup; 
    $secondes -= time(); // reste 60 sec

    $heures = floor($secondes / 3600); 
    $secondes -= $heures * 3600; 
    $minutes = floor($secondes / 60);
    $secondes -= $minutes * 60; 

    $heures .= $heures <= 1 ? ' heure' : ' heures';
    $minutes .= $minutes <= 1 ? ' minute' : ' minutes';
    $secondes .= $secondes <= 1 ? ' seconde' : ' secondes';

    return $heures . ', '. $minutes . ' et ' . $secondes;
  }
  public function frapper(Personnage $perso)
  {
    if($perso->id() == $this->_id)
    {
      return self::CEST_MOI;
    }
    if($this->_nombreCoup < 3)
    {
      $this->_nombreCoup += 1;
      $perso->_degats += $this->_forcePerso;
    }
    if($this->_nombreCoup >= 3)
    {     
      $this->_nombreCoup = 0;
      $this->_dateCoup = time() + (60);
    }
    /*if($this->_nombreCoup <= 3 && $this->isJourSuivant(time()))
    {
      $this->_nombreCoup = 0;
      $this->_nombreCoup += 1;
      $perso->_degats += 1;
    }*/
    $this->_dateConnexion = time();
    return $perso->recevoirDegats();
  }
  public function estDeco()
  {
    if(time() - $this->_dateConnexion > 30)
    {
      echo "Vous êtes déconnecter depuis trop longtemps. Vous prenez +1 dégats.
      Pour ne plus être inactif, veuillez frapper un personnage.";
      $this->_degats += 1;
    }
  }
  public function recevoirDegats()
  {
    if($this->_degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }

    return self::PERSONNAGE_FRAPPER;
  }
    // ACTIONS
  public function levelXp()
  {
    $this->_experience += 10;
  }
  public function levelUp()
  {
    $this->_niveau += 1;
    $this->_forcePerso += 5;
    $this->_experience = 0;
  }
  public function atk()
  { $nextDay = time() + (24 * 60 * 60);
    //$this->_nombreCoup += 1;
    $this->_dateCoup = date('d/m/y à H:i:s');
    if($this->_dateCoup <= $nextDay && $this->_nombreCoup < 3)
    {
      $this->_nombreCoup += 1;
    }
  }
    // GETTERS 
  public function degats()
  {
    return $this->_degats;
  }

  public function id()
  {
    return $this->_id;
  }

  public function nom()
  {
    return $this->_nom;
  }

  public function experience()
  {
    return $this->_experience;
  }

  public function niveau()
  {
    return $this->_niveau;
  }

  public function forcePerso()
  {
    return $this->_forcePerso;
  }

  public function nombreCoup()
  {
    return $this->_nombreCoup;
  }

  public function dateCoup()
  {
    return $this->_dateCoup;
  }

  public function dateCreation()
  {
    return $this->_dateCreation;
  }

  public function dateConnexion()
  {
    return $this->_dateConnexion;
  }
    // SETTERS 
  public function setNom($nom)
  {
    if(is_string($nom))
    {
      $this->_nom = $nom;
    }
  }

  public function setId($id)
  {
    $id = (int) $id;

    if($id > 0)
    {
      $this->_id = $id;
    }
  }

  public function setDegats($degats)
  {
    $degats = (int) $degats;

    if($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;

    if($niveau > 0 && $niveau <= 100) 
    {
        $this->_niveau = $niveau;
    }
  }

  public function setExperience($experience)
  {
    $experience = (int) $experience;

    if($experience >= 0 && $experience <= 100 )
    {
       $this->_experience = $experience;
    }
  }

  public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;

    if($forcePerso >= 0 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }

  public function setNombreCoup($nombreCoup)
  {
    $nombreCoup = (int) $nombreCoup;
    $this->_nombreCoup = $nombreCoup;  
  }

  public function setDateCoup($dateCoup)
  {
    $this->_dateCoup = (int) $dateCoup;
  }
  public function setDateCreation($dateCreation)
  {
    $this->_dateCreation = $dateCreation;
  }
  public function setDateConnexion($dateConnexion)
  {
    $this->_dateConnexion = $dateConnexion;
  }
  public function nomValide()
  {
    return !empty($this->_nom);
  }
  
}