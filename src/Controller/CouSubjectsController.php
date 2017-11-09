<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CouSubjects Controller
 *
 * @property \App\Model\Table\CouSubjectsTable $CouSubjects
 *
 * @method \App\Model\Entity\CouSubject[] paginate($object = null, array $settings = [])
 */
class CouSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PplUsers']
        ];
        $couSubjects = $this->paginate($this->CouSubjects);

        $this->set(compact('couSubjects'));
        $this->set('_serialize', ['couSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Cou Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couSubject = $this->CouSubjects->get($id, [
            'contain' => ['PplUsers', 'CouCourseDegreeSubjects']
        ]);

        $this->set('couSubject', $couSubject);
        $this->set('_serialize', ['couSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couSubject = $this->CouSubjects->newEntity();
        if ($this->request->is('post')) {
            $couSubject = $this->CouSubjects->patchEntity($couSubject, $this->request->getData());
            if ($this->CouSubjects->save($couSubject)) {
                $this->Flash->success(__('The cou subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou subject could not be saved. Please, try again.'));
        }
        $pplUsers = $this->CouSubjects->PplUsers->find('list', ['limit' => 200]);
        $this->set(compact('couSubject', 'pplUsers'));
        $this->set('_serialize', ['couSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cou Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couSubject = $this->CouSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couSubject = $this->CouSubjects->patchEntity($couSubject, $this->request->getData());
            if ($this->CouSubjects->save($couSubject)) {
                $this->Flash->success(__('The cou subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou subject could not be saved. Please, try again.'));
        }
        $pplUsers = $this->CouSubjects->PplUsers->find('list', ['limit' => 200]);
        $this->set(compact('couSubject', 'pplUsers'));
        $this->set('_serialize', ['couSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cou Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couSubject = $this->CouSubjects->get($id);
        if ($this->CouSubjects->delete($couSubject)) {
            $this->Flash->success(__('The cou subject has been deleted.'));
        } else {
            $this->Flash->error(__('The cou subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
