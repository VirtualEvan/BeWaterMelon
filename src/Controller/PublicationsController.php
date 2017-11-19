<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PublicationsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }


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

        $related = array(
            [ 'name' => __('Journals'), 'controller' => 'pub_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'pub_conferences'],
            [ 'name' => __('Books'), 'controller' => 'pub_books'],
        );
        $this->set(compact('related'));
    }
}
