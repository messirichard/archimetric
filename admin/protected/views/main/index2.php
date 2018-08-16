<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'myForm',
    'method'=>'get',
    'action'=>array('/listing/cari'),
    'enableAjaxValidation'=>true,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'cari'); ?>
        
        <?php 
        // $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        //     'model'=>$model,
        //     'attribute'=>'cari', 
        //     'sourceUrl'=>$this->createUrl('searchlist'),
             
        //     // additional javascript options for the autocomplete plugin
        //     'options'=>array(
        //         'delay'=>300,
        //         'minLength'=>2,
        //         'showAnim'=>'fold',
        //         'select'=>"js:function(event, ui) {
        //             $('#jquerySelector').val(ui.item.id);

        //         }"
        //     ),
            
        //     ));
        ?> 
        
        
        <?php echo $form->textField($model,'cari'); ?>
        <?php echo $form->error($model,'cari'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'area'); ?>
        <?php echo $form->dropDownList($model,'area',Listing::model()->getAreaSelect('Surabaya'), array('empty'=>'Semua Area')); ?>
        <?php echo $form->error($model,'area'); ?>
    </div>

    <input type="submit" value="Submit">
<?php $this->endWidget(); ?>

</div><!-- form -->

<ul>
    <?php foreach ($jenis as $key => $value): ?>
    <li><a href="<?php echo CHtml::normalizeUrl(array('/listing/index', 'jenis'=>$value['slug'])); ?>"><?php echo $value['jenis'] ?></a></li>
    <?php endforeach ?>
</ul>