<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506151640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_repondre_id INT DEFAULT NULL, date_d DATETIME NOT NULL, numero_d INT NOT NULL, rue_d VARCHAR(50) NOT NULL, voie_d VARCHAR(50) NOT NULL, code_postal_d INT NOT NULL, ville_d VARCHAR(50) NOT NULL, message_d VARCHAR(255) NOT NULL, phot_d VARCHAR(255) DEFAULT NULL, INDEX IDX_8B27C52BA76ED395 (user_id), INDEX IDX_8B27C52BF472FFF5 (user_repondre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BF472FFF5 FOREIGN KEY (user_repondre_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE devis');
    }
}
