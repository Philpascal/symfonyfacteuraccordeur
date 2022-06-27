<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220627112637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_magasin DROP FOREIGN KEY FK_9254D45EF347EFB');
        $this->addSql('ALTER TABLE produit_magasin ADD CONSTRAINT FK_9254D45EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE tel tel INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_magasin DROP FOREIGN KEY FK_9254D45EF347EFB');
        $this->addSql('ALTER TABLE produit_magasin ADD CONSTRAINT FK_9254D45EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE user CHANGE tel tel VARCHAR(10) NOT NULL');
    }
}
