<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202151007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE books_id_seq CASCADE');
        $this->addSql('ALTER TABLE shopping_cart ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE shopping_cart ADD CONSTRAINT FK_72AAD4F64584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_72AAD4F64584665A ON shopping_cart (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE books_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE shopping_cart DROP CONSTRAINT FK_72AAD4F64584665A');
        $this->addSql('DROP INDEX IDX_72AAD4F64584665A');
        $this->addSql('ALTER TABLE shopping_cart DROP product_id');
    }
}
