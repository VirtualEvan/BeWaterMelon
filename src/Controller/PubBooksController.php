<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PubBooks Controller
 *
 * @property \App\Model\Table\PubBooksTable $PubBooks
 *
 * @method \App\Model\Entity\PubBook[] paginate($object = null, array $settings = [])
 */
class PubBooksController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'logout']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
                return true;
            }
        }

        // Registered users can edit their own info
        if ($this->request->action === 'edit') {
            $userId = (int)$this->request->params['pass'][0];
            if ($userId == $user['id']) {
                return true;
            }
        }

        // Deny everything else
        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pubBooks = $this->PubBooks->find('all');

        $this->set(compact('pubBooks'));
        $this->set('_serialize', ['pubBooks']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->PplUsers->find('all');
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);

        $related = array(
            [ 'name' => __('Journals'), 'controller' => 'pub_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'pub_conferences'],
            [ 'name' => __('Books'), 'controller' => 'pub_books'],
        );
        $this->set(compact('related'));
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
            $pubBook->author = implode(',', $this->request->getData()['pplUser']);
            if ($this->PubBooks->save($pubBook)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('pubBook'));
        $this->set('_serialize', ['pubBook']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
            $pubBook->author = implode(',', $this->request->getData()['pplUser']);
            if ($this->PubBooks->save($pubBook)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('pubBook'));
        $this->set('_serialize', ['pubBook']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
        //$this->request->allowMethod(['post', 'delete']);
        $pubBook = $this->PubBooks->get($id);
        if ($this->PubBooks->delete($pubBook)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
