<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dates Model
 *
 * @method \App\Model\Entity\Date get($primaryKey, $options = [])
 * @method \App\Model\Entity\Date newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Date[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Date|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Date patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Date[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Date findOrCreate($search, callable $callback = null, $options = [])
 */
class DatesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('data');
        $this->setDisplayField('reserva_numero');
        $this->setPrimaryKey(['reserva_numero', 'data']);

        $this->belongsTo('Bookings')
              ->setForeignKey('reserva_numero');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('reserva_numero')
            ->allowEmpty('reserva_numero', 'create');

        $validator
            ->dateTime('data')
            ->allowEmpty('data', 'create');

        $validator
            ->scalar('quarto')
            ->maxLength('quarto', 5)
            ->allowEmpty('quarto');

        $validator
            ->scalar('excluido')
            ->allowEmpty('excluido');

        return $validator;
    }

    public function removeDatesFromRooms($rooms){
            return $this->deleteAll(['quarto IN' => $rooms]);
    }

    public function removeDatesFromBookings($reserva_numero){
            return $this->deleteAll(['reserva_numero IN' => $reserva_numero]);
    }
}
