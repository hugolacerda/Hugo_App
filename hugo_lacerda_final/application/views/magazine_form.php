<?php echo validation_errors(); ?>
<!--
<?php // echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
-->
<?php echo form_open_multipart(); ?>
    <div>
        <?php echo form_label('List Name', 'list_name'); ?>
        <?php echo form_input('list_name', set_value('list_name')); ?>
    </div>
<!--     <div>
        <?php // echo form_label('Issue Number', 'issue_number'); ?>
        <?php // echo form_input('issue_number', set_value('issue_number')); ?>
    </div>
    <div>
        <?php // echo form_label('Date Published', 'issue_date_publication'); ?>
        <?php // echo form_input('issue_date_publication', set_value('issue_date_publication')); ?>
    </div>
    <div>
        <?php // echo form_label('Cover scan', 'issue_cover'); ?>
        <?php // echo form_upload('issue_cover'); ?>
    </div> -->
    <div>
        <?php echo form_submit('save', 'Save'); ?>
    </div>
<?php echo form_close(); ?>