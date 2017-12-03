<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * ProProducts Controller
 *
 * @property \App\Model\Table\ProProductsTable $ProProducts
 *
 * @method \App\Model\Entity\ProProduct[] paginate($object = null, array $settings = [])
 */
class ProProductsController extends AppController
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
        $proProducts = $this->paginate($this->ProProducts);

        $this->set(compact('proProducts'));
        $this->set('_serialize', ['proProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Pro Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proProduct = $this->ProProducts->get($id, [
            'contain' => []
        ]);

        $this->set('proProduct', $proProduct);
        $this->set('_serialize', ['proProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proProduct = $this->ProProducts->newEntity();
        if ($this->request->is('post')) {
            $proProduct = $this->ProProducts->patchEntity($proProduct, $this->request->getData());
            if ($this->ProProducts->save($proProduct)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $proProduct->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/pro_products/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                else{
                    $this->Flash->error(__('Image must be selected.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Th product could not be saved. Please, try again.'));
        }
        $this->set(compact('proProduct'));
        $this->set('_serialize', ['proProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pro Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proProduct = $this->ProProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proProduct = $this->ProProducts->patchEntity($proProduct, $this->request->getData());
            if ($this->ProProducts->save($proProduct)) {
                if (!empty($this->request->data['upload']['name'])) {
                    $file = $this->request->data['upload'];
                    $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $allowedExtensions = array('jpg', 'jpeg', 'png');

                    $imgName = $proProduct->id;

                    if (in_array($extension, $allowedExtensions)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/pro_products/' . $imgName);
                    }
                    else {
                      $this->Flash->error(__('Invalid image format.'));
                    }
                }
                else {
                  $this->Flash->error(__('Invalid image format.'));
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('proProduct'));
        $this->set('_serialize', ['proProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pro Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proProduct = $this->ProProducts->get($id);
        if ($this->ProProducts->delete($proProduct)) {
            if(file_exists(WWW_ROOT . 'img/pro_products/' . $proProduct->id))
            {
              unlink(WWW_ROOT . 'img/pro_products/' . $proProduct->id);
            }
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
