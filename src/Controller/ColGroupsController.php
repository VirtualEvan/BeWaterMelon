<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ColGroups Controller
 *
 * @property \App\Model\Table\ColGroupsTable $ColGroups
 *
 * @method \App\Model\Entity\ColGroup[] paginate($object = null, array $settings = [])
 */
class ColGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colGroups = $this->paginate($this->ColGroups);

        $this->set(compact('colGroups'));
        $this->set('_serialize', ['colGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Col Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colGroup = $this->ColGroups->get($id, [
            'contain' => []
        ]);

        $this->set('colGroup', $colGroup);
        $this->set('_serialize', ['colGroup']);
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
            if ($this->ColGroups->save($colGroup)) {
                $this->Flash->success(__('The col group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col group could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The col group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col group could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The col group has been deleted.'));
        } else {
            $this->Flash->error(__('The col group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
