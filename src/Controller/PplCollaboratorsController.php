<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplCollaborators Controller
 *
 * @property \App\Model\Table\PplCollaboratorsTable $PplCollaborators
 *
 * @method \App\Model\Entity\PplCollaborator[] paginate($object = null, array $settings = [])
 */
class PplCollaboratorsController extends AppController
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
        $pplCollaborators = $this->PplCollaborators->find('all');

        $this->set(compact('pplCollaborators'));
        $this->set('_serialize', ['pplCollaborators']);

        $related = array(
            [ 'name' => __('Members'), 'controller' => 'ppl_users'],
            [ 'name' => __('PhD Students'), 'controller' => 'ppl_phds'],
            [ 'name' => __('Postdoc'), 'controller' => 'ppl_postdocs'],
            [ 'name' => __('Visitors'), 'controller' => 'ppl_visitors'],
            [ 'name' => __('Past PhD Students'), 'controller' => 'ppl_past_phds'],
            [ 'name' => __('Collaborators'), 'controller' => 'ppl_collaborators']
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
        $pplCollaborator = $this->PplCollaborators->newEntity();
        if ($this->request->is('post')) {
            $pplCollaborator = $this->PplCollaborators->patchEntity($pplCollaborator, $this->request->getData());
            if ($this->PplCollaborators->save($pplCollaborator)) {
                $this->Flash->success(__('The ppl collaborator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collaborator could not be saved. Please, try again.'));
        }
        $this->set(compact('pplCollaborator'));
        $this->set('_serialize', ['pplCollaborator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Collaborator id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplCollaborator = $this->PplCollaborators->get($id, [
                'contain' => []
            ]);

            $pplCollaborator = $this->PplCollaborators->patchEntity($pplCollaborator, $this->request->getData());
            if ($this->PplCollaborators->save($pplCollaborator)) {
                $this->Flash->success(__('The collaborator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collaborator could not be saved. Please, try again.'));
        }

        $pplCollaborators = $this->PplCollaborators->find('all');
        $this->set(compact('pplCollaborators'));
        $this->set('_serialize', ['pplCollaborators']);

        if(isset($this->request->params['pass'][0])){
            $pplCollaborator = $this->PplCollaborators->get($id, [
                'contain' => []
            ]);
        }
        else {
            $pplCollaborator = $this->PplCollaborators->newEntity();
        }

        $this->set(compact('pplCollaborator'));
        $this->set('_serialize', ['pplCollaborator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Collaborator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $pplCollaborator = $this->PplCollaborators->get($id);
        if ($this->PplCollaborators->delete($pplCollaborator)) {
            $this->Flash->success(__('The collaborator has been deleted.'));
        } else {
            $this->Flash->error(__('The collaborator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
