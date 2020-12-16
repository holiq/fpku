          <ol class="breadcrumb">
            <?php foreach ($uri->getSegments() as $segment):
            $url = substr(uri_string(), 0, strpos(uri_string(), $segment)) . $segment;
            $is_active = $url == uri_string();
            ?>
            <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
            <?php if($is_active): ?>
              <?php echo ucfirst($segment) ?>
            <?php else: ?>
              <a href="<?php echo base_url($url) ?>"><?php echo ucfirst($segment) ?></a>
            <?php endif; ?>
            </li>
          <?php endforeach; ?>
          </ol>