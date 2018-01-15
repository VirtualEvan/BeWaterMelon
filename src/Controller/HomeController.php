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
    }
}
