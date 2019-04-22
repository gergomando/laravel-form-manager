<?php 
namespace webmuscets\FormManager\Creator\Controllers;

use Redirect;
use App\Http\Controllers\Controller;
use webmuscets\FormManager\Creator\Models\Form;
use webmuscets\FormManager\Creator\Models\FormFieldAttribute;
use webmuscets\FormManager\Render\Form as FormRender;
use webmuscets\FormManager\Creator\Requests\FieldAttributeRequest;

class AttributeController extends Controller {
	public function index($id) {
		$form = Form::findOrFail($id);
		$attributes = [];
		$fields = $form->fields()->pluck('name','id')->all();

		foreach ($form->fields as $field) {
			foreach ($field->attributes as $attribute) {
				$attributes[] = $attribute;
			}
		}

		$form = new FormRender;
		$form->config = [
			'method' => 'POST',
			'url' => '/form-manager/forms/'.$id.'/attributes',
		];
		$form->fields = [
			'attributes' => [
			  'label' => 'Attribútumok',
			  'type' => 'multiline',
			  'fields' => [
					[
						'type' => 'hidden',
						'property' => 'id',
					],

					[
						'type' => 'select',
						'property' => 'field_id',
						'required' => true,
						'listItems' => $fields,
					],

					[
						'type' => 'text',
						'property' => 'attribute',
						'required' => true,
						'placeholder' => 'attribute',
					],
					[
						'type' => 'text',
						'property' => 'value',
						'required' => true,
						'placeholder' => 'value',
					],
			  	],
			  	'rows' => $attributes,
			],
		];

		$form = $form->render();
		$title = 'Form Inputok Attribútumainak szerkesztése';
		return view('form-manager-creator::form',compact('form','title'));
	}

	public function update(FieldAttributeRequest $request, $id) {
		$inputs = $request->all()['crud'];

		$deletableItems = isset($request['deletableItems']) && is_array($request['deletableItems']) ? $request['deletableItems'] : [];
		
		foreach ($inputs['attributes'] as $attribute) {
			FormFieldAttribute::updateOrCreate(['id' => $attribute['id']], $attribute);
		}

		foreach ($deletableItems as $itemID) {
			$attribute = FormFieldAttribute::findOrFail($itemID);
			$attribute->delete();
		}

		return Redirect::to('/form-manager');
	}

}