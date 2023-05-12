<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512201723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, open_am VARCHAR(255) NOT NULL, close_am VARCHAR(255) NOT NULL, open_pm VARCHAR(255) NOT NULL, close_pm VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hours DROP FOREIGN KEY FK_8A1ABD8D9C24126');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE hours');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE days (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hours (id INT AUTO_INCREMENT NOT NULL, day_id INT DEFAULT NULL, open INT NOT NULL, close INT NOT NULL, INDEX IDX_8A1ABD8D9C24126 (day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE hours ADD CONSTRAINT FK_8A1ABD8D9C24126 FOREIGN KEY (day_id) REFERENCES days (id)');
        $this->addSql('DROP TABLE planning');
    }
}
