<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ColMembers Controller
 *
 * @property \App\Model\Table\ColMembersTable $ColMembers
 *
 * @method \App\Model\Entity\ColMember[] paginate($object = null, array $settings = [])
 */
class ColMembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colMembers = $this->paginate($this->ColMembers);

        $this->set(compact('colMembers'));
        $this->set('_serialize', ['colMembers']);
    }

    /**
     * View method
     *
     * @param string|null $id Col Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colMember = $this->ColMembers->get($id, [
            'contain' => []
        ]);

        $this->set('colMember', $colMember);
        $this->set('_serialize', ['colMember']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colMember = $this->ColMembers->newEntity();
        if ($this->request->is('post')) {
            $colMember = $this->ColMembers->patchEntity($colMember, $this->request->getData());
            if ($this->ColMembers->save($colMember)) {
                $this->Flash->success(__('The col member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col member could not be saved. Please, try again.'));
        }
        $this->set(compact('colMember'));
        $this->set('_serialize', ['colMember']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colMember = $this->ColMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colMember = $this->ColMembers->patchEntity($colMember, $this->request->getData());
            if ($this->ColMembers->save($colMember)) {
                $this->Flash->success(__('The col member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col member could not be saved. Please, try again.'));
        }
        $this->set(compact('colMember'));
        $this->set('_serialize', ['colMember']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colMember = $this->ColMembers->get($id);
        if ($this->ColMembers->delete($colMember)) {
            $this->Flash->success(__('The col member has been deleted.'));
        } else {
            $this->Flash->error(__('The col member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
