<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512201258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combos_meal (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE days (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes_categories (dishes_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_F7AA1E5AA05DD37A (dishes_id), INDEX IDX_F7AA1E5AA21214B7 (categories_id), PRIMARY KEY(dishes_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hours (id INT AUTO_INCREMENT NOT NULL, day_id INT DEFAULT NULL, open INT NOT NULL, close INT NOT NULL, INDEX IDX_8A1ABD8D9C24126 (day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, dishes_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6AA05DD37A (dishes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meals (id INT AUTO_INCREMENT NOT NULL, combos_meal_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_E229E6EA2DFF666E (combos_meal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishes_categories ADD CONSTRAINT FK_F7AA1E5AA05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dishes_categories ADD CONSTRAINT FK_F7AA1E5AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hours ADD CONSTRAINT FK_8A1ABD8D9C24126 FOREIGN KEY (day_id) REFERENCES days (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id)');
        $this->addSql('ALTER TABLE meals ADD CONSTRAINT FK_E229E6EA2DFF666E FOREIGN KEY (combos_meal_id) REFERENCES combos_meal (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes_categories DROP FOREIGN KEY FK_F7AA1E5AA05DD37A');
        $this->addSql('ALTER TABLE dishes_categories DROP FOREIGN KEY FK_F7AA1E5AA21214B7');
        $this->addSql('ALTER TABLE hours DROP FOREIGN KEY FK_8A1ABD8D9C24126');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA05DD37A');
        $this->addSql('ALTER TABLE meals DROP FOREIGN KEY FK_E229E6EA2DFF666E');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE combos_meal');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE dishes_categories');
        $this->addSql('DROP TABLE hours');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE meals');
    }
}
