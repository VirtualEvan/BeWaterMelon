<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CoursesController extends AppController
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
         $this->loadModel('CouDegrees');
         $couDegrees = $this->CouDegrees->find('all');
         $this->set(compact('couDegrees'));
         $this->set('_serialize', ['couDegrees']);

         $this->loadModel('CouCourseDegreeSubjects');
         $couCourseDegreeSubjects = $this->CouCourseDegreeSubjects->find('all', ['contain' => ['CouSubjects.PplUsers']])->all();

         $this->set(compact('couCourseDegreeSubjects'));
         $this->set('_serialize', ['couCourseDegreeSubjects']);

         $related = array();

         foreach($couDegrees as $couDegree)
         {
            array_push($related, [ 'name' => $couDegree->name, 'href' => ['controller' => 'courses', 'action' => 'index', '#' => $couDegree->id]]);
         }
         $this->set(compact('related'));
     }
}

?>
