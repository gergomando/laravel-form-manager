<div class="form-group">
	<div class="form-check">
		<div>
			{{{ $label }}}
		</div>
		<label class="form-check-label">
			{{{ Form::checkbox($column, 1, $value, ['class' => 'form-check-input']) }}}
			<span class="form-check-sign"><span class="check"></span></span>
		</label>
	</div>
    @include('form::components.validation')
</div>