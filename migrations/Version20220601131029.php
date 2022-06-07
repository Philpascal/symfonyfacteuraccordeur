<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601131029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE magasin ADD nom VARCHAR(50) NOT NULL, ADD rue VARCHAR(30) NOT NULL, ADD codepostal INT NOT NULL, ADD ville VARCHAR(50) NOT NULL, DROP nom_mag, DROP rue_mag, DROP voie_mag, DROP code_postal_mag, DROP ville_mag, CHANGE numero_mag numero INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE magasin ADD nom_mag VARCHAR(150) NOT NULL, ADD numero_mag INT NOT NULL, ADD rue_mag VARCHAR(50) NOT NULL, ADD voie_mag VARCHAR(50) NOT NULL, ADD code_postal_mag VARCHAR(50) NOT NULL, ADD ville_mag VARCHAR(50) NOT NULL, DROP nom, DROP numero, DROP rue, DROP codepostal, DROP ville');
    }
}
