<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126160931 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE applicant_offer (applicant_id INT NOT NULL, offer_id INT NOT NULL, INDEX IDX_C4EE7D3D97139001 (applicant_id), INDEX IDX_C4EE7D3D53C674EE (offer_id), PRIMARY KEY(applicant_id, offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applicant_offer ADD CONSTRAINT FK_C4EE7D3D97139001 FOREIGN KEY (applicant_id) REFERENCES applicant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE applicant_offer ADD CONSTRAINT FK_C4EE7D3D53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant_offer DROP FOREIGN KEY FK_C4EE7D3D97139001');
        $this->addSql('DROP TABLE applicant');
        $this->addSql('DROP TABLE applicant_offer');
    }
}
