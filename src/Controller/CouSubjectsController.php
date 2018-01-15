<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * CouSubjects Controller
 *
 * @property \App\Model\Table\CouSubjectsTable $CouSubjects
 *
 * @method \App\Model\Entity\CouSubject[] paginate($object = null, array $settings = [])
 */
class CouSubjectsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'logout']);
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
            'contain' => ['PplUsers']
        ];
        $couSubjects = $this->CouSubjects->find('all');
        $this->set(compact('couSubjects'));
        $this->set('_serialize', ['couSubjects']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couSubject = $this->CouSubjects->newEntity();
        if ($this->request->is('post')) {
            $couSubject = $this->CouSubjects->patchEntity($couSubject, $this->request->getData());
            if ($this->CouSubjects->save($couSubject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['controller' => 'courses', 'action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }

        $pplUsers = $this->CouSubjects->PplUsers->find('list', ['limit' => 200]);
        $this->set(compact('couSubject', 'pplUsers'));
        $this->set('_serialize', ['couSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couSubject = $this->CouSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couSubject = $this->CouSubjects->patchEntity($couSubject, $this->request->getData());
            if ($this->CouSubjects->save($couSubject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['controller' => 'courses', 'action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }

        $pplUsers = $this->CouSubjects->PplUsers->find('list', ['limit' => 200]);
        $this->set(compact('couSubject', 'pplUsers'));
        $this->set('_serialize', ['couSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couSubject = $this->CouSubjects->get($id);
        if ($this->CouSubjects->delete($couSubject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'courses', 'action' => 'index']);
    }
}
