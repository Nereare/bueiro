<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410205649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD classification_pre VARCHAR(16) NOT NULL, ADD classification_pos VARCHAR(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP classification_pre, DROP classification_pos');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP classification_pre, DROP classification_pos');
        $this->addSql('ALTER TABLE user ADD classification_pre VARCHAR(16) NOT NULL, ADD classification_pos VARCHAR(16) DEFAULT NULL');
    }
}
