<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503203605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B285A794A');
        $this->addSql('DROP INDEX IDX_8B27C52B285A794A ON devis');
        $this->addSql('ALTER TABLE devis DROP devisrep_d_id');
        $this->addSql('ALTER TABLE user ADD user_repondre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F472FFF5 FOREIGN KEY (user_repondre_id) REFERENCES devis (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F472FFF5 ON user (user_repondre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD devisrep_d_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B285A794A FOREIGN KEY (devisrep_d_id) REFERENCES devis (id)');
        $this->addSql('CREATE INDEX IDX_8B27C52B285A794A ON devis (devisrep_d_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F472FFF5');
        $this->addSql('DROP INDEX IDX_8D93D649F472FFF5 ON user');
        $this->addSql('ALTER TABLE user DROP user_repondre_id');
    }
}
