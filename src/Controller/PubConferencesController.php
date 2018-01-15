<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PubConferences Controller
 *
 * @property \App\Model\Table\PubConferencesTable $PubConferences
 *
 * @method \App\Model\Entity\PubConference[] paginate($object = null, array $settings = [])
 */
class PubConferencesController extends AppController
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
        $pubConferences = $this->PubConferences->find('all');

        $this->set(compact('pubConferences'));
        $this->set('_serialize', ['pubConferences']);

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
        $pubConference = $this->PubConferences->newEntity();
        if ($this->request->is('post')) {
            $pubConference = $this->PubConferences->patchEntity($pubConference, $this->request->getData());
            $pubConference->author = implode(',', $this->request->getData()['pplUser']);
            if ($this->PubConferences->save($pubConference)) {
                $this->Flash->success(__('The conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference could not be saved. Please, try again.'));
        }
        $this->set(compact('pubConference'));
        $this->set('_serialize', ['pubConference']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
            $pubConference->author = implode(',', $this->request->getData()['author']);
            if ($this->PubConferences->save($pubConference)) {
                $this->Flash->success(__('The conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference could not be saved. Please, try again.'));
        }
        $this->set(compact('pubConference'));
        $this->set('_serialize', ['pubConference']);

        //Authors
        $this->loadModel('PplUsers');
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);
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
        //$this->request->allowMethod(['post', 'delete']);
        $pubConference = $this->PubConferences->get($id);
        if ($this->PubConferences->delete($pubConference)) {
            $this->Flash->success(__('The conference has been deleted.'));
        } else {
            $this->Flash->error(__('The conference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
