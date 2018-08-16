<div class="menu-member">
	<ul>
		<li<?php if($this->action->id == 'index') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('index')); ?>">Member Dashboard</a></li>
		<li<?php if($this->action->id == 'types') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('types')); ?>">Membership Types</a></li>
		<li<?php if($this->action->id == 'history') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('history')); ?>">Stay History</a></li>
		<li<?php if($this->action->id == 'reward') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('reward')); ?>">Reward History</a></li>
		<li<?php if($this->action->id == 'review') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('review')); ?>">Write Review</a></li>
		<li<?php if($this->action->id == 'logout') echo ' class="active"'; ?>><a href="<?php echo CHtml::normalizeUrl(array('logout')); ?>">Log Out</a></li>
	</ul>
</div>
