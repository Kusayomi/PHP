<?php 
class PersonnagesManager 
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function add(Personnage $perso)
  {
    $q = $this->_db->prepare('INSERT INTO personnages SET nom = :nom, degats = :degats, niveau = :niveau, 
                              experience = :experience, forcePerso = :forcePerso, dateCreation = NOW()');
    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->execute();

    $perso->hydrate([
      'id' => $this->_db->lastInsertId(),
      ]);
  }

  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
  }

  public function delete(Personnage $perso)
  {
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function exists($info)
  {
    if(is_int($info))
    {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
    }

    $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
    $q->execute([':nom' => $info]);

    return (bool) $q->fetchColumn();
  }

  public function update(Personnage $perso)
  {
    $q = $this->_db->prepare('UPDATE personnages SET degats = :degats, experience = :experience, niveau = :niveau, 
                              forcePerso = :forcePerso, nombreCoup = :nombreCoup, dateCoup = :dateCoup, 
                              dateConnexion = :dateConnexion  WHERE id = :id');

    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':nombreCoup', $perso->nombreCoup(), PDO::PARAM_INT);
    $q->bindValue(':dateCoup', $perso->dateCoup(), PDO::PARAM_INT);
    $q->bindValue(':dateConnexion', $perso->dateConnexion(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function get($info)
  {
    if(is_int($info))
    {
      $q = $this->_db->query('SELECT id, nom, degats, niveau, experience, forcePerso, nombreCoup, dateCoup, dateConnexion, dateCreation FROM personnages WHERE id = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      return new Personnage($donnees);
    }
    else
    {
      $q = $this->_db->prepare('SELECT id, nom, degats, niveau, experience, forcePerso, nombreCoup, dateCoup, dateConnexion, dateCreation FROM personnages WHERE nom = :nom');
      $q->execute([':nom' => $info]);

      return new Personnage($q->fetch(PDO::FETCH_ASSOC));
    }   
  }

  public function getList($nom)
  {
    $persos = [];

    $q = $this->_db->prepare('SELECT id, nom, degats, niveau, experience, forcePerso, nombreCoup, dateCoup, dateConnexion, dateCreation FROM personnages WHERE nom <>:nom ORDER BY nom');
    $q->execute([':nom' => $nom]);

    while($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($donnees);
    }
    return $persos;
  }
}