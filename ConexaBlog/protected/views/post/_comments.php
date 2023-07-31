<?php foreach ($comments as $comment): ?>
	<div class="bg-light rounded border m-2 p-4">
		<div class="d-flex flex-start align-items-center">
			<?php if (isset($comment['user']['photo'])): ?>
				<img class="rounded-circle shadow-1-strong" src="<?php echo $comment['user']['photo'] ?>" alt="avatar"
					width="65" />
			<?php endif ?>
			<div class="flex-grow-1 flex-shrink-1">
				<div>
					<div class="d-flex justify-content-between align-items-center">
						<strong class="mb-1">
							<?php echo $comment['user']['name'] ?>
						</strong>
						<span class="small">
							<?php echo Yii::app()->dateFormatter->format('dd-MM-yyyy HH:mm', strtotime($post['created_at'])); ?>
						</span>
					</div>
					<p class="small mb-0">
						<?php echo nl2br(CHtml::encode($comment['content'])); ?>
					</p>
				</div>
			</div>

		</div><!-- comment -->
	</div>
<?php endforeach; ?>