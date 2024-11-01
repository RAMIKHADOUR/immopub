<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241030205105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE typesproperty (id INT AUTO_INCREMENT NOT NULL, types_property VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propertys ADD typesproperty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C42B05204 FOREIGN KEY (typesproperty_id) REFERENCES typesproperty (id)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C42B05204 ON propertys (typesproperty_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C42B05204');
        $this->addSql('DROP TABLE typesproperty');
        $this->addSql('DROP INDEX IDX_7AEEC2C42B05204 ON propertys');
        $this->addSql('ALTER TABLE propertys DROP typesproperty_id');
    }
}
