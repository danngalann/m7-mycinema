<?php

namespace App\DataFixtures;

use App\Entity\Filmoteca;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $this->makeFilm("Ad Astra", "2019", "Astronaut Roy McBride undertakes a mission across an unforgiving solar system to uncover the truth about his missing father and his doomed expedition that now, 30 years later, threatens the universe.", $manager);
        $this->makeFilm("Ex Machina", "2014", "A young programmer is selected to participate in a ground-breaking experiment in synthetic intelligence by evaluating the human qualities of a highly advanced humanoid A.I.", $manager);
        $this->makeFilm("Looper", "2012", "In 2074, when the mob wants to get rid of someone, the target is sent into the past, where a hired gun awaits - someone like Joe - who one day learns the mob wants to 'close the loop' by sending back Joe's future self for assassination.", $manager);
        $this->makeFilm("Interstellar", "2014", "A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.", $manager);
        $this->makeFilm("Blade Runner 2049", "2017", "Young Blade Runner K's discovery of a long-buried secret leads him to track down former Blade Runner Rick Deckard, who's been missing for thirty years.", $manager);

        $manager->flush();
    }

    public function makeFilm(string $title, string $year, string $about, ObjectManager $manager){
        $film = new Filmoteca();
        $film->setTitle($title);
        $film->setYear($year);
        $film->setSinopsis($about);

        $manager->persist($film);
    }
}
