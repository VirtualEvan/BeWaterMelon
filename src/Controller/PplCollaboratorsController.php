<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PplCollaborators Controller
 *
 * @property \App\Model\Table\PplCollaboratorsTable $PplCollaborators
 *
 * @method \App\Model\Entity\PplCollaborator[] paginate($object = null, array $settings = [])
 */
class PplCollaboratorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pplCollaborators = $this->paginate($this->PplCollaborators);

        $this->set(compact('pplCollaborators'));
        $this->set('_serialize', ['pplCollaborators']);
    }

    /**
     * View method
     *
     * @param string|null $id Ppl Collaborator id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplCollaborator = $this->PplCollaborators->get($id, [
            'contain' => []
        ]);

        $this->set('pplCollaborator', $pplCollaborator);
        $this->set('_serialize', ['pplCollaborator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplCollaborator = $this->PplCollaborators->newEntity();
        if ($this->request->is('post')) {
            $pplCollaborator = $this->PplCollaborators->patchEntity($pplCollaborator, $this->request->getData());
            if ($this->PplCollaborators->save($pplCollaborator)) {
                $this->Flash->success(__('The ppl collaborator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl collaborator could not be saved. Please, try again.'));
        }
        $this->set(compact('pplCollaborator'));
        $this->set('_serialize', ['pplCollaborator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Collaborator id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplCollaborator = $this->PplCollaborators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplCollaborator = $this->PplCollaborators->patchEntity($pplCollaborator, $this->request->getData());
            if ($this->PplCollaborators->save($pplCollaborator)) {
                $this->Flash->success(__('The ppl collaborator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl collaborator could not be saved. Please, try again.'));
        }
        $this->set(compact('pplCollaborator'));
        $this->set('_serialize', ['pplCollaborator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Collaborator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplCollaborator = $this->PplCollaborators->get($id);
        if ($this->PplCollaborators->delete($pplCollaborator)) {
            $this->Flash->success(__('The ppl collaborator has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl collaborator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}