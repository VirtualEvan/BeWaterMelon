<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ColColleagues Controller
 *
 * @property \App\Model\Table\ColColleaguesTable $ColColleagues
 *
 * @method \App\Model\Entity\ColColleague[] paginate($object = null, array $settings = [])
 */
class ColColleaguesController extends AppController
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
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colColleagues = $this->ColColleagues->find('all');

        $this->set(compact('colColleagues'));
        $this->set('_serialize', ['colColleagues']);

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
        $colColleague = $this->ColColleagues->newEntity();
        if ($this->request->is('post')) {
            $colColleague = $this->ColColleagues->patchEntity($colColleague, $this->request->getData());
            if (!empty($this->request->data['upload']['name'])) {
                if ($this->ColColleagues->save($colColleague)) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colColleague->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_colleagues/' . $imgName);
                    }
                    else {
                        $this->Flash->error(__('Invalid image format.'));
                    }

                    $this->Flash->success(__('The colleague has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('Image must be selected.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The colleague could not be saved. Please, try again.'));
        }
        $this->set(compact('colColleague'));
        $this->set('_serialize', ['colColleague']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Colleague id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colColleague = $this->ColColleagues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colColleague = $this->ColColleagues->patchEntity($colColleague, $this->request->getData());
            if ($this->ColColleagues->save($colColleague)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colColleague->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_colleagues/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                $this->Flash->success(__('The colleague has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The colleague could not be saved. Please, try again.'));
        }
        $this->set(compact('colColleague'));
        $this->set('_serialize', ['colColleague']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Colleague id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colColleague = $this->ColColleagues->get($id);
        if ($this->ColColleagues->delete($colColleague)) {
            if(file_exists(WWW_ROOT . 'img/col_colleagues/' . $colColleague->id))
            {
              unlink(WWW_ROOT . 'img/col_colleagues/' . $colColleague->id);
            }
            $this->Flash->success(__('The colleague has been deleted.'));
        } else {
            $this->Flash->error(__('The colleague could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
