<div class="panel panel-primary" id="charts_env" style="padding: 0px !important; margin: 0px;">
  <div class="panel-heading">
    <div class="panel-title">
      <i class="fa fa-list"></i>
      <?php echo get_phrase('addon_list');?>
    </div>
  </div>
  <div class="panel-body">
    <table class="table  datatable" id="table_export">
      <thead>
        <tr>
          <th><?php echo get_phrase('name'); ?></th>
          <th><?php echo get_phrase('version'); ?></th>
          <th><?php echo get_phrase('status'); ?></th>
          <th><?php echo get_phrase('actions'); ?></th>
        </tr>
      </thead>
      <tbody>

          <?php foreach ($addons as $addon): ?>
                <tr>
                  <td><?php echo $addon['name']; ?></td>
                  <td><?php echo $addon['version']; ?></td>
                  <td>
                    <?php if($addon['status'] == 1): ?>
                      <span class="label label-success"><?php echo get_phrase('active'); ?></span>
                    <?php else: ?>
                      <span class="label label-primary"><?php echo get_phrase('deactive'); ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        <li>
                            <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/about_this_addon/'.$addon['id']); ?>', '<?php echo get_phrase('about_this_addon'); ?>')">
                                <i class="entypo-doc-text"></i>
                                <?php echo get_phrase('about_this_addon');?>
                            </a>
                        </li>
                        <?php if($addon['status'] == 1): ?>
                          <li>
                            <a href="<?php echo site_url('admin/addon/deactivate/'.$addon['id']); ?>">
                              <i class="entypo-qq"></i>
                              <?php echo get_phrase('deactive');?>
                            </a>
                          </li>
                        <?php else: ?>
                          <li>
                            <a href="<?php echo site_url('admin/addon/activate/'.$addon['id']); ?>">
                              <i class="entypo-qq"></i>
                              <?php echo get_phrase('active');?>
                            </a>
                          </li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li>
                          <a href="#" onclick="confirm_modal('<?php echo site_url('admin/addon/delete/'.$addon['id']); ?>', '<?php echo site_url('admin/addon/single_view'); ?>');" >
                            <i class="entypo-trash"></i>
                            <?php echo get_phrase('delete');?>
                          </a>
                        </li>
                      </ul>
                  </div>
                  </td>
                </tr>
              <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>