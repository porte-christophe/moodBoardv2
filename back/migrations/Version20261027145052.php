<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261027145052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE body_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE daily_status (id INT AUTO_INCREMENT NOT NULL, sleep_duration INT NOT NULL, comment LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, user_id INT DEFAULT NULL, mood_id INT DEFAULT NULL, body_status_id INT DEFAULT NULL, INDEX IDX_FA3E52B0A76ED395 (user_id), INDEX IDX_FA3E52B0B889D33E (mood_id), INDEX IDX_FA3E52B0FE51CFFF (body_status_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE feed_back (id INT AUTO_INCREMENT NOT NULL, count INT NOT NULL, created_at DATETIME NOT NULL, user_id INT DEFAULT NULL, mood_id INT DEFAULT NULL, activity_id INT DEFAULT NULL, INDEX IDX_ED592A60A76ED395 (user_id), INDEX IDX_ED592A60B889D33E (mood_id), INDEX IDX_ED592A6081C06096 (activity_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE mood (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, activity_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), INDEX IDX_8D93D64981C06096 (activity_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE daily_status ADD CONSTRAINT FK_FA3E52B0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE daily_status ADD CONSTRAINT FK_FA3E52B0B889D33E FOREIGN KEY (mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE daily_status ADD CONSTRAINT FK_FA3E52B0FE51CFFF FOREIGN KEY (body_status_id) REFERENCES body_status (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A60A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A60B889D33E FOREIGN KEY (mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A6081C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64981C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE daily_status DROP FOREIGN KEY FK_FA3E52B0A76ED395');
        $this->addSql('ALTER TABLE daily_status DROP FOREIGN KEY FK_FA3E52B0B889D33E');
        $this->addSql('ALTER TABLE daily_status DROP FOREIGN KEY FK_FA3E52B0FE51CFFF');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A60A76ED395');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A60B889D33E');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A6081C06096');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64981C06096');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE body_status');
        $this->addSql('DROP TABLE daily_status');
        $this->addSql('DROP TABLE feed_back');
        $this->addSql('DROP TABLE mood');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
