<?php 
namespace webmuscets\FormManager\Creator\Controllers;

use Redirect;
use App\Http\Controllers\Controller;
use webmuscets\FormManager\Creator\Models\Form;
use webmuscets\FormManager\Creator\Models\FormField;
use webmuscets\FormManager\Creator\Form as FormCreator;
use webmuscets\FormManager\Render\Form as FormRender;
use webmuscets\FormManager\Creator\Requests\FormRequest;

class FormController extends Controller {
	public function index() {
		$items = config()->get('form-manager.forms');
		return view('form-manager-creator::index',compact('items'));
	}

	public function create() {
		$form = new FormRender;
		$form->config = [
			'method' => 'POST',
			'url' => '/form-manager/forms',
		];
		$form->fields = [
			'name' => [
				'label' => 'Név',
				'attributes' => [
					'required' => 'required',
				],
			],
			'slug' => [
				'label' => 'Slug',
				'attributes' => [
					'required' => 'required',
				],
			],
			'fields' => [
			  'label' => 'Mezők',
			  'type' => 'multiline',
			  'fields' => [
					[
						'type' => 'text',
						'property' => 'name',
						'required' => true,
						'placeholder' => 'inputname',
					],
					[
						'type' => 'select',
						'property' => 'type',
						'required' => true,
						'listItems' => FormCreator::getInputTypes(),
					],
					[
						'type' => 'text',
						'property' => 'label',
						'placeholder' => 'Mező neve',
					],
			  ],
			],
		];

		$form = $form->render();
		$title = 'Form létrehozása';
		return view('form-manager-creator::form',compact('form','title'));
	}

	public function store(FormRequest $request) {
		$inputs = $request->all()['crud'];
		
		$newInputs = $inputs;
		$newInputs['fields'] = [];
		foreach ($inputs['fields'] as $key => $field) {
			$newInputs['fields'][$field['name']] = $field;
		}

		$array = config('form-manager.forms') + [$inputs['slug'] => $newInputs];
	    $data = var_export($array, 1);
	    if(\File::put(base_path() . '/config/form-manager/forms.php', "<?php\n return $data ;"))
	    	\Artisan::call('config:cache');

		return Redirect::to('/form-manager');
	}

	public function edit($slug) {
		$formData = config('form-manager.forms.product-create');
		$form = new FormRender;
		$form->config = [
			'method' => 'PUT',
			'url' => '/form-manager/forms/'.$slug,
		];

		$form->values = $formData;
		$form->fields = [
			'name' => [
				'label' => 'Név',
			],
			'slug' => [
				'label' => 'Slug',
			],
			'fields' => [
			  'label' => 'Mezők',
			  'type' => 'multiline',
			  'fields' => [
					[
						'type' => 'hidden',
						'property' => 'id',
					],
					[
						'type' => 'text',
						'property' => 'name',
						'required' => true,
						'placeholder' => 'inputname',
					],
					[
						'type' => 'select',
						'property' => 'type',
						'required' => true,
						'listItems' => FormCreator::getInputTypes(),
					],
					[
						'type' => 'text',
						'property' => 'label',
						'placeholder' => 'Mező neve',
					],
			  ],
			  'rows' => array_values($formData['fields']),
			],
		];

		$form = $form->render();
		$title = 'Form szerkesztése';
		return view('form-manager-creator::form',compact('form','title'));
	}

	public function update(FormRequest $request, $slug) {
		$inputs = $request->all()['crud'];
		
		$existingForms = config('form-manager.forms');
		
		$newInputs = $inputs;
		$newInputs['fields'] = [];
		foreach ($inputs['fields'] as $key => $field) {
			$newInputs['fields'][$field['name']] = $field;
		}
		$existingForms[$inputs['slug']] = $newInputs;
	    $data = var_export($existingForms, 1);
	    if(\File::put(base_path() . '/config/form-manager/forms.php', "<?php\n return $data ;")) {
	    	\Artisan::call('config:cache');
	    }
		/*
		$form = Form::findOrFail($id);

		$form->fill([
			'name' => $inputs['name'],
			'slug' => $inputs['slug'],
		])->save(); 

		$deletableItems = isset($request['deletableItems']) && is_array($request['deletableItems']) ? $request['deletableItems'] : [];
		foreach ($inputs['fields'] as $field) {
			$field['form_id'] = $id;
			FormField::updateOrCreate(['id' => $field['id']], $field);
		}

		foreach ($deletableItems as $fieldID) {
			$fieldItem = FormField::findOrFail($fieldID);
			foreach ($fieldItem->attributes as $attribute) {
				$attribute->delete();
			}

			$fieldItem->delete();
		}
		*/
		return Redirect::to('/form-manager');
	}

	public function destroy() {

	}

}