<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResProjects Controller
 *
 * @property \App\Model\Table\ResProjectsTable $ResProjects
 *
 * @method \App\Model\Entity\ResProject[] paginate($object = null, array $settings = [])
 */
class ResProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $resProjects = $this->paginate($this->ResProjects);

        $this->set(compact('resProjects'));
        $this->set('_serialize', ['resProjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resProject = $this->ResProjects->get($id, [
            'contain' => ['ResProjectParticipants']
        ]);

        $this->set('resProject', $resProject);
        $this->set('_serialize', ['resProject']);
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
            if ($this->ResProjects->save($resProject)) {
                $this->Flash->success(__('The res project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resProject = $this->ResProjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resProject = $this->ResProjects->patchEntity($resProject, $this->request->getData());
            if ($this->ResProjects->save($resProject)) {
                $this->Flash->success(__('The res project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The res project could not be saved. Please, try again.'));
        }
        $this->set(compact('resProject'));
        $this->set('_serialize', ['resProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Res Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resProject = $this->ResProjects->get($id);
        if ($this->ResProjects->delete($resProject)) {
            $this->Flash->success(__('The res project has been deleted.'));
        } else {
            $this->Flash->error(__('The res project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
