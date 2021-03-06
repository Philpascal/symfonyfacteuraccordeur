<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706142802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD enregistrer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27722F0103 FOREIGN KEY (enregistrer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27722F0103 ON produit (enregistrer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27722F0103');
        $this->addSql('DROP INDEX IDX_29A5EC27722F0103 ON produit');
        $this->addSql('ALTER TABLE produit DROP enregistrer_id');
    }
}
