<?php



namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


//class ProductsFixtures extends Fixture
//{
// public function load(ObjectManager $manager): void
// {

//     $this->createProduct(
//         // "Avatar, la voie de l'eau : l'encyclopédie illustrée",
//         // "Cinéma et animation",
//         // "Huginn & Muninn",
//         // "Huginn & Muninn",
//         // "L'encyclopédie officielle consacrée au nouveau chef-d'oeuvre de James Cameron. Réalisé en étroite collaboration avec l'équipe du film, voici le guide ultime pour tous les fans des Na'vi.DÉCOUVREZLes somptueux paysages océaniques de Pandora ? La famille Sully ? Les véhicules améliorés de la RDA ? La majestueuse fauneEXPLOREZLe village des Metkayina ? Le campement des Omatikaya ? La nouvelle base de la RDA ? Et bien plus encore !Préface de Sigourney Weaver© 2022 20th Century Studios.",
//         // "128",
//         // "2364808650",


//         "Muscu : Actions et Vérités",
//         "Sport",
//         "Antoine Fombonne",
//         "First",
//         "Le sucre, ça fait grossir , La musculation, c'est de la gonflette, À la fin de la journée, je n'ai plus la force d'aller m'entraîner. Si au moins l'une de ces phrases résonnent en vous, c'est qu'il s'agit d'idées reçues profondément ancrées qu'Antoine Fombonne combat au quotidien. Dans ce livre, il livre ses connaissances scientifiques et sa passion pour la nutrition et l'entraînement pour déconstruire les mythes les plus courants. Vous pourrez ainsi comprendre les mensonges de tel ou tel régime, les fabulations véhiculées dans le monde du sport ou encore comment faire de votre mental un allié.",
//         "224",
//         "2412073627",
//         $manager
//     );


//     $manager->flush();
// }


// public function createProduct(string $title, string $genre, string $author, string $editor, string $description, int $pages, string $isbn,  ObjectManager $manager)
// {
//     $product = new Products();
//     $product->setTitle($title);
//     $product->setGenre($genre);
//     $product->setAuthor($author);
//     $product->setEditor($editor);
//     $product->setDescription($description);
//     $product->setPages($pages);
//     $product->setIsbn($isbn);

//     $category = $this->getReference(5);
//     $product->setCategories($category);
//     $manager->persist($product);
//     return $product;
// }








class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Products();
        $product->setTitle("Avatar, la voie de l'eau : l'encyclopédie illustrée");
        $product->setGenre("Cinéma et animation");
        $product->setAuthor("Huginn & Muninn");
        $product->setEditor("Huginn & Muninn");
        $product->setDescription("L'encyclopédie officielle consacrée au nouveau chef-d'oeuvre de James Cameron. Réalisé en étroite collaboration avec l'équipe du film, voici le guide ultime pour tous les fans des Na'vi.DÉCOUVREZLes somptueux paysages océaniques de Pandora ? La famille Sully ? Les véhicules améliorés de la RDA ? La majestueuse fauneEXPLOREZLe village des Metkayina ? Le campement des Omatikaya ? La nouvelle base de la RDA ? Et bien plus encore !Préface de Sigourney Weaver© 2022 20th Century Studios.");
        $product->setPages("128");
        $product->setIsbn("2364808650");
        $category = $this->getReference(3);
        $product->setCategories($category);
        $manager->persist($product);



        $product = new Products();
        $product->setTitle("Muscu : Actions et Vérités");
        $product->setGenre("Sport");
        $product->setAuthor("Antoine Fombonne");
        $product->setEditor("First");
        $product->setDescription("Le sucre, ça fait grossir , La musculation, c'est de la gonflette, À la fin de la journée, je n'ai plus la force d'aller m'entraîner. Si au moins l'une de ces phrases résonnent en vous, c'est qu'il s'agit d'idées reçues profondément ancrées qu'Antoine Fombonne combat au quotidien. Dans ce livre, il livre ses connaissances scientifiques et sa passion pour la nutrition et l'entraînement pour déconstruire les mythes les plus courants. Vous pourrez ainsi comprendre les mensonges de tel ou tel régime, les fabulations véhiculées dans le monde du sport ou encore comment faire de votre mental un allié.");
        $product->setPages("224");
        $product->setIsbn("2412073627");
        $category = $this->getReference(5);
        $product->setCategories($category);
        $manager->persist($product);



        $manager->flush();
    }
}
