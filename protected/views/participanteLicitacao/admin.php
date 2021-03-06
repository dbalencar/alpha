<?php
/* @var $this ParticipanteLicitacaoController */
/* @var $model ParticipanteLicitacao */

$this->breadcrumbs=array(
	'Licitação '.$model->licitacao->nu_ProcessoLicitatorio=>array('/licitacao/view','id'=>$model->licitacao->id),
	'Participantes',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create','licitacao'=>$model->licitacao->id)),
	array('label'=>'Gerar REM', 'url'=>'#', 'linkOptions'=>array('onclick'=>'alert($.fn.yiiGridView.getSelection("participante-licitacao-grid"));')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#participante-licitacao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar</h1>

<p>
Você pode opcionalmente usar um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no início de cada um de seus valores para especificar como a comparação deve ser feita.
</p>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'participante-licitacao-grid',
	'dataProvider'=>$model->search($model->licitacao),
	'filter'=>$model,
	'columns'=>array(
		'cd_CicParticipante',
		'nm_Participante',
		array(
			'name'=>'tp_Pessoa',
			'filter'=>TipoPessoa::model()->listAll(),
			'value'=>'$data->pessoa->descricao',
		),
		array(
			'name'=>'tp_Participacao',
			'filter'=>TipoParticipante::model()->listAll(),
			'value'=>'$data->participacao->descricao',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
