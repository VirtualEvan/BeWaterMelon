<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActEditorialBoards Controller
 *
 * @property \App\Model\Table\ActEditorialBoardsTable $ActEditorialBoards
 *
 * @method \App\Model\Entity\ActEditorialBoard[] paginate($object = null, array $settings = [])
 */
class ActEditorialBoardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $actEditorialBoards = $this->paginate($this->ActEditorialBoards);

        $this->set(compact('actEditorialBoards'));
        $this->set('_serialize', ['actEditorialBoards']);
    }

    /**
     * View method
     *
     * @param string|null $id Act Editorial Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actEditorialBoard = $this->ActEditorialBoards->get($id, [
            'contain' => []
        ]);

        $this->set('actEditorialBoard', $actEditorialBoard);
        $this->set('_serialize', ['actEditorialBoard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actEditorialBoard = $this->ActEditorialBoards->newEntity();
        if ($this->request->is('post')) {
            $actEditorialBoard = $this->ActEditorialBoards->patchEntity($actEditorialBoard, $this->request->getData());
            if ($this->ActEditorialBoards->save($actEditorialBoard)) {
                $this->Flash->success(__('The act editorial board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act editorial board could not be saved. Please, try again.'));
        }
        $this->set(compact('actEditorialBoard'));
        $this->set('_serialize', ['actEditorialBoard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Act Editorial Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actEditorialBoard = $this->ActEditorialBoards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actEditorialBoard = $this->ActEditorialBoards->patchEntity($actEditorialBoard, $this->request->getData());
            if ($this->ActEditorialBoards->save($actEditorialBoard)) {
                $this->Flash->success(__('The act editorial board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The act editorial board could not be saved. Please, try again.'));
        }
        $this->set(compact('actEditorialBoard'));
        $this->set('_serialize', ['actEditorialBoard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Act Editorial Board id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actEditorialBoard = $this->ActEditorialBoards->get($id);
        if ($this->ActEditorialBoards->delete($actEditorialBoard)) {
            $this->Flash->success(__('The act editorial board has been deleted.'));
        } else {
            $this->Flash->error(__('The act editorial board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
