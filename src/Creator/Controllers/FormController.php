<?php 
namespace App\Libraries\FormManager\Creator\Controllers;

use Redirect;
use App\Http\Controllers\Controller;
use App\Libraries\FormManager\Creator\Models\Form;
use App\Libraries\FormManager\Creator\Models\FormField;
use App\Libraries\FormManager\Creator\Form as FormCreator;
use App\Libraries\FormManager\Render\Form as FormRender;
use App\Libraries\FormManager\Creator\Requests\FormRequest;

class FormController extends Controller {
	public function index() {
		$items = Form::all();
		return view('form-creator::index',compact('items'));
	}

	public function create() {
		$form = new FormRender;
		$form->config = [
			'method' => 'POST',
			'url' => '/dashboard/form-manager/forms',
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
		return view('form-creator::form',compact('form','title'));
	}

	public function store(FormRequest $request) {
		$inputs = $request->all()['crud'];
		$form = new Form;
		$form->fill([
			'name' => $inputs['name'],
			'slug' => $inputs['slug'],
		])->save(); 

		foreach ($inputs['fields'] as $field) {
			$field['form_id'] = $form->id;
			FormField::create($field);
		}

		return Redirect::to('/dashboard/form-manager');
	}

	public function edit($id) {
		$item = Form::findOrFail($id);
		$form = new FormRender;
		$form->config = [
			'method' => 'PUT',
			'url' => '/dashboard/form-manager/forms/'.$id,
		];
		$form->values = $item;
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
			  'rows' => $item->fields,

			],
		];

		$form = $form->render();
		$title = 'Form szerkesztése';
		return view('form-creator::form',compact('form','title'));
	}

	public function update(FormRequest $request, $id) {
		$inputs = $request->all()['crud'];
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

		return Redirect::to('/dashboard/form-manager');
	}

	public function destroy() {

	}

}