<div class="form-group">
	<div class="form-check">
		<div>
			{{{ $field['label'] ? $field['label'] : ' ' }}}
		</div>
		<label class="form-check-label">
			<input
                @include('form-manager-render::components.field_attributes', ['attributes' => array_merge([
                    'name' => $name,
                    'value' => $value,
                    'class' => 'form-check-input',
                    'type' => 'checkbox'
                ], $attributes, $value ? ['checked' => 'checked'] : [])])
            >
			<span class="form-check-sign"><span class="check"></span></span>
		</label>
	</div>
    @include('form-manager-render::components.validation')
</div>