<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ActConferences Controller
 *
 * @property \App\Model\Table\ActConferencesTable $ActConferences
 *
 * @method \App\Model\Entity\ActConference[] paginate($object = null, array $settings = [])
 */
class ActConferencesController extends AppController
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
        $actConferences = $this->ActConferences->find('all')->contain(['actConferenceYears']);

        $this->set(compact('actConferences'));
        $this->set('_serialize', ['actConferences']);

        $related = array(
            [ 'name' => __('Editorials'), 'controller' => 'act_editorial_boards'],
            [ 'name' => __('Journals'), 'controller' => 'act_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'act_conferences'],
        );
        $this->set(compact('related'));
    }

    /**
     * View method
     *
     * @param string|null $id Act Conference id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actConference = $this->ActConferences->get($id, [
            'contain' => ['ActConferenceYears']
        ]);

        $this->set('actConference', $actConference);
        $this->set('_serialize', ['actConference']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actConference = $this->ActConferences->newEntity();
        if ($this->request->is('post')) {
            $actConference = $this->ActConferences->patchEntity($actConference, $this->request->getData());
            if ($this->ActConferences->save($actConference)) {
                $this->Flash->success(__('The act conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act conference could not be saved. Please, try again.'));
        }
        $this->set(compact('actConference'));
        $this->set('_serialize', ['actConference']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Act Conference id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actConference = $this->ActConferences->get($id, [
            'contain' => ['ActConferenceYears']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actConference = $this->ActConferences->patchEntity($actConference, $this->request->getData());
            if ($this->ActConferences->save($actConference)) {
                $this->Flash->success(__('The act conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act conference could not be saved. Please, try again.'));
        }
        $this->set(compact('actConference'));
        $this->set('_serialize', ['actConference']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Act Conference id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actConference = $this->ActConferences->get($id);
        if ($this->ActConferences->delete($actConference)) {
            $this->Flash->success(__('The act conference has been deleted.'));
        } else {
            $this->Flash->error(__('The act conference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
