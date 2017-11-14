<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PubBooks Controller
 *
 * @property \App\Model\Table\PubBooksTable $PubBooks
 *
 * @method \App\Model\Entity\PubBook[] paginate($object = null, array $settings = [])
 */
class PubBooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pubBooks = $this->paginate($this->PubBooks);

        $this->set(compact('pubBooks'));
        $this->set('_serialize', ['pubBooks']);
    }

    /**
     * View method
     *
     * @param string|null $id Pub Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pubBook = $this->PubBooks->get($id, [
            'contain' => []
        ]);

        $this->set('pubBook', $pubBook);
        $this->set('_serialize', ['pubBook']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pubBook = $this->PubBooks->newEntity();
        if ($this->request->is('post')) {
            $pubBook = $this->PubBooks->patchEntity($pubBook, $this->request->getData());
            if ($this->PubBooks->save($pubBook)) {
                $this->Flash->success(__('The pub book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub book could not be saved. Please, try again.'));
        }
        $this->set(compact('pubBook'));
        $this->set('_serialize', ['pubBook']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pub Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pubBook = $this->PubBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pubBook = $this->PubBooks->patchEntity($pubBook, $this->request->getData());
            if ($this->PubBooks->save($pubBook)) {
                $this->Flash->success(__('The pub book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pub book could not be saved. Please, try again.'));
        }
        $this->set(compact('pubBook'));
        $this->set('_serialize', ['pubBook']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pub Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pubBook = $this->PubBooks->get($id);
        if ($this->PubBooks->delete($pubBook)) {
            $this->Flash->success(__('The pub book has been deleted.'));
        } else {
            $this->Flash->error(__('The pub book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
