<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActJournals Controller
 *
 * @property \App\Model\Table\ActJournalsTable $ActJournals
 *
 * @method \App\Model\Entity\ActJournal[] paginate($object = null, array $settings = [])
 */
class ActJournalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $actJournals = $this->paginate($this->ActJournals);

        $this->set(compact('actJournals'));
        $this->set('_serialize', ['actJournals']);
    }

    /**
     * View method
     *
     * @param string|null $id Act Journal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actJournal = $this->ActJournals->get($id, [
            'contain' => []
        ]);

        $this->set('actJournal', $actJournal);
        $this->set('_serialize', ['actJournal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actJournal = $this->ActJournals->newEntity();
        if ($this->request->is('post')) {
            $actJournal = $this->ActJournals->patchEntity($actJournal, $this->request->getData());
            if ($this->ActJournals->save($actJournal)) {
                $this->Flash->success(__('The act journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act journal could not be saved. Please, try again.'));
        }
        $this->set(compact('actJournal'));
        $this->set('_serialize', ['actJournal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Act Journal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actJournal = $this->ActJournals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actJournal = $this->ActJournals->patchEntity($actJournal, $this->request->getData());
            if ($this->ActJournals->save($actJournal)) {
                $this->Flash->success(__('The act journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act journal could not be saved. Please, try again.'));
        }
        $this->set(compact('actJournal'));
        $this->set('_serialize', ['actJournal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Act Journal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actJournal = $this->ActJournals->get($id);
        if ($this->ActJournals->delete($actJournal)) {
            $this->Flash->success(__('The act journal has been deleted.'));
        } else {
            $this->Flash->error(__('The act journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
