<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221195639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE primary_entity (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test_entity ADD primary_entity_id INT NOT NULL');
        $this->addSql('ALTER TABLE test_entity ADD CONSTRAINT FK_99F143464BBEC0BA FOREIGN KEY (primary_entity_id) REFERENCES primary_entity (id)');
        $this->addSql('CREATE INDEX IDX_99F143464BBEC0BA ON test_entity (primary_entity_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test_entity DROP FOREIGN KEY FK_99F143464BBEC0BA');
        $this->addSql('DROP TABLE primary_entity');
        $this->addSql('DROP INDEX IDX_99F143464BBEC0BA ON test_entity');
        $this->addSql('ALTER TABLE test_entity DROP primary_entity_id');
    }
}
