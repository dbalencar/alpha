<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Licitação '.$model->licitacao->nu_ProcessoLicitatorio=>array('/licitacao/view','id'=>$model->licitacao->id),
	'Itens'=>array('admin','licitacao'=>$model->licitacao->id),
	$model->nu_SequencialItem=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create','licitacao'=>$model->licitacao_id)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>