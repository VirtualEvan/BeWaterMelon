<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * PubJournals Controller
 *
 * @property \App\Model\Table\PubJournalsTable $PubJournals
 *
 * @method \App\Model\Entity\PubJournal[] paginate($object = null, array $settings = [])
 */
class PubJournalsController extends AppController
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
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            return true;
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
        $pubJournals = $this->PubJournals->find('all');

        $this->set(compact('pubJournals'));
        $this->set('_serialize', ['pubJournals']);

        $related = array(
            [ 'name' => __('Journals'), 'controller' => 'pub_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'pub_conferences'],
            [ 'name' => __('Books'), 'controller' => 'pub_books'],
        );
        $this->set(compact('related'));

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->PplUsers->find('all');
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pubJournal = $this->PubJournals->newEntity();
        //var_dump($pubJournal);
        if ($this->request->is('post')) {
            $pubJournal = $this->PubJournals->patchEntity($pubJournal, $this->request->getData());
            if(isset($this->request->getData()['pplUser']) && !empty($this->request->getData()['pplUser'])){
                $pubJournal->author = implode(',', $this->request->getData()['pplUser']);
            }
            else{
                $this->Flash->error(__('Please, select an author.'));
            }

            if ($this->PubJournals->save($pubJournal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $this->set(compact('pubJournal'));
        $this->set('_serialize', ['pubJournal']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
            if(isset($this->request->getData()['pplUser']) && !empty($this->request->getData()['pplUser'])){
                $pubJournal->author = implode(',', $this->request->getData()['pplUser']);
            }

            if ($this->PubJournals->save($pubJournal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $this->set(compact('pubJournal'));
        $this->set('_serialize', ['pubJournal']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
        //$this->request->allowMethod(['post', 'delete']);
        $pubJournal = $this->PubJournals->get($id);
        if ($this->PubJournals->delete($pubJournal)) {
            $this->Flash->success(__('The journal has been deleted.'));
        } else {
            $this->Flash->error(__('The journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
