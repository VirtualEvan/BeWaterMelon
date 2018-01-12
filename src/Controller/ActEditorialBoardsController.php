<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ActEditorialBoards Controller
 *
 * @property \App\Model\Table\ActEditorialBoardsTable $ActEditorialBoards
 *
 * @method \App\Model\Entity\ActEditorialBoard[] paginate($object = null, array $settings = [])
 */
class ActEditorialBoardsController extends AppController
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
            return true;
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
        $actEditorialBoards = $this->paginate($this->ActEditorialBoards);

        $this->set(compact('actEditorialBoards'));
        $this->set('_serialize', ['actEditorialBoards']);

        $related = array(
            [ 'name' => __('Editorials'), 'controller' => 'act_editorial_boards'],
            [ 'name' => __('Journals'), 'controller' => 'act_journals'],
            [ 'name' => __('Conferences'), 'controller' => 'act_conferences'],
        );
        $this->set(compact('related'));
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
                $this->Flash->success(__('The editorial board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The editorial board could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The editorial board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The editorial board could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The editorial board has been deleted.'));
        } else {
            $this->Flash->error(__('The editorial board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
