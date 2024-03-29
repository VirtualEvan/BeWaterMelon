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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resProject = $this->ResProjects->newEntity();
        if ($this->request->is('post')) {
            $resProject = $this->ResProjects->patchEntity($resProject, $this->request->getData());
                if (!empty($this->request->data['upload']['name'])) {
                    if ($this->ResProjects->save($resProject)) {
                        $file = $this->request->data['upload'];
                        $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                        $allowedExtensions = array('jpg', 'jpeg', 'png');

                        $imgName = $resProject->id;

                        if (in_array($extension, $allowedExtensions)) {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/res_projects/' . $imgName);
                        }
                        else {
                            $this->Flash->error(__('Invalid image format.'));
                        }

                        $this->Flash->success(__('The project has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
                else{
                    $this->Flash->error(__('Image must be selected.'));
                    return $this->redirect($this->referer());
                }

            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
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
            //debug($this->request->getData());die;
            $resProject->dirty('res_project_participants', true);
            if ($this->ResProjects->save($resProject)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $resProject->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/res_projects/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resProject = $this->ResProjects->get($id);
        if ($this->ResProjects->delete($resProject)) {
            if(file_exists(WWW_ROOT . 'img/res_projects/' . $resProject->id))
            {
              unlink(WWW_ROOT . 'img/res_projects/' . $resProject->id);
            }
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
