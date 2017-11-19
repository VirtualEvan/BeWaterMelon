<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplUsers Controller
 *
 * @property \App\Model\Table\PplUsersTable $PplUsers
 *
 * @method \App\Model\Entity\PplUser[] paginate($object = null, array $settings = [])
 */
class PplUsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view', 'logout']);
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

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));

            return $this->redirect($this->referer());
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // TODO: quitar password de aquí
        // Members
        $pplUsers = $this->paginate($this->PplUsers);
        $this->set(compact('pplUsers'));
        $this->set('_serialize', ['pplUsers']);

        // Phds
        $this->loadModel('PplPhds');
        $pplPhds = $this->paginate($this->PplPhds);
        $this->set(compact('pplPhds'));
        $this->set('_serialize', ['pplPhds']);

        // Postdoc
        $this->loadModel('PplPostdocs');
        $pplPostdocs = $this->paginate($this->PplPostdocs);
        $this->set(compact('pplPostdocs'));
        $this->set('_serialize', ['pplPostdocs']);

        // Visitors
        $this->loadModel('PplVisitors');
        $pplVisitors = $this->paginate($this->PplVisitors);
        $this->set(compact('pplVisitors'));
        $this->set('_serialize', ['pplVisitors']);

        // Past phds
        $this->loadModel('PplPastPhds');
        $pplPastPhds = $this->paginate($this->PplPastPhds);
        $this->set(compact('pplPastPhds'));
        $this->set('_serialize', ['pplPastPhds']);

        // Collaborators
        $this->loadModel('PplCollaborators');
        $pplCollaborators = $this->paginate($this->PplCollaborators);
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
     * View method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplUser = $this->PplUsers->get($id, [
            'contain' => ['CouSubjects']
        ]);

        $this->set('pplUser', $pplUser);
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplUser = $this->PplUsers->newEntity();
        if ($this->request->is('post')) {
            $pplUser = $this->PplUsers->patchEntity($pplUser, $this->request->getData());
            if ($this->PplUsers->save($pplUser)) {
                $this->Flash->success(__('The ppl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl user could not be saved. Please, try again.'));
        }
        $this->set(compact('pplUser'));
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplUser = $this->PplUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplUser = $this->PplUsers->patchEntity($pplUser, $this->request->getData());
            if ($this->PplUsers->save($pplUser)) {
                $this->Flash->success(__('The ppl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl user could not be saved. Please, try again.'));
        }
        $this->set(compact('pplUser'));
        $this->set('_serialize', ['pplUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplUser = $this->PplUsers->get($id);
        if ($this->PplUsers->delete($pplUser)) {
            $this->Flash->success(__('The ppl user has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
