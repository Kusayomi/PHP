<?php 
class Personnage
{
	protected $timeEndormi;

	const PERSONNAGE_ENSORCELE = 4;
  const PAS_DE_MAGIE = 5;
  const PERSO_ENDORMI = 6;


 	public function estEndormi()
  {
    return $this->timeEndormi > time();
  }

	public function reveil()
  {
    $secondes = $this->timeEndormi;
    $secondes -= time();

    $heures = floor($secondes / 3600);
    $secondes -= $heures * 3600;
    $minutes = floor($secondes / 60);
    $secondes -= $minutes * 60;

    $heures .= $heures <= 1 ? ' heure' : ' heures';
    $minutes .= $minutes <= 1 ? ' minute' : ' minutes';
    $secondes .= $secondes <= 1 ? ' seconde' : ' secondes';

    return $heures . ', '. $minutes . ' et' . $secondes;
  }

  public function lancerUnsort(Personnage $perso)
  {
 		if($this->estEndormi())
    {
      return self::PERSO_ENDORMI;
    }

    $perso->timeEndormi = time() + ($this->atout * 6) * 3600;

    return self::PERSONNAGE_ENSORCELE;
  }
  
  public function timeEndormi()
  {
    return $this->timeEndormi;
  }

  public function setTimeEndormi($time)
  {
    $this->timeEndormi = (int) $time;
  }
}

class PersonnageManager
{
  public function update(Personnage $perso)
  {
    $q = $this->db->prepare('UPDATE personnages SET degats = :degats, timeEndormi = :timeEndormi, atout = :atout WHERE id = :id');

    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':timeEndormi', $perso->timeEndormi(), PDO::PARAM_INT);
    $q->bindValue(':atout', $perso->id(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }
}


page script 
   else
      {
        $persoAEnsorceler = $manager->get((int) $_GET['ensorceler']);
        $retour = $perso->lancerUnSort($persoAEnsorceler);
        
        switch ($retour)
        {
          case Personnage::CEST_MOI :
            $message = 'Mais... pourquoi voulez-vous vous ensorceler ???';
            break;
          
          case Personnage::PERSONNAGE_ENSORCELE :
            $message = 'Le personnage a bien été ensorcelé !';
            
            $manager->update($perso);
            $manager->update($persoAEnsorceler);
            
            break;
          
          case Personnage::PAS_DE_MAGIE :
            $message = 'Vous n\'avez pas de magie !';
            break;
          
          case Personnage::PERSO_ENDORMI :
            $message = 'Vous êtes endormi, vous ne pouvez pas lancer de sort !';
            break;
        }
      }

 page index 
   if ($perso->estEndormi())
  {
    echo 'Un magicien vous a endormi ! Vous allez vous réveiller dans ', $perso->reveil(), '.';
  }
  