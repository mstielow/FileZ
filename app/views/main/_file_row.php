


<div class="file-description">
  <img src="<?php echo get_mimetype_icon_url ($file->getMimetype ()) ?>" class="mimetype" />
  <p class="filename">
    <a href="<?php echo $file->getDownloadUrl () ?>">
      <?php echo h (truncate_string ($file->file_name, 40)) ?>
    </a>
  </p>
  <p class="comment"><?php echo $file->comment ?> &nbsp;</p>
  <p class="filesize">(<?php echo $file->getReadableFileSize () ?>)</p>
  <p class="share">
    <a href="<?php echo $file->getDownloadUrl () ?>/share" class="awesome green share">
      <?php echo __('Share') ?>
    </a>
  </p>
</div>

<div class="file-attributes">
  <p class="availability"><?php echo __r('Available from %from% to %to%', array (
    'from' => ($file->getAvailableFrom  ()->get (Zend_Date::MONTH) ==
               $file->getAvailableUntil ()->get (Zend_Date::MONTH)) ?
               $file->getAvailableFrom ()->toString ('d') : $file->getAvailableFrom ()->toString ('d MMMM'),
    'to' =>  '<b>'.$file->getAvailableUntil ()->toString ('d MMMM').'</b>')) // FIXME I18N ?>

    <?php if ($file->extends_count < fz_config_get ('app', 'max_extend_count')): ?>
      <a href="<?php echo $file->getDownloadUrl () ?>/extend" class="extend" title="<?php echo __('Extend one more day') ?>">
        <?php echo __('Extend one more day') ?>
      </a>
    <?php endif ?>
  </p>
  <p class="download-counter">
      <?php echo ($file->download_count == 0 ? __ ('Never downloaded') : (
                  $file->download_count == 1 ? __ ('Downloaded once') :
                                               __r('Download %x% times', array(
                                                'x' => (int) $file->download_count
      )))); // TODO ugly DIY plural ... ?>
  </p>
  <?php if (fz_config_get ('app', 'enable_require_login', 1) == 1
          || (fz_config_get ('app', 'enable_require_login', 0) == 0 
              && $file->require_login == 1)): ?>
  <p class="toggle">
    <?php if ($file->require_login == 1): ?>
        <a href="<?php echo $file->getDownloadUrl () ?>/toggle" class="toggle-off" title="<?php echo __('Toggle login requirement OFF') ?>">
          <?php echo __('Toggle login requirement OFF') ?>
        </a>
    <?php else: ?>
        <a href="<?php echo $file->getDownloadUrl () ?>/toggle" class="toggle-on" title="<?php echo __('Toggle login requirement ON') ?>">
          <?php echo __('Toggle login requirement ON') ?>
        </a>
    <?php endif ?>
  </p>
  <?php endif ?>
  <p class="delete">
    <a href="<?php echo $file->getDownloadUrl () ?>/delete" class="delete" title="<?php echo __('Delete') ?>">
      <?php echo __('Delete') ?>
    </a>
  </p>
</div>

