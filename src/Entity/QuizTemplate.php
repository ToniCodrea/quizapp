<?php


namespace Quizapp\Entity;

use ReallyOrm\Entity\AbstractEntity;

class QuizTemplate extends AbstractEntity
{
    /**
     * @var int
     * @ORM id
     * @UID
     */
    private $id;
    /**
     * @var string
     * @ORM name
     */
    private $name;

    public function getName () {
        return $this->name;
    }

    public function getId () {
        return $this->id;
    }

}