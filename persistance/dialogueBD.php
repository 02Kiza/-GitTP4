<?php
require_once 'connexion.php';
class DialogueBD
{
    public function getTousLesEmployesMat()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT NomEmpl, PrenomEmpl, Matricule FROM employe ORDER BY
Matricule";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $ e->getMessage();
        }
    }

    public function getUnEmploye()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE Matricule='E004'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $employe = $sth->fetchObject();
            return $employe;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getEmployesParService($codeService)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE ServEmpl=?";
            $sql = $sql . " ORDER BY NomEmpl";
            $sth = $conn->prepare($sql);
            $sth->execute(array($codeService));
            $tabEmployesService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployesService;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getService($codeService){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT DesiServ FROM service";
            $sth = $conn->prepare($sql);
            $sth->execute(array($codeService));
            $NomService = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $NomService;
        }
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

    }
    public function getTousLesServices(){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM service ORDER BY DesiServ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $mesServices = $sth->fetchAll();
            return $mesServices;
        }
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUnEmployeMat($matricule) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employe WHERE Matricule = ? ORDER BY NomEmpl";
            $sth = $conn->prepare($sql);
            $sth->execute(array($matricule));

            $employe = $sth->fetch(PDO::FETCH_ASSOC);
            return $employe;

        } catch (PDOException $e) {
            $erreur = $e->getMessage();

        }


}
    public function ajoutEmploye($matricule, $nom, $prenom, $cadre, $codeService)
    {
        $ajoutOk=false;
        try {
// Insertion du nouvel employé
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO employe VALUES (?, ?, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($matricule,$nom,$prenom,$cadre,$codeService));
// Variable booléenne indiquant le succès de l'ajout
            $ajoutOk=true;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
        return $ajoutOk;
    }

    public function ajoutService($codeService, $designationService) {
        $ajoutOk = false;
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO service (CodeServ, DesiServ) VALUES (?, ?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($codeService, $designationService));
            $ajoutOk = true;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }

        return $ajoutOk;
    }

    public function supprimeEmploye($matricule) {
        $suppressionOk = false;
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM employe WHERE Matricule = ?";
            $sth = $conn->prepare($sql);
            $suppressionOk = $sth->execute(array($matricule));
        } catch (PDOException $e) {

        }

        return $suppressionOk;
    }
    public function modifierEmploye($matricule, $nom, $cadre) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE employe SET NomEmpl = ?, CodeCadre = ? WHERE Matricule = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($nom, $cadre, $matricule));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

}


