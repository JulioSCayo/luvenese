<?php
$curl_enabled = function_exists('curl_version');
?>
<div class="gallery-env">

  <div class="row">

    <div class="col-sm-offset-3 col-sm-6">
      <div class="panel panel-primary" id="charts_env">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-info"></i>
            <?php echo get_phrase('application_details');?>
          </div>
        </div>
        <div class="panel-body" >
          <article class="album" style="border-left: 0px; border-right: 0px;">
            <!-- <section class="album-info">
              <h3><a href="javascript::"><?php echo get_settings('website_title'); ?></a></h3>
            </section> -->
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('software_version'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php echo get_settings('version'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('check_update'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <a href="https://codecanyon.net/user/creativeitem/portfolio"
                      target="_blank" style="color: #343a40;">
                        <i class="entypo-tag"></i>
                        <?php echo get_phrase('check_update'); ?>
                      </a>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('php_version'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php echo phpversion(); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('curl_enable'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php echo $curl_enabled ? '<span class="label label-success">'.get_phrase('enabled').'</span>' : '<span class="label label-danger">'.get_phrase('disabled').'</span>'; ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('purchase_code'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php echo get_settings('purchase_code'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('purchase_code_status'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php if (strtolower($application_details['purchase_code_status']) == 'expired'): ?>
                        <span class="label label-danger"><?php echo $application_details['purchase_code_status']; ?></span>
                      <?php elseif (strtolower($application_details['purchase_code_status']) == 'valid'): ?>
                        <span class="label label-success"><?php echo $application_details['purchase_code_status']; ?></span>
                      <?php else: ?>
                        <span class="label label-danger"><?php echo ucfirst($application_details['purchase_code_status']); ?></span>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('support_expiry_date'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php if ($application_details['support_expiry_date'] != "invalid"): ?>
                        <span class="float-right"><?php echo $application_details['support_expiry_date']; ?></span>
                      <?php else: ?>
                        <span class="float-right"><span class="badge badge-danger-lighten"><?php echo ucfirst($application_details['support_expiry_date']); ?></span></span>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('customer_name'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <?php if ($application_details['customer_name'] != "invalid"): ?>
                        <span class="float-right"><?php echo $application_details['customer_name']; ?></span>
                      <?php else: ?>
                        <span class="float-right"><span class="badge badge-danger-lighten"><?php echo ucfirst($application_details['customer_name']); ?></span></span>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="album-images-count">
                      <i class="entypo-right-bold"></i> <?php echo get_phrase('get_customer_support'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="album-options" style="font-weight: bold; text-align: right;">
                      <a href="http://support.creativeitem.com" target="_blank" style="color: #343a40;"> <i class="entypo-help-circled"></i> <?php echo get_phrase('customer_support'); ?> </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </article>
        </div>
      </div>

    </div>
  </div>
</div>
