<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PublicationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //Journals
        $this->loadModel('PubJournals');
        $pubJournals = $this->paginate($this->PubJournals);
        $this->set(compact('pubJournals'));
        $this->set('_serialize', ['pubJournals']);

        //Conferences
        $this->loadModel('PubConferences');
        $pubConferences = $this->paginate($this->PubConferences);
        $this->set(compact('pubConferences'));
        $this->set('_serialize', ['pubConferences']);

        //Books
        $this->loadModel('PubBooks');
        $pubBooks = $this->paginate($this->PubBooks);
        $this->set(compact('pubBooks'));
        $this->set('_serialize', ['pubBooks']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view', 'logout']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
                return true;
            }
        }

        // Registered users can edit their own info
        if ($this->request->action === 'edit') {
            $userId = (int)$this->request->params['pass'][0];
            if ($userId == $user['id']) {
                return true;
            }
        }

        // Deny everything else
        return parent::isAuthorized($user);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
}
