<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CollaborationsController extends AppController
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
         //Members
         $this->loadModel('ColMembers');
         $colMembers = $this->paginate($this->ColMembers);
         $this->set(compact('colMembers'));
         $this->set('_serialize', ['colMembers']);

         //Colleagues
         $this->loadModel('ColColleagues');
         $colColleagues = $this->paginate($this->ColMembers);
         $this->set(compact('colColleagues'));
         $this->set('_serialize', ['colColleagues']);

         //Groups
         $this->loadModel('ColGroups');
         $colGroups = $this->paginate($this->ColMembers);
         $this->set(compact('colGroups'));
         $this->set('_serialize', ['colGroups']);

         //Institutions
         $this->loadModel('ColInstitutions');
         $colInstitutions = $this->paginate($this->ColMembers);
         $this->set(compact('colInstitutions'));
         $this->set('_serialize', ['colInstitutions']);

         //Companies
         $this->loadModel('ColCompanies');
         $colCompanies = $this->paginate($this->ColMembers);
         $this->set(compact('colCompanies'));
         $this->set('_serialize', ['colCompanies']);
     }
}

?>
