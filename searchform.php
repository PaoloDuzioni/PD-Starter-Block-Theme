<?php if (!defined('ABSPATH')) exit; ?>

<form class="d-flex" action="<?php echo esc_url(home_url()); ?>" method="get">
    <div class="input-group">
        <input type="text" id="s" class="form-control" name="s" placeholder="Search" aria-label="Search" />
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>