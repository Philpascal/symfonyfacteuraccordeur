<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610190418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photoaccueil (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, carrouselp VARCHAR(80) NOT NULL, carrouseld VARCHAR(80) NOT NULL, carrouselt VARCHAR(80) NOT NULL, carrouselq VARCHAR(80) NOT NULL, carrouselc VARCHAR(80) NOT NULL, prestation VARCHAR(80) NOT NULL, pianod VARCHAR(80) NOT NULL, pianoaq VARCHAR(80) NOT NULL, diapason VARCHAR(80) NOT NULL, accessoir VARCHAR(80) NOT NULL, clef VARCHAR(80) NOT NULL, INDEX IDX_AE15DC15A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photoaccueil ADD CONSTRAINT FK_AE15DC15A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photoaccueil');
    }
}
