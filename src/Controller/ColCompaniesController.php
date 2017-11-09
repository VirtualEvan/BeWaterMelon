<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ColCompanies Controller
 *
 * @property \App\Model\Table\ColCompaniesTable $ColCompanies
 *
 * @method \App\Model\Entity\ColCompany[] paginate($object = null, array $settings = [])
 */
class ColCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $colCompanies = $this->paginate($this->ColCompanies);

        $this->set(compact('colCompanies'));
        $this->set('_serialize', ['colCompanies']);
    }

    /**
     * View method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colCompany = $this->ColCompanies->get($id, [
            'contain' => []
        ]);

        $this->set('colCompany', $colCompany);
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colCompany = $this->ColCompanies->newEntity();
        if ($this->request->is('post')) {
            $colCompany = $this->ColCompanies->patchEntity($colCompany, $this->request->getData());
            if ($this->ColCompanies->save($colCompany)) {
                $this->Flash->success(__('The col company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col company could not be saved. Please, try again.'));
        }
        $this->set(compact('colCompany'));
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colCompany = $this->ColCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colCompany = $this->ColCompanies->patchEntity($colCompany, $this->request->getData());
            if ($this->ColCompanies->save($colCompany)) {
                $this->Flash->success(__('The col company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The col company could not be saved. Please, try again.'));
        }
        $this->set(compact('colCompany'));
        $this->set('_serialize', ['colCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Col Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colCompany = $this->ColCompanies->get($id);
        if ($this->ColCompanies->delete($colCompany)) {
            $this->Flash->success(__('The col company has been deleted.'));
        } else {
            $this->Flash->error(__('The col company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
