<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ColColleagues Controller
 *
 * @property \App\Model\Table\ColColleaguesTable $ColColleagues
 *
 * @method \App\Model\Entity\ColColleague[] paginate($object = null, array $settings = [])
 */
class ColColleaguesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colColleagues = $this->paginate($this->ColColleagues);

        $this->set(compact('colColleagues'));
        $this->set('_serialize', ['colColleagues']);
    }

    /**
     * View method
     *
     * @param string|null $id Col Colleague id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colColleague = $this->ColColleagues->get($id, [
            'contain' => []
        ]);

        $this->set('colColleague', $colColleague);
        $this->set('_serialize', ['colColleague']);
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
            if ($this->ColColleagues->save($colColleague)) {
                $this->Flash->success(__('The col colleague has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col colleague could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The col colleague has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col colleague could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The col colleague has been deleted.'));
        } else {
            $this->Flash->error(__('The col colleague could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
