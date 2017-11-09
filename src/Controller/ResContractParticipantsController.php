<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResContractParticipants Controller
 *
 * @property \App\Model\Table\ResContractParticipantsTable $ResContractParticipants
 *
 * @method \App\Model\Entity\ResContractParticipant[] paginate($object = null, array $settings = [])
 */
class ResContractParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ResContracts']
        ];
        $resContractParticipants = $this->paginate($this->ResContractParticipants);

        $this->set(compact('resContractParticipants'));
        $this->set('_serialize', ['resContractParticipants']);
    }

    /**
     * View method
     *
     * @param string|null $id Res Contract Participant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resContractParticipant = $this->ResContractParticipants->get($id, [
            'contain' => ['ResContracts']
        ]);

        $this->set('resContractParticipant', $resContractParticipant);
        $this->set('_serialize', ['resContractParticipant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resContractParticipant = $this->ResContractParticipants->newEntity();
        if ($this->request->is('post')) {
            $resContractParticipant = $this->ResContractParticipants->patchEntity($resContractParticipant, $this->request->getData());
            if ($this->ResContractParticipants->save($resContractParticipant)) {
                $this->Flash->success(__('The res contract participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res contract participant could not be saved. Please, try again.'));
        }
        $resContracts = $this->ResContractParticipants->ResContracts->find('list', ['limit' => 200]);
        $this->set(compact('resContractParticipant', 'resContracts'));
        $this->set('_serialize', ['resContractParticipant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Contract Participant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resContractParticipant = $this->ResContractParticipants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resContractParticipant = $this->ResContractParticipants->patchEntity($resContractParticipant, $this->request->getData());
            if ($this->ResContractParticipants->save($resContractParticipant)) {
                $this->Flash->success(__('The res contract participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res contract participant could not be saved. Please, try again.'));
        }
        $resContracts = $this->ResContractParticipants->ResContracts->find('list', ['limit' => 200]);
        $this->set(compact('resContractParticipant', 'resContracts'));
        $this->set('_serialize', ['resContractParticipant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Contract Participant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resContractParticipant = $this->ResContractParticipants->get($id);
        if ($this->ResContractParticipants->delete($resContractParticipant)) {
            $this->Flash->success(__('The res contract participant has been deleted.'));
        } else {
            $this->Flash->error(__('The res contract participant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
