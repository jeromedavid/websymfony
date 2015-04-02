<?php

// src/Acme/HelloBundle/DataFixtures/ORM/LoadArticleData.php

namespace HB\BlogBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HB\BlogBundle\Entity\User;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setName("Jérôme DAVID");
        $user->setEmail("jeromedavid20@gmail.com");
        $user->setLogin("KaZu");
        $user->setPassword("pwd");
        $user->setEnabled(true);
        $user->setBirthDate(new \DateTime("05/25/1985"));
                
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setName("Nicolas DAMIEN");
        $user2->setEmail("nicolasdamien@gmail.com");
        $user2->setLogin("KuzCo");
        $user2->setPassword("pwd");
        $user2->setEnabled(true);
        $user2->setBirthDate(new \DateTime("01/12/1982"));
        
        $manager->persist($user2);
        
        //on pousse en base
        $manager->flush();
        
        // On stoque dans le repository des fixtures les objets à partager
        $this->addReference("user1", $user);
        $this->addReference("user2", $user2);
    }

    /**
     * Permet de définir l'ordre des fixtures
     * 
     * @return int
     */
    public function getOrder() {
        return 1;
    }

}
