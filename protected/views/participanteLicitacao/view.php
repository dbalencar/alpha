<?php
/* @var $this ParticipanteLicitacaoController */
/* @var $model ParticipanteLicitacao */

$this->breadcrumbs=array(
	'Licitação '.$model->licitacao->nu_ProcessoLicitatorio=>array('/licitacao/view','id'=>$model->licitacao_id),
	'Participantes'=>array('admin','licitacao'=>$model->licitacao_id),
	$model->cd_CicParticipante,
);

$this->menu=array(
	array('label'=>'Certidões', 'url'=>array('/certidao/admin','participante'=>$model->id)),
	array('label'=>'Adicionar', 'url'=>array('create','licitacao'=>$model->licitacao_id)),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Deseja realmente excluir este item?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cd_CicParticipante',
		'pessoa.descricao',
		'nm_Participante',
		'participacao.descricao',
		array(
			'name'=>'cd_CGCConsorcio',
			'visible'=>$model->cd_CGCConsorcio,
		),
		'convidadoText',
	),
)); ?>

<?php $this->widget('zii.widgets.jui.CJuiAccordion',array(
	'panels'=>array(
		'Certidões'=>$this->renderPartial('_certidoes',array('model'=>$model),true),
	),
	'options'=>array(
		'animated'=>'bounceslide',
	),
)); ?>