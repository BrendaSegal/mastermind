<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161001104249 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE puzzle_colors (puzzle_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_7032F4C9D9816812 (puzzle_id), INDEX IDX_7032F4C97ADA1FB5 (color_id), PRIMARY KEY(puzzle_id, color_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE puzzle_colors ADD CONSTRAINT FK_7032F4C9D9816812 FOREIGN KEY (puzzle_id) REFERENCES puzzle (id)');
        $this->addSql('ALTER TABLE puzzle_colors ADD CONSTRAINT FK_7032F4C97ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE puzzle ADD number_of_colors INT NOT NULL, ADD number_of_slots INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE puzzle_colors');
        $this->addSql('ALTER TABLE puzzle DROP number_of_colors, DROP number_of_slots');
    }
}
