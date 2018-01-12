<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PeopleController extends AppController
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
        // Members
        $this->loadModel('PplUsers');
        $pplUsers = $this->PplUsers->find('all');
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);

        // Phds
        $this->loadModel('PplPhds');
        $pplPhds = $this->PplPhds->find('all');
        $this->set(compact('pplPhds'));
        $this->set('_serialize', ['pplPhds']);

        // Postdoc
        $this->loadModel('PplPostdocs');
        $pplPostdocs = $this->PplPostdocs->find('all');
        $this->set(compact('pplPostdocs'));
        $this->set('_serialize', ['pplPostdocs']);

        // Visitors
        $this->loadModel('PplVisitors');
        $pplVisitors = $this->PplVisitors->find('all');
        $this->set(compact('pplVisitors'));
        $this->set('_serialize', ['pplVisitors']);

        // Past phds
        $this->loadModel('PplPastPhds');
        $pplPastPhds = $this->PplPastPhds->find('all');
        $this->set(compact('pplPastPhds'));
        $this->set('_serialize', ['pplPastPhds']);

        // Collaborators
        $this->loadModel('PplCollaborators');
        $pplCollaborators = $this->PplCollaborators->find('all');
        $this->set(compact('pplCollaborators'));
        $this->set('_serialize', ['pplCollaborators']);

        $related = array(
            [ 'name' => __('Members'), 'controller' => 'ppl_users'],
            [ 'name' => __('PhD Students'), 'controller' => 'ppl_phds'],
            [ 'name' => __('Postdoc'), 'controller' => 'ppl_postdocs'],
            [ 'name' => __('Visitors'), 'controller' => 'ppl_visitors'],
            [ 'name' => __('Past PhD Students'), 'controller' => 'ppl_past_phds'],
            [ 'name' => __('Collaborators'), 'controller' => 'ppl_collaborators']
        );
        $this->set(compact('related'));
    }
}
