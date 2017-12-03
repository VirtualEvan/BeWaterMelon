<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PplPostdocs Controller
 *
 * @property \App\Model\Table\PplPostdocsTable $PplPostdocs
 *
 * @method \App\Model\Entity\PplPostdoc[] paginate($object = null, array $settings = [])
 */
class PplPostdocsController extends AppController
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
        $pplPostdocs = $this->paginate($this->PplPostdocs);

        $this->set(compact('pplPostdocs'));
        $this->set('_serialize', ['pplPostdocs']);

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
     * @param string|null $id Ppl Postdoc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pplPostdoc = $this->PplPostdocs->get($id, [
            'contain' => []
        ]);

        $this->set('pplPostdoc', $pplPostdoc);
        $this->set('_serialize', ['pplPostdoc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pplPostdoc = $this->PplPostdocs->newEntity();
        if ($this->request->is('post')) {
            $pplPostdoc = $this->PplPostdocs->patchEntity($pplPostdoc, $this->request->getData());
            if ($this->PplPostdocs->save($pplPostdoc)) {
                $this->Flash->success(__('The postdoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The postdoc could not be saved. Please, try again.'));
        }
        $this->set(compact('pplPostdoc'));
        $this->set('_serialize', ['pplPostdoc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ppl Postdoc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pplPostdoc = $this->PplPostdocs->get($id, [
                'contain' => []
            ]);
            $pplPostdoc = $this->PplPostdocs->patchEntity($pplPostdoc, $this->request->getData());
            if ($this->PplPostdocs->save($pplPostdoc)) {
                $this->Flash->success(__('The postdoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The postdoc could not be saved. Please, try again.'));
        }

        $pplPostdocs = $this->paginate($this->PplPostdocs);
        $this->set(compact('pplPostdocs'));
        $this->set('_serialize', ['pplPostdocs']);

        if(isset($this->request->params['pass'][0])){
            $pplPostdoc = $this->PplPostdocs->get($id, [
                'contain' => []
            ]);
        }
        else {
            $pplPostdoc = $this->PplPostdocs->newEntity();
        }

        $this->set(compact('pplPostdoc'));
        $this->set('_serialize', ['pplPostdoc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ppl Postdoc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pplPostdoc = $this->PplPostdocs->get($id);
        if ($this->PplPostdocs->delete($pplPostdoc)) {
            $this->Flash->success(__('The postdoc has been deleted.'));
        } else {
            $this->Flash->error(__('The postdoc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
