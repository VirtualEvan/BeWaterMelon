<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PrePresses Controller
 *
 * @property \App\Model\Table\PrePressesTable $PrePresses
 *
 * @method \App\Model\Entity\PrePress[] paginate($object = null, array $settings = [])
 */
class PrePressesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $prePresses = $this->paginate($this->PrePresses);

        $this->set(compact('prePresses'));
        $this->set('_serialize', ['prePresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Pre Press id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prePress = $this->PrePresses->get($id, [
            'contain' => []
        ]);

        $this->set('prePress', $prePress);
        $this->set('_serialize', ['prePress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prePress = $this->PrePresses->newEntity();
        if ($this->request->is('post')) {
            $prePress = $this->PrePresses->patchEntity($prePress, $this->request->getData());
            if ($this->PrePresses->save($prePress)) {
                $this->Flash->success(__('The pre press has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pre press could not be saved. Please, try again.'));
        }
        $this->set(compact('prePress'));
        $this->set('_serialize', ['prePress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pre Press id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prePress = $this->PrePresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prePress = $this->PrePresses->patchEntity($prePress, $this->request->getData());
            if ($this->PrePresses->save($prePress)) {
                $this->Flash->success(__('The pre press has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pre press could not be saved. Please, try again.'));
        }
        $this->set(compact('prePress'));
        $this->set('_serialize', ['prePress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pre Press id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prePress = $this->PrePresses->get($id);
        if ($this->PrePresses->delete($prePress)) {
            $this->Flash->success(__('The pre press has been deleted.'));
        } else {
            $this->Flash->error(__('The pre press could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
