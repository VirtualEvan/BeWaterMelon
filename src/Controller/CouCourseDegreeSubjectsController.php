<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CouCourseDegreeSubjects Controller
 *
 * @property \App\Model\Table\CouCourseDegreeSubjectsTable $CouCourseDegreeSubjects
 *
 * @method \App\Model\Entity\CouCourseDegreeSubject[] paginate($object = null, array $settings = [])
 */
class CouCourseDegreeSubjectsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view', 'logout']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
                return true;
            }
        }

        // Registered users can edit their own info
        if ($this->request->action === 'edit') {
            $userId = (int)$this->request->params['pass'][0];
            if ($userId == $user['id']) {
                return true;
            }
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CouDegrees', 'CouSubjects']
        ];
        $couCourseDegreeSubjects = $this->paginate($this->CouCourseDegreeSubjects);

        $this->set(compact('couCourseDegreeSubjects'));
        $this->set('_serialize', ['couCourseDegreeSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Cou Course Degree Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->get($id, [
            'contain' => ['CouDegrees', 'CouSubjects']
        ]);

        $this->set('couCourseDegreeSubject', $couCourseDegreeSubject);
        $this->set('_serialize', ['couCourseDegreeSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->newEntity();
        if ($this->request->is('post')) {
            $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->patchEntity($couCourseDegreeSubject, $this->request->getData());
            if ($this->CouCourseDegreeSubjects->save($couCourseDegreeSubject)) {
                $this->Flash->success(__('The cou course degree subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou course degree subject could not be saved. Please, try again.'));
        }
        $couDegrees = $this->CouCourseDegreeSubjects->CouDegrees->find('list', ['limit' => 200]);
        $couSubjects = $this->CouCourseDegreeSubjects->CouSubjects->find('list', ['limit' => 200]);
        $this->set(compact('couCourseDegreeSubject', 'couDegrees', 'couSubjects'));
        $this->set('_serialize', ['couCourseDegreeSubject']);

        $this->loadModel('CouSubjects');
        $subjects = $this->paginate($this->CouSubjects);
        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cou Course Degree Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->patchEntity($couCourseDegreeSubject, $this->request->getData());
            if ($this->CouCourseDegreeSubjects->save($couCourseDegreeSubject)) {
                $this->Flash->success(__('The cou course degree subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou course degree subject could not be saved. Please, try again.'));
        }
        $couDegrees = $this->CouCourseDegreeSubjects->CouDegrees->find('list', ['limit' => 200]);
        $couSubjects = $this->CouCourseDegreeSubjects->CouSubjects->find('list', ['limit' => 200]);
        $this->set(compact('couCourseDegreeSubject', 'couDegrees', 'couSubjects'));
        $this->set('_serialize', ['couCourseDegreeSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cou Course Degree Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->get($id);
        if ($this->CouCourseDegreeSubjects->delete($couCourseDegreeSubject)) {
            $this->Flash->success(__('The cou course degree subject has been deleted.'));
        } else {
            $this->Flash->error(__('The cou course degree subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
