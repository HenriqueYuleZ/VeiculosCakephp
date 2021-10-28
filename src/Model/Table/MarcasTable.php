<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Marcas Model
 *
 * @property \App\Model\Table\VeiculosTable&\Cake\ORM\Association\HasMany $Veiculos
 *
 * @method \App\Model\Entity\Marca newEmptyEntity()
 * @method \App\Model\Entity\Marca newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Marca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Marca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Marca findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Marca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Marca[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Marca|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Marca saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MarcasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('marcas');
        $this->setDisplayField('descricao_marca');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Veiculos', [
            'foreignKey' => 'marca_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('descricao_marca')
            ->maxLength('descricao_marca', 220)
            ->requirePresence('descricao_marca', 'create')
            ->notEmptyString('descricao_marca');

        return $validator;
    }
}
