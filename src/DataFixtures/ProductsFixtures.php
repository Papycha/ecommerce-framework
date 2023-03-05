<?php



namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;


class ProductsFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

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
        $product->setPrice("100");
        $product->setInStock("10");
        $product->setImage('book1.png');
        $category = $this->getReference('cat-3');
        $product->setCategories($category);
        //  $product->setSlug($this->slugger->slug($product->getTitle())->lower());
        $this->setReference('prod-1', $product);
        $manager->persist($product);



        $product = new Products();
        $product->setTitle("Muscu : Actions et Vérités");
        $product->setGenre("Sport");
        $product->setAuthor("Antoine Fombonne");
        $product->setEditor("First");
        $product->setDescription("Le sucre, ça fait grossir , La musculation, c'est de la gonflette, À la fin de la journée, je n'ai plus la force d'aller m'entraîner. Si au moins l'une de ces phrases résonnent en vous, c'est qu'il s'agit d'idées reçues profondément ancrées qu'Antoine Fombonne combat au quotidien. Dans ce livre, il livre ses connaissances scientifiques et sa passion pour la nutrition et l'entraînement pour déconstruire les mythes les plus courants. Vous pourrez ainsi comprendre les mensonges de tel ou tel régime, les fabulations véhiculées dans le monde du sport ou encore comment faire de votre mental un allié.");
        $product->setPages("224");
        $product->setIsbn("2412073627");
        $product->setPrice("100");
        $product->setInStock("10");
        $product->setImage('book2.png');
        $category = $this->getReference('cat-5');
        $product->setCategories($category);
        //  $product->setSlug($this->slugger->slug($product->getTitle())->lower());
        $this->setReference('prod-2', $product);
        $manager->persist($product);


        $product = new Products();
        $product->setTitle("manga titre");
        $product->setGenre("manga");
        $product->setAuthor("Author");
        $product->setEditor("Editor");
        $product->setDescription("Description");
        $product->setPages("30");
        $product->setIsbn("111111111");
        $product->setPrice("80");
        $product->setInStock("0");
        $product->setImage('book3.png');
        $category = $this->getReference('cat-1');
        $product->setCategories($category);
        // $product->setSlug($this->slugger->slug($product->getTitle())->lower());
        $this->setReference('prod-3', $product);
        $manager->persist($product);



        $manager->flush();
    }
}
