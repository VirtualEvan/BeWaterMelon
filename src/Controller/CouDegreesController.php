<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CouDegrees Controller
 *
 * @property \App\Model\Table\CouDegreesTable $CouDegrees
 *
 * @method \App\Model\Entity\CouDegree[] paginate($object = null, array $settings = [])
 */
class CouDegreesController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $couDegrees = $this->paginate($this->CouDegrees);

        $this->set(compact('couDegrees'));
        $this->set('_serialize', ['couDegrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Cou Degree id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couDegree = $this->CouDegrees->get($id, [
            'contain' => ['CouCourseDegreeSubjects']
        ]);

        $this->set('couDegree', $couDegree);
        $this->set('_serialize', ['couDegree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couDegree = $this->CouDegrees->newEntity();
        if ($this->request->is('post')) {
            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData());
            if ($this->CouDegrees->save($couDegree)) {
                $this->Flash->success(__('The cou degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou degree could not be saved. Please, try again.'));
        }
        $this->set(compact('couDegree'));
        $this->set('_serialize', ['couDegree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cou Degree id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couDegree = $this->CouDegrees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData());
            if ($this->CouDegrees->save($couDegree)) {
                $this->Flash->success(__('The cou degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cou degree could not be saved. Please, try again.'));
        }
        $this->set(compact('couDegree'));
        $this->set('_serialize', ['couDegree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cou Degree id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couDegree = $this->CouDegrees->get($id);
        if ($this->CouDegrees->delete($couDegree)) {
            $this->Flash->success(__('The cou degree has been deleted.'));
        } else {
            $this->Flash->error(__('The cou degree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
