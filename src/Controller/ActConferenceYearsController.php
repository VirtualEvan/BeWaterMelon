<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ActConferenceYears Controller
 *
 * @property \App\Model\Table\ActConferenceYearsTable $ActConferenceYears
 *
 * @method \App\Model\Entity\ActConferenceYear[] paginate($object = null, array $settings = [])
 */
class ActConferenceYearsController extends AppController
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
        $this->paginate = [
            'contain' => ['ActConferences']
        ];
        $actConferenceYears = $this->ActConferenceYears->find('all');

        $this->set(compact('actConferenceYears'));
        $this->set('_serialize', ['actConferenceYears']);
    }

    /**
     * View method
     *
     * @param string|null $id Conference Year id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actConferenceYear = $this->ActConferenceYears->get($id, [
            'contain' => ['ActConferences']
        ]);

        $this->set('actConferenceYear', $actConferenceYear);
        $this->set('_serialize', ['actConferenceYear']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actConferenceYear = $this->ActConferenceYears->newEntity();
        if ($this->request->is('post')) {
            $actConferenceYear = $this->ActConferenceYears->patchEntity($actConferenceYear, $this->request->getData());
            if ($this->ActConferenceYears->save($actConferenceYear)) {
                $this->Flash->success(__('The conference year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference year could not be saved. Please, try again.'));
        }
        $actConferences = $this->ActConferenceYears->ActConferences->find('list', ['limit' => 200]);
        $this->set(compact('actConferenceYear', 'actConferences'));
        $this->set('_serialize', ['actConferenceYear']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Conference Year id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actConferenceYear = $this->ActConferenceYears->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actConferenceYear = $this->ActConferenceYears->patchEntity($actConferenceYear, $this->request->getData());
            if ($this->ActConferenceYears->save($actConferenceYear)) {
                $this->Flash->success(__('The conference year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference year could not be saved. Please, try again.'));
        }
        $actConferences = $this->ActConferenceYears->ActConferences->find('list', ['limit' => 200]);
        $this->set(compact('actConferenceYear', 'actConferences'));
        $this->set('_serialize', ['actConferenceYear']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Conference Year id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actConferenceYear = $this->ActConferenceYears->get($id);
        if ($this->ActConferenceYears->delete($actConferenceYear)) {
            $this->Flash->success(__('The conference year has been deleted.'));
        } else {
            $this->Flash->error(__('The conference year could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
