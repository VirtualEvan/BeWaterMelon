<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProProducts Controller
 *
 * @property \App\Model\Table\ProProductsTable $ProProducts
 *
 * @method \App\Model\Entity\ProProduct[] paginate($object = null, array $settings = [])
 */
class ProProductsController extends AppController
{

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
                $this->Flash->success(__('The pro product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pro product could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The pro product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pro product could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The pro product has been deleted.'));
        } else {
            $this->Flash->error(__('The pro product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
