<h6>Vista _paginacion</h6>
<div class="pagination" style="text-align: center;">
    <ul>
		<?php if(isset($this->_paginacion)): ?>
			<?php if(isset($this->_paginacion['primero'])): ?>
				<li><a href="<?php echo $link . $this->_paginacion['primero']; ?>">&Lt;</a></li>
			<?php else: ?>
				<li class="disabled"><span>&Lt;</span></li>
			<?php endif; ?>
		
			<?php if(isset($this->_paginacion['anterior'])): ?>
				<li><a href="<?php echo $link . $this->_paginacion['anterior']; ?>">&lt;</a></li>
			<?php else: ?>
				<li class="disabled"><span>&lt;</span></li>
			<?php endif; ?>
		
			<?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>
		
				<?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>
		
					<li class="active"><span><?php echo $this->_paginacion['rango'][$i]; ?></span></li>
				
				<?php else: ?>
		
						<li>
							<a href="<?php echo $link . $this->_paginacion['rango'][$i]; ?>">
								<?php echo $this->_paginacion['rango'][$i]; ?>
							</a>
						</li>
		
				<?php endif; ?>
		
			<?php endfor; ?>
		
			<?php if(isset($this->_paginacion['siguiente'])): ?>
				<li><a href="<?php echo $link . $this->_paginacion['siguiente']; ?>">&gt;</a></li>
			<?php else: ?>
				<li class="disabled"><span>&gt;</span></li>
			<?php endif; ?>
		
			<?php if(isset($this->_paginacion['ultimo'])): ?>
				<li><a href="<?php echo $link . $this->_paginacion['ultimo']; ?>">&Gt;</a></li>
			<?php else: ?>
				<li class="disabled"><span>&Gt;</span></li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>