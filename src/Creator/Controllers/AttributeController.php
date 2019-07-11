<?php 
namespace webmuscets\FormManager\Creator\Controllers;

use Redirect;
use App\Http\Controllers\Controller;
use webmuscets\FormManager\Creator\Models\Form;
use webmuscets\FormManager\Creator\Models\FormFieldAttribute;
use webmuscets\FormManager\Render\Form as FormRender;
use webmuscets\FormManager\Creator\Requests\FieldAttributeRequest;

class AttributeController extends Controller {
	public function index($slug) {
		$form = config('form-manager.'.$slug);

		$attributes = [];
		$fields = [];
		foreach ($form['fields'] as $field) {
			$fields[$field['name']] = $field['name'];

			if(!isset($field['attributes']))
				continue;

			foreach ($field['attributes'] as $attribute) {
				$attributes[] = $attribute;
			}
		}

		$form = new FormRender;
		$form->config = [
			'method' => 'POST',
			'url' => '/form-manager/forms/'.$slug.'/attributes',
		];
		$form->fields = [
			'attributes' => [
			  'label' => 'Attribútumok',
			  'type' => 'multiline',
			  'fields' => [
					[
						'type' => 'select',
						'property' => 'field',
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
			  	'rows' => array_values($attributes),
			],
		];

		$form = $form->render();
		$title = 'Form Inputok Attribútumainak szerkesztése';
		return view('form-manager-creator::form',compact('form','title'));
	}

	public function update(FieldAttributeRequest $request, $slug) {
		$inputs = $request->all()['crud'];
		
		$forms = config('form-manager');

		foreach ($inputs['attributes'] as $key => $field) {
			$forms[$slug]['fields'][$field['field']]['attributes'][$field['attribute']] = $field['value'];
		}

	  	$data = var_export($forms, 1);
	    
	    if(\File::put(base_path() . '/config/form-manager/forms.php', "<?php\n return $data ;"))
	    	\Artisan::call('config:cache');

		return Redirect::to('/form-manager');
	}

}