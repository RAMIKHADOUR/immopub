<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241030214724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, propertya_id INT DEFAULT NULL, numero_voie INT NOT NULL, type_voie VARCHAR(50) NOT NULL, nom_voie VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postale VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_EF192552B4891E71 (propertya_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresses ADD CONSTRAINT FK_EF192552B4891E71 FOREIGN KEY (propertya_id) REFERENCES propertys (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresses DROP FOREIGN KEY FK_EF192552B4891E71');
        $this->addSql('DROP TABLE adresses');
    }
}
