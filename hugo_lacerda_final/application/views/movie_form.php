<?php echo validation_errors(); ?>
<!--
<?php // echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
-->
<?php echo form_open_multipart(); ?>
        <?php echo form_hidden('list_id', set_value($list_id)); ?>

    <div>
        <?php echo form_label('Movie Name', 'movie_name'); ?>
        <?php echo form_input('movie_name', set_value('movie_name')); ?>
    </div>

     <div>
        <?php echo form_label('Movie Number', 'movie_number'); ?>
        <?php echo form_input('movie_number', set_value('movie_number')); ?>
    </div>

     <div>
        <?php echo form_label('Movie movie_description', 'movie_description'); ?>
        <?php echo form_textarea('movie_description', set_value('movie_description')); ?>
    </div>

    <div>
        <?php echo form_submit('save', 'Save'); ?>
    </div>
<?php echo form_close(); ?>