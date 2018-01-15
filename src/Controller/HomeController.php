<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class HomeController extends AppController
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

    public function array_sort($array, $on, $order=SORT_ASC)
    {
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
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
        $resProjects = $resProjects->toArray();
        $resProjects = $this->array_sort($resProjects, 'scheduling', SORT_DESC);
        $this->set(compact('resProjects'));
        $this->set('_serialize', ['resProjects']);

        /*
        $resProjectsYears = [];
        foreach ($resProjects as $resProject) {
          array_push($resProjectsYears, $resProject ['scheduling']+0);
        }
        sort($resProjectsYears);

        $this->set(compact('resProjectsYears'));
        $this->set('_serialize', ['resProjectsYears']);
*/
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
