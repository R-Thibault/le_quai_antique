<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517130425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE restaurant_info (id INT AUTO_INCREMENT NOT NULL, capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planning ADD open_am TIME DEFAULT NULL, ADD close_am TIME DEFAULT NULL, ADD is_closed_am TINYINT(1) NOT NULL, ADD open_pm TIME DEFAULT NULL, ADD close_pm TIME DEFAULT NULL, ADD is_closed_pm TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE restaurant_info');
        $this->addSql('ALTER TABLE planning DROP open_am, DROP close_am, DROP is_closed_am, DROP open_pm, DROP close_pm, DROP is_closed_pm');
    }
}
