<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * ResPatents Controller
 *
 * @property \App\Model\Table\ResPatentsTable $ResPatents
 *
 * @method \App\Model\Entity\ResPatent[] paginate($object = null, array $settings = [])
 */
class ResPatentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
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
             if ($user['rol'] == 'admin') {
                 return true;
             }
         }

         // Deny everything else
         return parent::isAuthorized($user);
     }

    public function index()
    {
        $resPatents = $this->paginate($this->ResPatents);

        $this->set(compact('resPatents'));
        $this->set('_serialize', ['resPatents']);

        $related = array(
            [ 'name' => __('Projects'), 'controller' => 'res_projects'],
            [ 'name' => __('Contracts'), 'controller' => 'res_contracts'],
            [ 'name' => __('Patents'), 'controller' => 'res_patents'],
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
        $resPatent = $this->ResPatents->newEntity();
        if ($this->request->is('post')) {
            $resPatent = $this->ResPatents->patchEntity($resPatent, $this->request->getData());
            if ($this->ResPatents->save($resPatent)) {
                $this->Flash->success(__('The patent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patent could not be saved. Please, try again.'));
        }
        $this->set(compact('resPatent'));
        $this->set('_serialize', ['resPatent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Patent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resPatent = $this->ResPatents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resPatent = $this->ResPatents->patchEntity($resPatent, $this->request->getData());
            if ($this->ResPatents->save($resPatent)) {
                $this->Flash->success(__('The patent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patent could not be saved. Please, try again.'));
        }
        $this->set(compact('resPatent'));
        $this->set('_serialize', ['resPatent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Patent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resPatent = $this->ResPatents->get($id);
        if ($this->ResPatents->delete($resPatent)) {
            $this->Flash->success(__('The patent has been deleted.'));
        } else {
            $this->Flash->error(__('The patent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
