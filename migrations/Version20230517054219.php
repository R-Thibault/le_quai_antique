<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517054219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning DROP open_am, DROP close_am, DROP open_pm, DROP close_pm');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning ADD open_am DOUBLE PRECISION DEFAULT NULL, ADD close_am DOUBLE PRECISION DEFAULT NULL, ADD open_pm DOUBLE PRECISION DEFAULT NULL, ADD close_pm DOUBLE PRECISION DEFAULT NULL');
    }
}
