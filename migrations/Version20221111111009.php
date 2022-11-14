<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221111111009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE possesion ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE possesion ADD CONSTRAINT FK_6866EC6267B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_6866EC6267B3B43D ON possesion (users_id)');
        $this->addSql('ALTER TABLE users DROP possesion_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE possesion DROP FOREIGN KEY FK_6866EC6267B3B43D');
        $this->addSql('DROP INDEX IDX_6866EC6267B3B43D ON possesion');
        $this->addSql('ALTER TABLE possesion DROP users_id');
        $this->addSql('ALTER TABLE users ADD possesion_id INT NOT NULL');
    }
}
