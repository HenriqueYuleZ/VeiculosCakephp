<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Marca'), ['action' => 'edit', $marca->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Marca'), ['action' => 'delete', $marca->id], ['confirm' => __('Deseja deletar o item #{0}?', $marca->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Marcas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nova Marca'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="marcas view content">
            <h3><?= h($marca->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao Marca') ?></th>
                    <td><?= h($marca->descricao_marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($marca->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($marca->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($marca->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Veiculos') ?></h4>
                <?php if (!empty($marca->veiculos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao Veiculo') ?></th>
                            <th><?= __('Ano') ?></th>
                            <th><?= __('Marca Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($marca->veiculos as $veiculos) : ?>
                        <tr>
                            <td><?= h($veiculos->id) ?></td>
                            <td><?= h($veiculos->descricao_veiculo) ?></td>
                            <td><?= h($veiculos->ano) ?></td>
                            <td><?= h($veiculos->marca_id) ?></td>
                            <td><?= h($veiculos->created) ?></td>
                            <td><?= h($veiculos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Veiculos', 'action' => 'view', $veiculos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Veiculos', 'action' => 'edit', $veiculos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Veiculos', 'action' => 'delete', $veiculos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
