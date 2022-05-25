<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220525160900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP voie, CHANGE rue rue VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE devis RENAME INDEX idx_8b27c52bf472fff5 TO IDX_8B27C52B994500F4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD voie VARCHAR(50) NOT NULL, CHANGE rue rue VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE devis RENAME INDEX idx_8b27c52b994500f4 TO IDX_8B27C52BF472FFF5');
    }
}
