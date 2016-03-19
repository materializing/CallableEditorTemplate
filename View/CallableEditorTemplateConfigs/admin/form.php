<?php
/**
 * [ADMIN] CallableEditorTemplate
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @package			CallableEditorTemplate
 * @license			MIT
 */
$hasAddableBlog = false;
if (count($blogContentDatas) > 0) {
	$hasAddableBlog = true;
}
?>
<?php if($this->request->params['action'] != 'admin_add'): ?>
	<?php echo $this->BcForm->create('CallableEditorTemplateConfig', array('url' => array('action' => 'edit'))) ?>
	<?php echo $this->BcForm->input('CallableEditorTemplateConfig.id', array('type' => 'hidden')) ?>
	<?php echo $this->BcForm->input('CallableEditorTemplateConfig.content_id', array('type' => 'hidden')) ?>
	<?php echo $this->BcForm->input('CallableEditorTemplateConfig.model', array('type' => 'hidden')) ?>
<?php else: ?>
	<?php echo $this->BcForm->create('CallableEditorTemplateConfig', array('url' => array('action' => 'add'))) ?>
	<?php echo $this->BcForm->input('CallableEditorTemplateConfig.model', array('type' => 'hidden')) ?>
<?php endif ?>

<?php if($this->request->params['action'] != 'admin_add'): ?>
<h2>
<?php if ($this->request->data['CallableEditorTemplateConfig']['model'] == 'Page'): ?>
	<?php $this->BcBaser->link('≫記事一覧こちら', array(
		'admin' => true, 'plugin' => null, 'controller' => 'pages',
		'action' => 'index'
	)) ?>
<?php endif ?>
<?php if ($this->request->data['CallableEditorTemplateConfig']['model'] == 'BlogContent'): ?>
	<?php $this->BcBaser->link($blogContentDatas[$this->request->data['CallableEditorTemplateConfig']['content_id']] .' ブログ設定編集はこちら', array(
		'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_contents',
		'action' => 'edit', $this->request->data['CallableEditorTemplateConfig']['content_id']
	)) ?>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php $this->BcBaser->link('≫記事一覧こちら', array(
		'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_posts',
		'action' => 'index', $this->request->data['CallableEditorTemplateConfig']['content_id']
	)) ?>
<?php endif ?>
</h2>
<?php endif ?>

<div id="CallableEditorTemplateConfigConfigTable">
<table cellpadding="0" cellspacing="0" class="form-table section">
	<?php if($this->request->params['action'] != 'admin_add'): ?>
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('CallableEditorTemplateConfig.id', 'NO') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->value('CallableEditorTemplateConfig.id') ?>
		</td>
	</tr>
	<?php endif ?>

	<?php if($this->request->params['action'] == 'admin_add'): ?>
		<?php if ($hasAddableBlog): ?>
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('CallableEditorTemplateConfig.content_id', 'ブログ') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('CallableEditorTemplateConfig.content_id', array('type' => 'select', 'options' => $blogContentDatas)) ?>
			<?php echo $this->BcForm->error('CallableEditorTemplateConfig.content_id') ?>
		</td>
	</tr>
		<?php else: ?>
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('CallableEditorTemplateConfig.content_id', 'ブログ') ?></th>
		<td class="col-input">
			追加設定可能なブログがありません。
		</td>
	</tr>
		<?php endif ?>
	<?php endif ?>
	<?php if ($hasAddableBlog): ?>
	<tr>
		<th class="col-head">
			<?php echo $this->BcForm->label('CallableEditorTemplateConfig.status', 'コーラブルエディターテンプレートの利用') ?>
			<?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpCallableEditorTemplateConfigStatus', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<div id="helptextCallableEditorTemplateConfigStatus" class="helptext">
				<ul>
					<li>コーラブルエディターテンプレート利用の有無を指定します。</li>
				</ul>
			</div>
		</th>
		<td class="col-input">
			<?php echo $this->BcForm->input('CallableEditorTemplateConfig.status', array('type' => 'radio', 'options' => $this->BcText->booleanDoList('利用'))) ?>
			<?php echo $this->BcForm->error('CallableEditorTemplateConfig.status') ?>
		</td>
	</tr>
	<?php endif ?>
</table>
</div>

<?php if ($hasAddableBlog): ?>
<div class="submit">
	<?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'btn-red button')) ?>
</div>
<?php endif ?>
<?php echo $this->BcForm->end() ?>