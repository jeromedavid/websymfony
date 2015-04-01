<?php

// src/Acme/HelloBundle/DataFixtures/ORM/LoadArticleData.php

namespace HB\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HB\BlogBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        // On récupère notre utilisateur depuis le fixture User
        $user = $this->getReference("user1");
        $article = new Article();
        $article->setTitle("Mon article test");
        $article->setContent("Mon contenu généré par DataFixtures");
        $article->setPublished(true);
        $article->setEnabled(true);
        $article->setAuthor($user);    
        
        $manager->persist($article);
        
        $user2 = $this->getReference("user2");
        $article2 = new Article();
        $article2->setTitle("Mon article test");
        $article2->setContent("Mon contenu généré par DataFixtures");
        $article2->setPublished(true);
        $article2->setEnabled(true);
        $article2->setAuthor($user2); 
        
        $manager->persist($article2);
        
        //on pousse en base
        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}
