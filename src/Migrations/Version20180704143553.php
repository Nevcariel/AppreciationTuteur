<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180704143553 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE difficulte (id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE domaine (id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE domaine_tuteur (domaine_id INTEGER NOT NULL, tuteur_id INTEGER NOT NULL, PRIMARY KEY(domaine_id, tuteur_id))');
        $this->addSql('CREATE INDEX IDX_59A893464272FC9F ON domaine_tuteur (domaine_id)');
        $this->addSql('CREATE INDEX IDX_59A8934686EC68D8 ON domaine_tuteur (tuteur_id)');
        $this->addSql('CREATE TABLE duree (id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE enquete (id INTEGER NOT NULL, stage_id INTEGER NOT NULL, tuteur_id INTEGER NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D6D86B292298D193 ON enquete (stage_id)');
        $this->addSql('CREATE INDEX IDX_D6D86B2986EC68D8 ON enquete (tuteur_id)');
        $this->addSql('CREATE TABLE entreprise (id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation (id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question (id INTEGER NOT NULL, theme VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, choix BOOLEAN NOT NULL, multiple BOOLEAN NOT NULL, reponses_possibles CLOB DEFAULT NULL --(DC2Type:array)
        , PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reponse (id INTEGER NOT NULL, enquete_id INTEGER NOT NULL, tuteur_id INTEGER NOT NULL, question_id INTEGER NOT NULL, reponse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5FB6DEC75FDC5003 ON reponse (enquete_id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC786EC68D8 ON reponse (tuteur_id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC71E27F6BF ON reponse (question_id)');
        $this->addSql('CREATE TABLE stage (id INTEGER NOT NULL, duree_id INTEGER DEFAULT NULL, difficulte_id INTEGER DEFAULT NULL, stagiaire_id INTEGER NOT NULL, tuteur_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C27C9369D13C140 ON stage (duree_id)');
        $this->addSql('CREATE INDEX IDX_C27C9369E6357589 ON stage (difficulte_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C27C9369BBA93DD6 ON stage (stagiaire_id)');
        $this->addSql('CREATE INDEX IDX_C27C936986EC68D8 ON stage (tuteur_id)');
        $this->addSql('CREATE TABLE stagiaire (id INTEGER NOT NULL, formation_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4F62F7315200282E ON stagiaire (formation_id)');
        $this->addSql('CREATE TABLE tuteur (id INTEGER NOT NULL, entreprise_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, fonction VARCHAR(255) NOT NULL, informatique BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_56412268A4AEAFEA ON tuteur (entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE difficulte');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE domaine_tuteur');
        $this->addSql('DROP TABLE duree');
        $this->addSql('DROP TABLE enquete');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stagiaire');
        $this->addSql('DROP TABLE tuteur');
    }
}
