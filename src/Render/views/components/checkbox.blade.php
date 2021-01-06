<div class="form-group">
	<div class="form-check">
		<div>
			{{{ $field['label'] ? $field['label'] : ' ' }}}
		</div>
		<label class="form-check-label">
				<input type="checkbox" name="{{{ $field['name'] }}}" class="form-check-input" 
				@if ($field['value'])
				checked="checked" 
				@endif
				>
			<span class="form-check-sign"><span class="check"></span></span>
		</label>
	</div>
    @include('form-manager-render::components.validation')
</div>