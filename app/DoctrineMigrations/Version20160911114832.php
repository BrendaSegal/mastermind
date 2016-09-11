<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160911114832 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE saved_puzzle_turns (id INT AUTO_INCREMENT NOT NULL, color_id INT DEFAULT NULL, puzzle_id INT DEFAULT NULL, turn_number INT NOT NULL, slot_number INT NOT NULL, INDEX IDX_4F0C5A327ADA1FB5 (color_id), INDEX IDX_4F0C5A32D9816812 (puzzle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE puzzle (id INT AUTO_INCREMENT NOT NULL, generated_by_user_id INT DEFAULT NULL, created_at DATETIME NOT NULL, times_attempted INT NOT NULL, times_won INT NOT NULL, INDEX IDX_22A6DFDF5126D46B (generated_by_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, puzzles_played INT NOT NULL, puzzles_won INT NOT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE puzzle_setup (id INT AUTO_INCREMENT NOT NULL, color_id INT DEFAULT NULL, puzzle_id INT DEFAULT NULL, slot_number INT NOT NULL, INDEX IDX_142128897ADA1FB5 (color_id), INDEX IDX_14212889D9816812 (puzzle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, puzzle_id INT DEFAULT NULL, user_id INT DEFAULT NULL, date DATETIME NOT NULL, number_turns INT NOT NULL, INDEX IDX_32993751D9816812 (puzzle_id), INDEX IDX_32993751A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_puzzle (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, puzzle_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_46A0A4C4A76ED395 (user_id), INDEX IDX_46A0A4C4D9816812 (puzzle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE saved_puzzle_turns ADD CONSTRAINT FK_4F0C5A327ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE saved_puzzle_turns ADD CONSTRAINT FK_4F0C5A32D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
        $this->addSql('ALTER TABLE puzzle ADD CONSTRAINT FK_22A6DFDF5126D46B FOREIGN KEY (generated_by_user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE puzzle_setup ADD CONSTRAINT FK_142128897ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE puzzle_setup ADD CONSTRAINT FK_14212889D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE saved_puzzle ADD CONSTRAINT FK_46A0A4C4A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE saved_puzzle ADD CONSTRAINT FK_46A0A4C4D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE saved_puzzle_turns DROP FOREIGN KEY FK_4F0C5A32D9816812');
        $this->addSql('ALTER TABLE puzzle_setup DROP FOREIGN KEY FK_14212889D9816812');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751D9816812');
        $this->addSql('ALTER TABLE saved_puzzle DROP FOREIGN KEY FK_46A0A4C4D9816812');
        $this->addSql('ALTER TABLE saved_puzzle_turns DROP FOREIGN KEY FK_4F0C5A327ADA1FB5');
        $this->addSql('ALTER TABLE puzzle_setup DROP FOREIGN KEY FK_142128897ADA1FB5');
        $this->addSql('ALTER TABLE puzzle DROP FOREIGN KEY FK_22A6DFDF5126D46B');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751A76ED395');
        $this->addSql('ALTER TABLE saved_puzzle DROP FOREIGN KEY FK_46A0A4C4A76ED395');
        $this->addSql('DROP TABLE saved_puzzle_turns');
        $this->addSql('DROP TABLE puzzle');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE puzzle_setup');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE saved_puzzle');
    }
}
