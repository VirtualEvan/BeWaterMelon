<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PubJournals Controller
 *
 * @property \App\Model\Table\PubJournalsTable $PubJournals
 *
 * @method \App\Model\Entity\PubJournal[] paginate($object = null, array $settings = [])
 */
class PubJournalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pubJournals = $this->paginate($this->PubJournals);

        $this->set(compact('pubJournals'));
        $this->set('_serialize', ['pubJournals']);
    }

    /**
     * View method
     *
     * @param string|null $id Pub Journal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pubJournal = $this->PubJournals->get($id, [
            'contain' => []
        ]);

        $this->set('pubJournal', $pubJournal);
        $this->set('_serialize', ['pubJournal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pubJournal = $this->PubJournals->newEntity();
        if ($this->request->is('post')) {
            $pubJournal = $this->PubJournals->patchEntity($pubJournal, $this->request->getData());
            if ($this->PubJournals->save($pubJournal)) {
                $this->Flash->success(__('The pub journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub journal could not be saved. Please, try again.'));
        }
        $this->set(compact('pubJournal'));
        $this->set('_serialize', ['pubJournal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pub Journal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pubJournal = $this->PubJournals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pubJournal = $this->PubJournals->patchEntity($pubJournal, $this->request->getData());
            if ($this->PubJournals->save($pubJournal)) {
                $this->Flash->success(__('The pub journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub journal could not be saved. Please, try again.'));
        }
        $this->set(compact('pubJournal'));
        $this->set('_serialize', ['pubJournal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pub Journal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pubJournal = $this->PubJournals->get($id);
        if ($this->PubJournals->delete($pubJournal)) {
            $this->Flash->success(__('The pub journal has been deleted.'));
        } else {
            $this->Flash->error(__('The pub journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
