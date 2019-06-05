<div class="form-group">
	<div class="form-check">
		<div>
			{{{ $label ? $label : ' ' }}}
		</div>
		<label class="form-check-label">
			{{{ Form::checkbox($column, 1, $value, array_merge(['class' => 'form-check-input'], $attributes)) }}}
			<span class="form-check-sign"><span class="check"></span></span>
		</label>
	</div>
    @include('form-manager-render::components.validation')
</div>