<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202142323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE shopping_cart_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE books (id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(55) NOT NULL, author VARCHAR(55) NOT NULL, editor VARCHAR(55) NOT NULL, genre VARCHAR(55) NOT NULL, price INT NOT NULL, description TEXT DEFAULT NULL, date_publication DATE NOT NULL, num_pages INT DEFAULT NULL, isbn VARCHAR(65) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE shopping_cart (id INT NOT NULL, session_id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE products');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE shopping_cart_id_seq CASCADE');
        $this->addSql('CREATE TABLE products (id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE shopping_cart');
    }
}
