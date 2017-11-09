<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResProjectParticipants Controller
 *
 * @property \App\Model\Table\ResProjectParticipantsTable $ResProjectParticipants
 *
 * @method \App\Model\Entity\ResProjectParticipant[] paginate($object = null, array $settings = [])
 */
class ResProjectParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ResProjects']
        ];
        $resProjectParticipants = $this->paginate($this->ResProjectParticipants);

        $this->set(compact('resProjectParticipants'));
        $this->set('_serialize', ['resProjectParticipants']);
    }

    /**
     * View method
     *
     * @param string|null $id Res Project Participant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resProjectParticipant = $this->ResProjectParticipants->get($id, [
            'contain' => ['ResProjects']
        ]);

        $this->set('resProjectParticipant', $resProjectParticipant);
        $this->set('_serialize', ['resProjectParticipant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resProjectParticipant = $this->ResProjectParticipants->newEntity();
        if ($this->request->is('post')) {
            $resProjectParticipant = $this->ResProjectParticipants->patchEntity($resProjectParticipant, $this->request->getData());
            if ($this->ResProjectParticipants->save($resProjectParticipant)) {
                $this->Flash->success(__('The res project participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project participant could not be saved. Please, try again.'));
        }
        $resProjects = $this->ResProjectParticipants->ResProjects->find('list', ['limit' => 200]);
        $this->set(compact('resProjectParticipant', 'resProjects'));
        $this->set('_serialize', ['resProjectParticipant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Project Participant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resProjectParticipant = $this->ResProjectParticipants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resProjectParticipant = $this->ResProjectParticipants->patchEntity($resProjectParticipant, $this->request->getData());
            if ($this->ResProjectParticipants->save($resProjectParticipant)) {
                $this->Flash->success(__('The res project participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project participant could not be saved. Please, try again.'));
        }
        $resProjects = $this->ResProjectParticipants->ResProjects->find('list', ['limit' => 200]);
        $this->set(compact('resProjectParticipant', 'resProjects'));
        $this->set('_serialize', ['resProjectParticipant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Project Participant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resProjectParticipant = $this->ResProjectParticipants->get($id);
        if ($this->ResProjectParticipants->delete($resProjectParticipant)) {
            $this->Flash->success(__('The res project participant has been deleted.'));
        } else {
            $this->Flash->error(__('The res project participant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
