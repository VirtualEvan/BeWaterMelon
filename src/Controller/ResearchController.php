<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ResearchController extends AppController
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
        //Projects
        $this->loadModel('ResProjects');
        $resProjects = $this->ResProjects->find('all')->contain(['ResProjectParticipants']);
        $this->set(compact('resProjects'));
        $this->set('_serialize', ['resProjects']);

        $this->loadModel('ResProjectParticipants');
        $resProjectParticipants = $this->paginate($this->ResProjectParticipants);
        $this->set(compact('resProjectParticipants'));
        $this->set('_serialize', ['resProjectParticipants']);

        //Contracts
        $this->loadModel('ResContracts');
        $resContracts = $this->ResContracts->find('all')->contain(['ResContractParticipants']);
        $this->set(compact('resContracts'));
        $this->set('_serialize', ['resContracts']);

        $this->loadModel('ResContractParticipants');
        $resContractParticipants = $this->paginate($this->ResContractParticipants);
        $this->set(compact('resContractParticipants'));
        $this->set('_serialize', ['resContractParticipants']);

        //Patents
        $this->loadModel('ResPatents');
        $resPatents = $this->paginate($this->ResPatents);
        $this->set(compact('resPatents'));
        $this->set('_serialize', ['resPatents']);

        $related = array(
            [ 'name' => __('Projects'), 'controller' => 'res_projects'],
            [ 'name' => __('Contracts'), 'controller' => 'res_contracts'],
            [ 'name' => __('Patents'), 'controller' => 'res_patents'],
        );
        $this->set(compact('related'));

    }
}
