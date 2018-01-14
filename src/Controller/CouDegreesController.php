<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * CouDegrees Controller
 *
 * @property \App\Model\Table\CouDegreesTable $CouDegrees
 *
 * @method \App\Model\Entity\CouDegree[] paginate($object = null, array $settings = [])
 */
class CouDegreesController extends AppController
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
        $couDegrees = $this->CouDegrees->find('all');

        $this->set(compact('couDegrees'));
        $this->set('_serialize', ['couDegrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couDegree = $this->CouDegrees->get($id, [
            'contain' => ['CouCourseDegreeSubjects']
        ]);

        $this->set('couDegree', $couDegree);
        $this->set('_serialize', ['couDegree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couDegree = $this->CouDegrees->newEntity();
        if ($this->request->is('post')) {
            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData());
            if ($this->CouDegrees->save($couDegree)) {
                $this->Flash->success(__('The degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The degree could not be saved. Please, try again.'));
        }
        $this->set(compact('couDegree'));
        $this->set('_serialize', ['couDegree']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couDegree = $this->CouDegrees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData());
            if ($this->CouDegrees->save($couDegree)) {
                $this->Flash->success(__('The degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The degree could not be saved. Please, try again.'));
        }
        $this->set(compact('couDegree'));
        $this->set('_serialize', ['couDegree']);

        $this->loadModel('CouSubjects');
        $subjects = $this->CouSubjects->find('all');
        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);

        $this->loadModel('CouCourseDegreeSubjects');
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->find('all');
        $this->set(compact('couCourseDegreeSubject'));
        $this->set('_serialize', ['couCourseDegreeSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $couDegree = $this->CouDegrees->get($id);
        if ($this->CouDegrees->delete($couDegree)) {
            $this->Flash->success(__('The degree has been deleted.'));
        } else {
            $this->Flash->error(__('The degree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'courses', 'action' => 'index']);
    }
}
