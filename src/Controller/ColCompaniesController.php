<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ColCompanies Controller
 *
 * @property \App\Model\Table\ColCompaniesTable $ColCompanies
 *
 * @method \App\Model\Entity\ColCompany[] paginate($object = null, array $settings = [])
 */
class ColCompaniesController extends AppController
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
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colCompanies = $this->ColCompanies->find('all');

        $this->set(compact('colCompanies'));
        $this->set('_serialize', ['colCompanies']);

        $related = array(
            [ 'name' => __('Member of'), 'controller' => 'col_members'],
            [ 'name' => __('Colleagues'), 'controller' => 'col_colleagues'],
            [ 'name' => __('Groups'), 'controller' => 'col_groups'],
            [ 'name' => __('Institutions'), 'controller' => 'col_institutions'],
            [ 'name' => __('Companies'), 'controller' => 'col_companies'],
        );
        $this->set(compact('related'));
    }

    /**
     * View method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colCompany = $this->ColCompanies->get($id, [
            'contain' => []
        ]);

        $this->set('colCompany', $colCompany);
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colCompany = $this->ColCompanies->newEntity();
        if ($this->request->is('post')) {
            $colCompany = $this->ColCompanies->patchEntity($colCompany, $this->request->getData());
            if (!empty($this->request->data['upload']['name'])) {
                if ($this->ColCompanies->save($colCompany)) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colCompany->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_companies/' . $imgName);
                    }
                    else {
                        $this->Flash->error(__('Invalid image format.'));
                    }

                    $this->Flash->success(__('The company has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('Image must be selected.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('colCompany'));
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colCompany = $this->ColCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colCompany = $this->ColCompanies->patchEntity($colCompany, $this->request->getData());
            if ($this->ColCompanies->save($colCompany)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colCompany->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_companies/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('colCompany'));
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colCompany = $this->ColCompanies->get($id);
        if ($this->ColCompanies->delete($colCompany)) {
            if(file_exists(WWW_ROOT . 'img/col_companies/' . $colCompany->id))
            {
              unlink(WWW_ROOT . 'img/col_companies/' . $colCompany->id);
            }
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
