<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241030204644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorys (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propertys ADD categorys_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C4A96778EC FOREIGN KEY (categorys_id) REFERENCES categorys (id)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C4A96778EC ON propertys (categorys_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C4A96778EC');
        $this->addSql('DROP TABLE categorys');
        $this->addSql('DROP INDEX IDX_7AEEC2C4A96778EC ON propertys');
        $this->addSql('ALTER TABLE propertys DROP categorys_id');
    }
}
