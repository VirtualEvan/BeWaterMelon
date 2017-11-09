<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PubConferences Controller
 *
 * @property \App\Model\Table\PubConferencesTable $PubConferences
 *
 * @method \App\Model\Entity\PubConference[] paginate($object = null, array $settings = [])
 */
class PubConferencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pubConferences = $this->paginate($this->PubConferences);

        $this->set(compact('pubConferences'));
        $this->set('_serialize', ['pubConferences']);
    }

    /**
     * View method
     *
     * @param string|null $id Pub Conference id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pubConference = $this->PubConferences->get($id, [
            'contain' => []
        ]);

        $this->set('pubConference', $pubConference);
        $this->set('_serialize', ['pubConference']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pubConference = $this->PubConferences->newEntity();
        if ($this->request->is('post')) {
            $pubConference = $this->PubConferences->patchEntity($pubConference, $this->request->getData());
            if ($this->PubConferences->save($pubConference)) {
                $this->Flash->success(__('The pub conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub conference could not be saved. Please, try again.'));
        }
        $this->set(compact('pubConference'));
        $this->set('_serialize', ['pubConference']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pub Conference id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pubConference = $this->PubConferences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pubConference = $this->PubConferences->patchEntity($pubConference, $this->request->getData());
            if ($this->PubConferences->save($pubConference)) {
                $this->Flash->success(__('The pub conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub conference could not be saved. Please, try again.'));
        }
        $this->set(compact('pubConference'));
        $this->set('_serialize', ['pubConference']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pub Conference id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pubConference = $this->PubConferences->get($id);
        if ($this->PubConferences->delete($pubConference)) {
            $this->Flash->success(__('The pub conference has been deleted.'));
        } else {
            $this->Flash->error(__('The pub conference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
