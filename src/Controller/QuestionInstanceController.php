<?php


namespace Quizapp\Controller;


use Framework\Contracts\RendererInterface;
use Framework\Contracts\SessionInterface;
use Framework\Http\Request;
use Framework\Routing\RouteMatch;
use Quizapp\Contracts\ServiceInterface;
use Quizapp\Entity\QuestionInstance;

class QuestionInstanceController extends SecurityController
{
    private $questionService;

    public function __construct (RendererInterface $renderer, SessionInterface $session, ServiceInterface $questionService)
    {
        parent::__construct($renderer, $session);
        $this->questionService = $questionService;
    }

    public function getQuestion(RouteMatch $routeMatch, Request $request) {
        if ($this->isLoggedIn()) {
            $questionInstanceID = $routeMatch->getRequestAttributes()['id'] - 1;
            $quizInstanceID = $this->session->get('quizInstanceID');
            $count = $this->questionService->count($quizInstanceID);
            /**
             * @var QuestionInstance $question
             */
            if ($questionInstanceID > $count) {
                $questionInstanceID = 1;
            }
            $question = $this->questionService->getQuestion($quizInstanceID, $questionInstanceID);
            $answers = $question->getAnswers();
            return $this->renderer->renderView('candidate-quiz-page.phtml', ['question' => $question, 'quizInstanceID' => $quizInstanceID, 'questionNumber' => $questionInstanceID, 'count' => $count, 'answers' => $answers, 'userName' => $this->session->get('name')]);
        }
        return $this->sendException($request);
    }
}