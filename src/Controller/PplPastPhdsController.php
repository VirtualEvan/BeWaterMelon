<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplPastPhds Controller
 *
 * @property \App\Model\Table\PplPastPhdsTable $PplPastPhds
 *
 * @method \App\Model\Entity\PplPastPhd[] paginate($object = null, array $settings = [])
 */
class PplPastPhdsController extends AppController
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
        $pplPastPhds = $this->paginate($this->PplPastPhds);

        $this->set(compact('pplPastPhds'));
        $this->set('_serialize', ['pplPastPhds']);
    }

    /**
     * View method
     *
     * @param string|null $id Ppl Past Phd id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplPastPhd = $this->PplPastPhds->get($id, [
            'contain' => []
        ]);

        $this->set('pplPastPhd', $pplPastPhd);
        $this->set('_serialize', ['pplPastPhd']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplPastPhd = $this->PplPastPhds->newEntity();
        if ($this->request->is('post')) {
            $pplPastPhd = $this->PplPastPhds->patchEntity($pplPastPhd, $this->request->getData());
            if ($this->PplPastPhds->save($pplPastPhd)) {
                $this->Flash->success(__('The ppl past phd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl past phd could not be saved. Please, try again.'));
        }
        $this->set(compact('pplPastPhd'));
        $this->set('_serialize', ['pplPastPhd']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Past Phd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplPastPhd = $this->PplPastPhds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplPastPhd = $this->PplPastPhds->patchEntity($pplPastPhd, $this->request->getData());
            if ($this->PplPastPhds->save($pplPastPhd)) {
                $this->Flash->success(__('The ppl past phd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl past phd could not be saved. Please, try again.'));
        }
        $this->set(compact('pplPastPhd'));
        $this->set('_serialize', ['pplPastPhd']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Past Phd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplPastPhd = $this->PplPastPhds->get($id);
        if ($this->PplPastPhds->delete($pplPastPhd)) {
            $this->Flash->success(__('The ppl past phd has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl past phd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
