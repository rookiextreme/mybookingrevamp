<div class="btn-group">
    <!--<?php echo anchor('auth/register', '<i class="icon-plus-sign"></i> Tambah Pengguna', 'class="btn"'); ?> 
    <?php echo anchor('auth/import', '<i class="icon-hdd"></i> Tambah Pengguna Secara Pukal', 'class="btn"'); ?> -->
</div>

<?php
if ($this->tank_auth->is_admin()) {
    //echo anchor('#deleteModal', '<i class="icon-trash"></i> Hapus Rekod', 'id="delete-list" class="btn disabled" data-toggle="modal"');
}
?> 

<br/><br/>
<!--<div>
    <select class="span3" name="fk_user_id">
        <option value="0" <?php echo (!$select_user) ? "selected" : '' ?>>Papar semua pengguna</option>
<?php foreach ($users as $user): ?>
                            <option value="<?php echo $user->fk_user_id ?>" <?php echo ($select_user == $user->fk_user_id) ? "selected" : '' ?>><?php echo $user->full_name ?></option>
<?php endforeach; ?>
    </select>
</div>-->

<div class="control-group">
    <input type="text" name="user_id" id="user_id" class="ac_field span3 margin-bottom0" />
    <input type="hidden" name=ac_user_id"" id="ac_user_id"/>
    <input type="button" class="btn" name="submit" id="submit" value="Cari"/>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th width="35%">Nama Penuh</th>
            <th width="30%">Email</th>
            <th width="20%">Tahap Pengguna</th>
            <th width="15%">Status</th>
            <th width="10%" class="hide">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <?php if ($user->user_level != 1): ?>
                    <?php $row_type = (in_array($user->activated, array(0,2))) ? 'class="error"' : ''; ?>
                    <tr data-provides="rowlink" <?php echo $row_type ?>>
                        <td><?php echo $user->full_name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user_levels[$user->user_level]; ?></td>
                        <td><?php echo $user_status[$user->activated]; ?></td>
                        <td class="hide">
                            <?php echo anchor("auth/profile/{$user->fk_user_id}", '<i class="icon-edit"></i>', 'class="btn btn-mini"'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">Tiada senarai pengguna dijumpai.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<!--<?php echo $pagination; ?>

<?php if (!empty($users)): ?>
    <div class="custom-legend">//<?php echo $this->pagination->create_pagination_text(); ?></div>
<?php endif; ?>-->

<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Pengesahan</h3>
    </div>
    <div class="modal-body">
        <p>Hapus rekod dari sistem?</p>
    </div>
    <div class="modal-footer">
        <?php echo form_open('auth/deactivate', 'id="form-delete-list"'); ?>
        <input type="hidden" name="ids"/>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
        <input type="submit" class="btn btn-primary" value="Hapus Rekod"/>
        <?php echo form_close(); ?>
    </div>
</div>
    
<!--Ake add utk searching -- 15-26line -->
    <script type="text/javascript">
    $(document).ready(function(){
        $('#submit').click(function(){
            var url = "<?php echo site_url('auth/profile/'); ?>" + "/" +$('#ac_user_id').val();
            $(location).attr('href', url);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){    
        // Load users then initialize plugin:
        $.ajax({
            url: '<?php echo site_url('ajaxify/getUserList') ?>',
            //url: 'assets/js/countries.txt',
            dataType: 'json'
        }).done(function (source) {

            var userArray = $.map(source, function (value, key) {
                return {
                    value: value, 
                    data: key
                };            
            }),
            users = $.map(source, function (value) {
                return value;
            });
        
            // Setup jQuery ajax mock:
            $.mockjax({
                url: '*',
                responseTime:  200,
                response: function (settings) {
                    var query = settings.data.query,
                    queryLowerCase = query.toLowerCase(),
                    suggestions = $.grep(users, function(user) {
                        return user.toLowerCase().indexOf(queryLowerCase) !== -1;
                    }),
                    response = {
                        query: query,
                        suggestions: suggestions
                    };

                    this.responseText = JSON.stringify(response);
                }
            });

            // Initialize autocomplete with local lookup:
            $('.ac_field').autocomplete({
                lookup: userArray,
                onSelect: function (suggestion) {
                    //$('#selection-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
                    var hiddenfield = "ac_" + $(this).attr('id');
                    $("#"+hiddenfield).val(suggestion.data);
                }
            });       
        
        });    
    });
</script>