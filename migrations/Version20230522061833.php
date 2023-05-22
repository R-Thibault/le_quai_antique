<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522061833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning CHANGE open_am open_am VARCHAR(255) DEFAULT NULL, CHANGE close_am close_am VARCHAR(255) DEFAULT NULL, CHANGE open_pm open_pm VARCHAR(255) DEFAULT NULL, CHANGE close_pm close_pm VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning CHANGE open_am open_am TIME DEFAULT NULL, CHANGE close_am close_am TIME DEFAULT NULL, CHANGE open_pm open_pm TIME DEFAULT NULL, CHANGE close_pm close_pm TIME DEFAULT NULL');
    }
}
