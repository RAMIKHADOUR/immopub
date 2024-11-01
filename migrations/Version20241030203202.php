<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241030203202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE propertys (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, etat VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, surface DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, chambres INT NOT NULL, salle_bains INT NOT NULL, etages INT NOT NULL, nomre_etages INT NOT NULL, internet TINYINT(1) NOT NULL, garage TINYINT(1) NOT NULL, piscine TINYINT(1) NOT NULL, camera TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_7AEEC2C48805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C48805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C48805AB2F');
        $this->addSql('DROP TABLE propertys');
    }
}
