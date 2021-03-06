<?php


namespace Quizapp\Controller;


use Framework\Contracts\RendererInterface;
use Framework\Contracts\SessionInterface;
use Framework\Controller\AbstractController;
use Framework\Http\Request;
use Quizapp\Contracts\ServiceInterface;

class SecurityController extends AbstractController
{
    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * SecurityController constructor.
     * @param RendererInterface $renderer
     * @param SessionInterface $session
     */
    public function __construct (RendererInterface $renderer, SessionInterface $session)
    {
        parent::__construct($renderer);
        $this->session = $session;
    }

    /**
     * @return bool
     */
    public function isLoggedIn() {
        if ($this->session->get('id')) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin() {
        if (!$this->isLoggedIn()) {
            return false;
        }
        if ($this->session->get('role') != 'admin') {
            return false;
        }

        return true;
    }
}