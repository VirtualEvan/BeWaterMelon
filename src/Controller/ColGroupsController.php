<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ColGroups Controller
 *
 * @property \App\Model\Table\ColGroupsTable $ColGroups
 *
 * @method \App\Model\Entity\ColGroup[] paginate($object = null, array $settings = [])
 */
class ColGroupsController extends AppController
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
        $colGroups = $this->ColGroups->find('all');

        $this->set(compact('colGroups'));
        $this->set('_serialize', ['colGroups']);

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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colGroup = $this->ColGroups->newEntity();
        if ($this->request->is('post')) {
            $colGroup = $this->ColGroups->patchEntity($colGroup, $this->request->getData());
            if (!empty($this->request->data['upload']['name'])) {
                if ($this->ColGroups->save($colGroup)) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colGroup->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_groups/' . $imgName);
                    }
                    else {
                        $this->Flash->error(__('Invalid image format.'));
                    }

                    $this->Flash->success(__('The group has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('Image must be selected.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('colGroup'));
        $this->set('_serialize', ['colGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colGroup = $this->ColGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colGroup = $this->ColGroups->patchEntity($colGroup, $this->request->getData());
            if ($this->ColGroups->save($colGroup)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colGroup->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_groups/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('colGroup'));
        $this->set('_serialize', ['colGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colGroup = $this->ColGroups->get($id);
        if ($this->ColGroups->delete($colGroup)) {
            if(file_exists(WWW_ROOT . 'img/col_groups/' . $colGroup->id))
            {
              unlink(WWW_ROOT . 'img/col_groups/' . $colGroup->id);
            }
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
