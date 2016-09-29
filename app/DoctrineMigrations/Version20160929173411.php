<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929173411 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE puzzle (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, puzzle_code VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_22A6DFDFA76ED395 (user_id), UNIQUE INDEX puzzle_code_idx (puzzle_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_puzzle_progress (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5947360BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, UNIQUE INDEX color_name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turn (id INT AUTO_INCREMENT NOT NULL, saved_puzzle_progress_id INT NOT NULL, color_id INT NOT NULL, turn_number INT NOT NULL, slot_position INT NOT NULL, INDEX IDX_20201547BB06FCE (saved_puzzle_progress_id), INDEX IDX_202015477ADA1FB5 (color_id), UNIQUE INDEX saved_turn_slot_idx (saved_puzzle_progress_id, slot_position, turn_number), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mastermind_code_slot (id INT AUTO_INCREMENT NOT NULL, puzzle_id INT NOT NULL, color_id INT NOT NULL, slot_xposition INT NOT NULL, INDEX IDX_54A21AC6D9816812 (puzzle_id), INDEX IDX_54A21AC67ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE puzzle ADD CONSTRAINT FK_22A6DFDFA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE saved_puzzle_progress ADD CONSTRAINT FK_5947360BA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE turn ADD CONSTRAINT FK_20201547BB06FCE FOREIGN KEY (saved_puzzle_progress_id) REFERENCES saved_puzzle_progress (id)');
        $this->addSql('ALTER TABLE turn ADD CONSTRAINT FK_202015477ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE mastermind_code_slot ADD CONSTRAINT FK_54A21AC6D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
        $this->addSql('ALTER TABLE mastermind_code_slot ADD CONSTRAINT FK_54A21AC67ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mastermind_code_slot DROP FOREIGN KEY FK_54A21AC6D9816812');
        $this->addSql('ALTER TABLE turn DROP FOREIGN KEY FK_20201547BB06FCE');
        $this->addSql('ALTER TABLE turn DROP FOREIGN KEY FK_202015477ADA1FB5');
        $this->addSql('ALTER TABLE mastermind_code_slot DROP FOREIGN KEY FK_54A21AC67ADA1FB5');
        $this->addSql('ALTER TABLE puzzle DROP FOREIGN KEY FK_22A6DFDFA76ED395');
        $this->addSql('ALTER TABLE saved_puzzle_progress DROP FOREIGN KEY FK_5947360BA76ED395');
        $this->addSql('DROP TABLE puzzle');
        $this->addSql('DROP TABLE saved_puzzle_progress');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE turn');
        $this->addSql('DROP TABLE mastermind_code_slot');
    }
}
