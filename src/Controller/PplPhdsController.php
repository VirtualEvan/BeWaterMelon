<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplPhds Controller
 *
 * @property \App\Model\Table\PplPhdsTable $PplPhds
 *
 * @method \App\Model\Entity\PplPhd[] paginate($object = null, array $settings = [])
 */
class PplPhdsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
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
        $pplPhds = $this->paginate($this->PplPhds);

        $this->set(compact('pplPhds'));
        $this->set('_serialize', ['pplPhds']);

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
     * @param string|null $id Ppl Phd id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplPhd = $this->PplPhds->get($id, [
            'contain' => []
        ]);

        $this->set('pplPhd', $pplPhd);
        $this->set('_serialize', ['pplPhd']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplPhd = $this->PplPhds->newEntity();
        if ($this->request->is('post')) {
            $pplPhd = $this->PplPhds->patchEntity($pplPhd, $this->request->getData());
            if ($this->PplPhds->save($pplPhd)) {
                $this->Flash->success(__('The ppl phd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl phd could not be saved. Please, try again.'));
        }
        $this->set(compact('pplPhd'));
        $this->set('_serialize', ['pplPhd']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Phd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pplPhd = $this->PplPhds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplPhd = $this->PplPhds->patchEntity($pplPhd, $this->request->getData());
            if ($this->PplPhds->save($pplPhd)) {
                $this->Flash->success(__('The ppl phd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ppl phd could not be saved. Please, try again.'));
        }
        $this->set(compact('pplPhd'));
        $this->set('_serialize', ['pplPhd']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Phd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplPhd = $this->PplPhds->get($id);
        if ($this->PplPhds->delete($pplPhd)) {
            $this->Flash->success(__('The ppl phd has been deleted.'));
        } else {
            $this->Flash->error(__('The ppl phd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
