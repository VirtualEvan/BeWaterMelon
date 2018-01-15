<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ColInstitutions Controller
 *
 * @property \App\Model\Table\ColInstitutionsTable $ColInstitutions
 *
 * @method \App\Model\Entity\ColInstitution[] paginate($object = null, array $settings = [])
 */
class ColInstitutionsController extends AppController
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
        $colInstitutions = $this->ColInstitutions->find('all');

        $this->set(compact('colInstitutions'));
        $this->set('_serialize', ['colInstitutions']);

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
        $colInstitution = $this->ColInstitutions->newEntity();
        if ($this->request->is('post')) {
            $colInstitution = $this->ColInstitutions->patchEntity($colInstitution, $this->request->getData());
            if (!empty($this->request->data['upload']['name'])) {
                if ($this->ColInstitutions->save($colInstitution)) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colInstitution->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_institutions/' . $imgName);
                    }
                    else {
                        $this->Flash->error(__('Invalid image format.'));
                    }

                    $this->Flash->success(__('The institution has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('Image must be selected.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The institution could not be saved. Please, try again.'));
        }
        $this->set(compact('colInstitution'));
        $this->set('_serialize', ['colInstitution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Institution id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colInstitution = $this->ColInstitutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colInstitution = $this->ColInstitutions->patchEntity($colInstitution, $this->request->getData());
            if ($this->ColInstitutions->save($colInstitution)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $colInstitution->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/col_institutions/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                $this->Flash->success(__('The institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The institution could not be saved. Please, try again.'));
        }
        $this->set(compact('colInstitution'));
        $this->set('_serialize', ['colInstitution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Institution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colInstitution = $this->ColInstitutions->get($id);
        if ($this->ColInstitutions->delete($colInstitution)) {
            if(file_exists(WWW_ROOT . 'img/col_institutions/' . $colInstitution->id))
            {
              unlink(WWW_ROOT . 'img/col_institutions/' . $colInstitution->id);
            }
            $this->Flash->success(__('The institution has been deleted.'));
        } else {
            $this->Flash->error(__('The institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
