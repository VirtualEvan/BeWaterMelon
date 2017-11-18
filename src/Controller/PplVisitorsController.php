<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplVisitors Controller
 *
 * @property \App\Model\Table\PplVisitorsTable $PplVisitors
 *
 * @method \App\Model\Entity\PplVisitor[] paginate($object = null, array $settings = [])
 */
class PplVisitorsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
                return true;
            }
        }

        // Deny everything else
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pplVisitors = $this->paginate($this->PplVisitors);

        $this->set(compact('pplVisitors'));
        $this->set('_serialize', ['pplVisitors']);
    }

    /**
     * View method
     *
     * @param string|null $id Ppl Visitor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplVisitor = $this->PplVisitors->get($id, [
            'contain' => []
        ]);

        $this->set('pplVisitor', $pplVisitor);
        $this->set('_serialize', ['pplVisitor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplVisitor = $this->PplVisitors->newEntity();
        if ($this->request->is('post')) {
            $pplVisitor = $this->PplVisitors->patchEntity($pplVisitor, $this->request->getData());
            if ($this->PplVisitors->save($pplVisitor)) {
                $this->Flash->success(__('The ppl visitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl visitor could not be saved. Please, try again.'));
        }
        $this->set(compact('pplVisitor'));
        $this->set('_serialize', ['pplVisitor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Visitor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplVisitor = $this->PplVisitors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplVisitor = $this->PplVisitors->patchEntity($pplVisitor, $this->request->getData());
            if ($this->PplVisitors->save($pplVisitor)) {
                $this->Flash->success(__('The ppl visitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl visitor could not be saved. Please, try again.'));
        }
        $this->set(compact('pplVisitor'));
        $this->set('_serialize', ['pplVisitor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Visitor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplVisitor = $this->PplVisitors->get($id);
        if ($this->PplVisitors->delete($pplVisitor)) {
            $this->Flash->success(__('The ppl visitor has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl visitor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
