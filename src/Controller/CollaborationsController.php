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
         $colColleagues = $this->paginate($this->ColColleagues);
         $this->set(compact('colColleagues'));
         $this->set('_serialize', ['colColleagues']);

         //Groups
         $this->loadModel('ColGroups');
         $colGroups = $this->paginate($this->ColGroups);
         $this->set(compact('colGroups'));
         $this->set('_serialize', ['colGroups']);

         //Institutions
         $this->loadModel('ColInstitutions');
         $colInstitutions = $this->paginate($this->ColInstitutions);
         $this->set(compact('colInstitutions'));
         $this->set('_serialize', ['colInstitutions']);

         //Companies
         $this->loadModel('ColCompanies');
         $colCompanies = $this->paginate($this->ColCompanies);
         $this->set(compact('colCompanies'));
         $this->set('_serialize', ['colCompanies']);

         $related = array(
             [ 'name' => __('Member of'), 'controller' => 'col_members'],
             [ 'name' => __('Colleagues'), 'controller' => 'col_colleagues'],
             [ 'name' => __('Groups'), 'controller' => 'col_groups'],
             [ 'name' => __('Institutions'), 'controller' => 'col_institutions'],
             [ 'name' => __('Companies'), 'controller' => 'col_companies'],
         );
         $this->set(compact('related'));
     }
}

?>
