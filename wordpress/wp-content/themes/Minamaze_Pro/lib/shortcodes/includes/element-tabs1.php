<?php
$icon   = NULL;
$active = NULL;
$increment = NULL;
?>

	<div class="tabs style1">

		<ul class="nav nav-tabs">
		
		<?php foreach((array) $groups['title'] as $increment=>$context){ ?>
		
		<?php
		$icon = $context['icon'];
		if ( ! empty( $icon ) ) { 
			$icon = '<i class="fa fa-' . $icon . '"></i>';
		} else {
			$icon = '';
		}

		if ( empty( $increment ) or $increment == '0' ) { 
			$active = ' class="active"';
		} else {
			$active = '';
		}
		?>

		<li<?php echo $active; ?>><a href="#<?php echo $instanceID; ?>-<?php echo $increment; ?>" data-toggle="tab"><?php echo $icon; ?><?php echo $context['title']; ?></a></li>

		<?php $increment = $increment + 1; ?>

		<?php } ?>
		
		</ul>
	
		<?php $increment = NULL; ?>
	
		<div class="tab-content">
		
		<?php foreach((array) $groups['title'] as $increment=>$context){ ?>
			
		<?php
		if ( empty( $increment ) or $increment == '0' ) { 
			$active = '  active in';
		} else {
			$active = '';
		}
		?>

		<div class="tab-pane fade<?php echo $active; ?>" id="<?php echo $instanceID; ?>-<?php echo $increment; ?>"><?php echo $context['tab']; ?></div>

		<?php $increment = $increment + 1; ?>

		<?php } ?>

		<?php $increment = NULL; ?>

		</div>

	</div>