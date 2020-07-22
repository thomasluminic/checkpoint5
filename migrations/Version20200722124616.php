<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722124616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_user (character_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9A6FC2D11136BE75 (character_id), INDEX IDX_9A6FC2D1A76ED395 (user_id), PRIMARY KEY(character_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raid (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, user_character_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_578763B3A76ED395 (user_id), INDEX IDX_578763B391FAC277 (user_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_user ADD CONSTRAINT FK_9A6FC2D11136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_user ADD CONSTRAINT FK_9A6FC2D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE raid ADD CONSTRAINT FK_578763B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE raid ADD CONSTRAINT FK_578763B391FAC277 FOREIGN KEY (user_character_id) REFERENCES `character` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_user DROP FOREIGN KEY FK_9A6FC2D11136BE75');
        $this->addSql('ALTER TABLE raid DROP FOREIGN KEY FK_578763B391FAC277');
        $this->addSql('ALTER TABLE character_user DROP FOREIGN KEY FK_9A6FC2D1A76ED395');
        $this->addSql('ALTER TABLE raid DROP FOREIGN KEY FK_578763B3A76ED395');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_user');
        $this->addSql('DROP TABLE raid');
        $this->addSql('DROP TABLE user');
    }
}
