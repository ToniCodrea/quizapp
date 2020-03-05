<?php


namespace Quizapp\Entity;

use ReallyOrm\Entity\AbstractEntity;

class QuestionTemplate extends AbstractEntity
{
    /**
     * @var int
     * @ORM id
     * @UID
     */
    private $id;
    /**
     * @var string
     * @ORM type
     */
    private $type;
    /**
     * @var string
     * @ORM text
     */
    private $text;
}