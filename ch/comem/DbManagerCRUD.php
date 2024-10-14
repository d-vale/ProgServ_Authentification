<?php

namespace ch\comem;

class DbManagerCRUD implements I_ApiCRUD
{

    private $db;

    public function __construct()
    {
        $config = parse_ini_file('config' . DIRECTORY_SEPARATOR . 'db.ini', true);
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];
        $this->db = new \PDO($dsn, $username, $password);
        if (!$this->db) {
            die("Problème de connection à la base de données");
        }
    }

    public function creeTableUtilisateur(): bool
    {
        $sql = <<<COMMANDE_SQL
            CREATE TABLE IF NOT EXISTS utilisateurs (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
                nom VARCHAR(120) NOT NULL,
                prenom VARCHAR(120) NOT NULL,
                email VARCHAR(120) NOT NULL UNIQUE,
                noTel VARCHAR(20) NOT NULL UNIQUE,
                password VARCHAR(120) NOT NULL
            );
COMMANDE_SQL;

        try {
            $this->db->exec($sql);
            $ok = true;
        } catch (\PDOException $e) {
            $e->getMessage();
            $ok = false;
        }
        return $ok;
    }

    public function ajouteUtilisateur(Utilisateur $utilisateur): int
    {
        $datas = [
            'nom' => $utilisateur->rendNom(),
            'prenom' => $utilisateur->rendPrenom(),
            'email' => $utilisateur->rendEmail(),
            'noTel' => $utilisateur->rendNoTel(),
            'password' => $utilisateur->rendPassword(),
        ];
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, noTel, password) VALUES "
            . "(:nom, :prenom, :email, :noTel, :password);";
        $this->db->prepare($sql)->execute($datas);
        return $this->db->lastInsertId();
    }

    public function rendUtilisateur(string $nom): array
    {
        $sql = "SELECT * From utilisateurs WHERE nom = :nom;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('nom', $nom, \PDO::PARAM_STR);
        $stmt->execute();
        $donnees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $tabUtilisateurs = [];
        if ($donnees) {
            foreach ($donnees as $donneesUtilisateur) {
                $p = new Utilisateur(
                    $donneesUtilisateur["prenom"],
                    $donneesUtilisateur["nom"],
                    $donneesUtilisateur["email"],
                    $donneesUtilisateur["noTel"],
                    $donneesUtilisateur["id"],
                    $donneesUtilisateur["password"],
                );
                $tabUtilisateurs[] = $p;
            }
        }
        return $tabUtilisateurs;
    }

    public function supprimeUtilisateur(int $id): bool
    {
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
