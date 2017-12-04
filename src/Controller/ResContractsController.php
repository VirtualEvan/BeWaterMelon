<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ResContracts Controller
 *
 * @property \App\Model\Table\ResContractsTable $ResContracts
 *
 * @method \App\Model\Entity\ResContract[] paginate($object = null, array $settings = [])
 */
class ResContractsController extends AppController
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
        $resContracts = $this->ResContracts->find('all')->contain(['ResContractParticipants']);

        $this->set(compact('resContracts'));
        $this->set('_serialize', ['resContracts']);

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
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resContract = $this->ResContracts->get($id, [
            'contain' => ['ResContractParticipants']
        ]);

        $this->set('resContract', $resContract);
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resContract = $this->ResContracts->newEntity();
        if ($this->request->is('post')) {
            $resContract = $this->ResContracts->patchEntity($resContract, $this->request->getData());
            if (!empty($this->request->data['upload']['name'])) {
                if ($this->ResContracts->save($resContract)) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $resContract->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/res_contracts/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                else{
                    $this->Flash->success(__('The contract has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Image must be selected.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $this->set(compact('resContract'));
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resContract = $this->ResContracts->get($id, [
            'contain' => ['ResContractParticipants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resContract = $this->ResContracts->patchEntity($resContract, $this->request->getData());
            if ($this->ResContracts->save($resContract)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $resContract->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/res_contracts/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                else{
                    $this->Flash->error(__('Image must be selected.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $this->set(compact('resContract'));
        $this->set('_serialize', ['resContract']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resContract = $this->ResContracts->get($id);
        if ($this->ResContracts->delete($resContract)) {
            if(file_exists(WWW_ROOT . 'img/res_contracts/' . $resContract->id))
            {
              unlink(WWW_ROOT . 'img/res_contracts/' . $resContract->id);
            }
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
