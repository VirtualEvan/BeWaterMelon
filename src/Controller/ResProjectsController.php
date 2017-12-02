<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ResProjects Controller
 *
 * @property \App\Model\Table\ResProjectsTable $ResProjects
 *
 * @method \App\Model\Entity\ResProject[] paginate($object = null, array $settings = [])
 */
class ResProjectsController extends AppController
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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $resProjects = $this->ResProjects->find('all')->contain(['ResProjectParticipants']);

        $this->set(compact('resProjects'));
        $this->set('_serialize', ['resProjects']);

        $related = array(
            [ 'name' => __('Projects'), 'controller' => 'res_projects'],
            [ 'name' => __('Contracts'), 'controller' => 'res_contracts'],
            [ 'name' => __('Patents'), 'controller' => 'res_patents'],
        );
        $this->set(compact('related'));
    }

    /**
     * View method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resProject = $this->ResProjects->get($id, [
            'contain' => ['ResProjectParticipants']
        ]);

        $this->set('resProject', $resProject);
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resProject = $this->ResProjects->newEntity();
        if ($this->request->is('post')) {
            $resProject = $this->ResProjects->patchEntity($resProject, $this->request->getData());
            if ($this->ResProjects->save($resProject)) {
                $this->Flash->success(__('The res project has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resProject = $this->ResProjects->get($id, [
            'contain' => ['ResProjectParticipants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resProject = $this->ResProjects->patchEntity($resProject, $this->request->getData());
            $resProject->dirty('res_project_participants', true);
            if ($this->ResProjects->save($resProject)) {
                $this->Flash->success(__('The res project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resProject = $this->ResProjects->get($id);
        if ($this->ResProjects->delete($resProject)) {
            $this->Flash->success(__('The res project has been deleted.'));
        } else {
            $this->Flash->error(__('The res project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
