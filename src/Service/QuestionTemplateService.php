<?php


namespace Quizapp\Service;


use Quizapp\Entity\QuestionTemplate;
use Quizapp\Entity\TextTemplate;
use Quizapp\Entity\User;
use ReallyOrm\Entity\EntityInterface;

class QuestionTemplateService extends AbstractService
{
    /**
     * @param array $data
     * @param int $userid
     */
    public function addQuestion (array $data, int $userid) {
        $question = new QuestionTemplate();
        $question->setText($data['text']);
        $question->setType($data['type']);
        $this->repoManager->register($question);
        $question->save();

        $question->setUserID($userid);

        $answer = new TextTemplate();
        $answer->setText($data['answer']);
        $this->repoManager->register($answer);
        $answer->save();

        $answer->setQuestionID($question->getID());

    }

    /**
     * @param int $userID
     * @param array $sorts
     * @param int $page
     * @param int $limit
     * @param string|null $search
     * @param string $searchColumn
     * @return array
     */
    public function getQuestions(int $userID, array $sorts = [], int $page = 1, int $limit = 5, string $search = null, string $searchColumn = 'text') : array
    {

        return $this->entityRepo->findBy(['userid' => $userID], $sorts, ($page-1)*$limit, $limit, $search, $searchColumn);
    }

    public function getQuestionsCount(int $userID, string $search = null, string $searchColumn = 'text') : int
    {
        return $this->entityRepo->count($userID, User::class, $search, $searchColumn);
    }

    /**
     * @param int $id
     */
    public function deleteQuestion (int $id)
    {
        $question = $this->entityRepo->find($id);
        $this->entityRepo->deleteRelation($id);
        $this->entityRepo->delete($question);
    }

    /**
     * @param int $id
     * @return EntityInterface|null
     */
    public function getQuestion (int $id) : ?EntityInterface {
        return $this->entityRepo->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function editQuestion (int $id, array $data) {
        $question = $this->getQuestion($id);
        $question->setText($data['text']);
        $question->setType($data['type']);
        $this->repoManager->register($question);
        $question->save();

        $answer = new TextTemplate();
        $this->repoManager->register($answer);
        $answer = $answer->findBy($question->getId());
        $answer->setText($data['answer']);
        $answer->save();
    }

}