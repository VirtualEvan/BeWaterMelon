<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ColInstitutions Controller
 *
 * @property \App\Model\Table\ColInstitutionsTable $ColInstitutions
 *
 * @method \App\Model\Entity\ColInstitution[] paginate($object = null, array $settings = [])
 */
class ColInstitutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colInstitutions = $this->paginate($this->ColInstitutions);

        $this->set(compact('colInstitutions'));
        $this->set('_serialize', ['colInstitutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Col Institution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colInstitution = $this->ColInstitutions->get($id, [
            'contain' => []
        ]);

        $this->set('colInstitution', $colInstitution);
        $this->set('_serialize', ['colInstitution']);
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
            if ($this->ColInstitutions->save($colInstitution)) {
                $this->Flash->success(__('The col institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col institution could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The col institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col institution could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The col institution has been deleted.'));
        } else {
            $this->Flash->error(__('The col institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
