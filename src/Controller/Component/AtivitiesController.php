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
        //Editorials
        $this->loadModel('ActEditorials');
        $actEditorials = $this->paginate($this->ActEditorials);
        $this->set(compact('actEditorials'));
        $this->set('_serialize', ['actEditorials']);

        //Journals
        $this->loadModel('ActJournals');
        $actJournals = $this->paginate($this->ActJournals);
        $this->set(compact('actJournals'));
        $this->set('_serialize', ['actJournals']);

        //Conferences
        $this->loadModel('ActConferences');
        $actConferences = $this->paginate($this->ActConferences);
        $this->set(compact('actConferences'));
        $this->set('_serialize', ['actConferences']);

        $related = array(
            [ 'name' => __('Editorials'), 'controller' => 'act_editorials'],
            [ 'name' => __('Journals'), 'controller' => 'act_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'act_conferences'],
        );
        $this->set(compact('related'));
    }
}
