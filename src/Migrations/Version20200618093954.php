<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618093954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE soumission');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, mode_financement INT DEFAULT NULL, type_projet INT NOT NULL, statut_id INT DEFAULT NULL, source_projet INT DEFAULT NULL, contact_id INT DEFAULT NULL, site_id INT DEFAULT NULL, responsable_commercial INT DEFAULT NULL, responsable_technique INT DEFAULT NULL, soumission_id INT DEFAULT NULL, societe_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, duree_projet VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_publication DATETIME DEFAULT NULL, date_limite DATETIME DEFAULT NULL, date_creation DATETIME DEFAULT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, budget DOUBLE PRECISION DEFAULT NULL, benifice_net DOUBLE PRECISION DEFAULT NULL, benifice_brut DOUBLE PRECISION DEFAULT NULL, modalite LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json_array)\', path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, client_id INT DEFAULT NULL, user_creator_id INT DEFAULT NULL, devise_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, interne TINYINT(1) DEFAULT \'0\', intitule VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_50159CA9E7A1254A (contact_id), INDEX IDX_50159CA9F6203804 (statut_id), INDEX IDX_50159CA9C645C84A (user_creator_id), INDEX IDX_50159CA973C2F791 (type_projet), INDEX IDX_50159CA9FCF77503 (societe_id), INDEX IDX_50159CA92A7DC957 (responsable_technique), INDEX IDX_50159CA9F6BD1646 (site_id), INDEX IDX_50159CA9E6EAB94F (source_projet), INDEX IDX_50159CA9304A404D (mode_financement), INDEX IDX_50159CA919EB6921 (client_id), INDEX IDX_50159CA9F4445056 (devise_id), INDEX IDX_50159CA9801F9DE6 (soumission_id), INDEX IDX_50159CA9827A00AE (responsable_commercial), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE soumission (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, description LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, duree_mission VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, date_publication DATETIME NOT NULL, date_soumission DATETIME NOT NULL, adresse_depot VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, mode_depot INT NOT NULL, mode_financement INT NOT NULL, path VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, clientId INT NOT NULL, userCreatorId INT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, is_tuneps TINYINT(1) NOT NULL, type_financement INT NOT NULL, source_soumission INT NOT NULL, contact_id INT DEFAULT NULL, site_id INT DEFAULT NULL, ami_id INT DEFAULT NULL, responsable_commercial INT NOT NULL, responsable_technique INT NOT NULL, statut_id INT DEFAULT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, proposition_id INT DEFAULT NULL, INDEX IDX_9495AA2E304A404D (mode_financement), INDEX IDX_9495AA2E680EEF35 (userCreatorId), INDEX IDX_9495AA2EDB96F9E (proposition_id), INDEX IDX_9495AA2E2A7DC957 (responsable_technique), INDEX IDX_9495AA2ECCE66A0B (ami_id), INDEX IDX_9495AA2EE7A1254A (contact_id), INDEX IDX_9495AA2E129088C7 (type_financement), INDEX IDX_9495AA2EB508A243 (mode_depot), INDEX IDX_9495AA2EEA1CE9BE (clientId), INDEX IDX_9495AA2EF6203804 (statut_id), INDEX IDX_9495AA2E827A00AE (responsable_commercial), INDEX IDX_9495AA2EF6BD1646 (site_id), INDEX IDX_9495AA2EE821DB0A (source_soumission), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
