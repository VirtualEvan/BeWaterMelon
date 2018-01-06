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
         $couDegrees = $this->paginate($this->CouDegrees);
         $this->set(compact('couDegrees'));
         $this->set('_serialize', ['couDegrees']);

         $this->loadModel('CouCourseDegreeSubjects');
         $this->paginate = [
             'contain' => ['CouSubjects.PplUsers'],
             'group' => array('cou_degree_id', 'cou_subject_id', 'year')
         ];
         $couCourseDegreeSubjects = $this->paginate($this->CouCourseDegreeSubjects);
         $this->set(compact('couCourseDegreeSubjects'));
         $this->set('_serialize', ['couCourseDegreeSubjects']);
     }
}

?>
