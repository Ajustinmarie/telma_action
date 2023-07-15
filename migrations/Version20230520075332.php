<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520075332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actions (id INT AUTO_INCREMENT NOT NULL, id_creation_id INT DEFAULT NULL, type_audit VARCHAR(255) NOT NULL, date_de_laudit DATE NOT NULL, zone_auditee VARCHAR(255) NOT NULL, remarques_commentaires LONGTEXT NOT NULL, pilote_de_laction VARCHAR(255) NOT NULL, cause_racine LONGTEXT DEFAULT NULL, action_curatif VARCHAR(255) DEFAULT NULL, action_correctif LONGTEXT DEFAULT NULL, priorite VARCHAR(255) NOT NULL, processus VARCHAR(255) NOT NULL, delais DATE NOT NULL, date_de_cloture DATE DEFAULT NULL, status VARCHAR(255) NOT NULL, etat_avancement LONGTEXT DEFAULT NULL, case_diffusion TINYINT(1) DEFAULT NULL, liste_diffusion VARCHAR(255) DEFAULT NULL, type_de_risques VARCHAR(255) NOT NULL, INDEX IDX_548F1EF2CED6B6D (id_creation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actions ADD CONSTRAINT FK_548F1EF2CED6B6D FOREIGN KEY (id_creation_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actions DROP FOREIGN KEY FK_548F1EF2CED6B6D');
        $this->addSql('DROP TABLE actions');
    }
}
