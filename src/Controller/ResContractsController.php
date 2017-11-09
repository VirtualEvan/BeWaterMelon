<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResContracts Controller
 *
 * @property \App\Model\Table\ResContractsTable $ResContracts
 *
 * @method \App\Model\Entity\ResContract[] paginate($object = null, array $settings = [])
 */
class ResContractsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $resContracts = $this->paginate($this->ResContracts);

        $this->set(compact('resContracts'));
        $this->set('_serialize', ['resContracts']);
    }

    /**
     * View method
     *
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resContract = $this->ResContracts->get($id, [
            'contain' => ['ResContractParticipants']
        ]);

        $this->set('resContract', $resContract);
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resContract = $this->ResContracts->newEntity();
        if ($this->request->is('post')) {
            $resContract = $this->ResContracts->patchEntity($resContract, $this->request->getData());
            if ($this->ResContracts->save($resContract)) {
                $this->Flash->success(__('The res contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res contract could not be saved. Please, try again.'));
        }
        $this->set(compact('resContract'));
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resContract = $this->ResContracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resContract = $this->ResContracts->patchEntity($resContract, $this->request->getData());
            if ($this->ResContracts->save($resContract)) {
                $this->Flash->success(__('The res contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res contract could not be saved. Please, try again.'));
        }
        $this->set(compact('resContract'));
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resContract = $this->ResContracts->get($id);
        if ($this->ResContracts->delete($resContract)) {
            $this->Flash->success(__('The res contract has been deleted.'));
        } else {
            $this->Flash->error(__('The res contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
