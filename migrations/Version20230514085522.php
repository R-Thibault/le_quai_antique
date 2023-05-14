<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230514085522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF346685B4EB289');
        $this->addSql('DROP TABLE big_categories');
        $this->addSql('DROP INDEX IDX_3AF346685B4EB289 ON categories');
        $this->addSql('ALTER TABLE categories DROP big_category_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE big_categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categories ADD big_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF346685B4EB289 FOREIGN KEY (big_category_id) REFERENCES big_categories (id)');
        $this->addSql('CREATE INDEX IDX_3AF346685B4EB289 ON categories (big_category_id)');
    }
}
