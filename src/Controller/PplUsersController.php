<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PplUsers Controller
 *
 * @property \App\Model\Table\PplUsersTable $PplUsers
 *
 * @method \App\Model\Entity\PplUser[] paginate($object = null, array $settings = [])
 */
class PplUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pplUsers = $this->paginate($this->PplUsers);

        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplUser = $this->PplUsers->get($id, [
            'contain' => ['CouSubjects']
        ]);

        $this->set('pplUser', $pplUser);
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplUser = $this->PplUsers->newEntity();
        if ($this->request->is('post')) {
            $pplUser = $this->PplUsers->patchEntity($pplUser, $this->request->getData());
            if ($this->PplUsers->save($pplUser)) {
                $this->Flash->success(__('The ppl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl user could not be saved. Please, try again.'));
        }
        $this->set(compact('pplUser'));
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplUser = $this->PplUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplUser = $this->PplUsers->patchEntity($pplUser, $this->request->getData());
            if ($this->PplUsers->save($pplUser)) {
                $this->Flash->success(__('The ppl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl user could not be saved. Please, try again.'));
        }
        $this->set(compact('pplUser'));
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplUser = $this->PplUsers->get($id);
        if ($this->PplUsers->delete($pplUser)) {
            $this->Flash->success(__('The ppl user has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
