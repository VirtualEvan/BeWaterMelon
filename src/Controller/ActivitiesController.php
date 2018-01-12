<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ActivitiesController extends AppController
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
        $this->loadModel('ActEditorialBoards');
        $actEditorialBoards = $this->ActEditorialBoards->find('all');
        $this->set(compact('actEditorialBoards'));
        $this->set('_serialize', ['actEditorialBoards']);

        //Journals
        $this->loadModel('ActJournals');
        $actJournals = $this->ActJournals->find('all');
        $this->set(compact('actJournals'));
        $this->set('_serialize', ['actJournals']);

        //Conferences
        $this->loadModel('ActConferences');
        $actConferences = $this->ActConferences->find('all')->contain(['actConferenceYears']);
        $this->set(compact('actConferences'));
        $this->set('_serialize', ['actConferences']);

        $related = array(
            [ 'name' => __('Editorials'), 'controller' => 'act_editorial_boards'],
            [ 'name' => __('Journals'), 'controller' => 'act_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'act_conferences'],
        );
        $this->set(compact('related'));
    }
}
