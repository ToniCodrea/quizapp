<?php


namespace Quizapp\Controller;


use Framework\Contracts\RendererInterface;
use Framework\Contracts\SessionInterface;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Routing\RouteMatch;
use Quizapp\Contracts\ServiceInterface;
use Quizapp\Entity\QuizTemplate;

class QuizTemplateController extends SecurityController
{
    /**
     * @var ServiceInterface
     */
    private $quizService;

    /**
     * QuizTemplateController constructor.
     * @param RendererInterface $renderer
     * @param SessionInterface $session
     * @param ServiceInterface $quizService
     */
    public function __construct (RendererInterface $renderer, SessionInterface $session, ServiceInterface $quizService)
    {
        parent::__construct($renderer, $session);
        $this->quizService = $quizService;
    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function getQuizzes (RouteMatch $routeMatch, Request $request)
    {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $userid = $this->session->get('id');
        $page = $request->getParameter('page');
        $search = $request->getParameter('search');
        $sorts = $request->getParameter('sorts');

        if ($sorts == null) {
            $sorts = [];
        }

        $count = $this->quizService->getQuizzesCount($userid, null, $search);

        if ($page == null || $page == 0 || $page > $count || !is_numeric($page)) {
            $page = 1;
        }

        $count = ceil($count / 5);
        $data = $this->quizService->getQuizzes($userid, $sorts, $page, 5, $search);

        return $this->renderer->renderView
            ('admin-quizzes-listing.phtml',
            [
                'data' => $data,
                'count' => $count,
                'page' => $page,
                'search' => $search,
                'userName' => $this->session->get('name')
            ]);
    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function getAllQuizzes (RouteMatch $routeMatch, Request $request)
    {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $userid = $this->session->get('id');
        $page = $request->getParameter('page');
        $search = $request->getParameter('search');
        $sorts = $request->getParameter('sorts');

        if ($sorts == null) {
            $sorts = [];
        }

        $count = $this->quizService->getQuizzesCount(null, null, $search);

        if ($page == null || $page == 0 || $page > $count || !is_numeric($page)) {
            $page = 1;
        }

        $data = $this->quizService->getQuizzes(null, $sorts, $page, 5, $search);

        $count = ceil($count/5);

        return $this->renderer->renderView
            ('candidate-quiz-listing.phtml',
            [
                'data' => $data,
                'count' => $count,
                'page' => $page,
                'search' => $search,
                'name' => $this->session->get('name')
            ]);
    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function addQuizzes (RouteMatch $routeMatch, Request $request) {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $questions = $this->quizService->getAllQuestions();
        return $this->renderer->renderView
            ('admin-quiz-details.phtml',
            [
                'questions' => $questions,
                'userName' => $this->session->get('name')
            ]);

    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function add (RouteMatch $routeMatch, Request $request) {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $userid = $this->session->get('id');
        $data = $request->getParameters();
        $this->quizService->addQuiz($userid, $data);
        $location = $request->getUri()->getScheme() . '://' . substr($request->getUri()->getAuthority(), 0, -3) . '/admin/quiz';

        return $this->redirect($location, 301);
    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function editQuizzes (RouteMatch $routeMatch, Request $request) {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $id = $routeMatch->getRequestAttributes()['id'];
        $quiz = $this->quizService->getQuiz($id);

        if (!$quiz) {
            return $this->renderer->renderException(['message' => 'Not found'], 404);
        }

        if ($quiz->getUser()->getID() !== $this->session->get('id')) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $questions = $this->quizService->getAllQuestions();
        $selectedQuestions = $this->quizService->getSelectedQuestions($id);
        $selected = [];
        foreach ($selectedQuestions as $selectedQuestion) {
            $selected[$selectedQuestion['questiontemplateid']] = true;
        }

        return $this->renderer->renderView
        ('admin-quiz-edit-details.phtml',
            [
                'quiz' => $quiz,
                'questions' => $questions,
                'selectedQuestions' => $selected,
                'userName' => $this->session->get('name')
            ]);
    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function edit (RouteMatch $routeMatch, Request $request) {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $userid = $this->session->get('id');
        $id = $routeMatch->getRequestAttributes()['id'];
        $data = $request->getParameters();
        $this->quizService->editQuiz($userid, $id, $data);

        $location = $request->getUri()->getScheme().'://'.substr($request->getUri()->getAuthority(), 0, -3).'/admin/quiz';

        return $this->redirect($location, 301);

    }

    /**
     * @param RouteMatch $routeMatch
     * @param Request $request
     * @return Response
     */
    public function delete (RouteMatch $routeMatch, Request $request) {
        if (!$this->isLoggedIn()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        if (!$this->isAdmin()) {
            return $this->renderer->renderException(['message' => 'Forbidden'], 403);
        }

        $id = $routeMatch->getRequestAttributes()['id'];
        $this->quizService->deleteQuiz($id);

        $location = $request->getUri()->getScheme().'://'.substr($request->getUri()->getAuthority(), 0, -3).'/admin/quiz';

        return $this->redirect($location, 301);

    }
}