<?php

namespace Plutus\Http\Controllers;

use anlutro\LaravelSettings\SettingStore as Settings;
use Illuminate\Http\Request;
use PascalKleindienst\FormListGenerator\Generators\FormGenerator;
use Route;

class SettingsController extends Controller
{
    /**
     * Show Settings form
     * @param  FormGenerator $generator
     * @param  Settings      $settings
     * @return \Illuminate\Http\Response
     */
    public function index(FormGenerator $generator, Settings $settings)
    {
        return view('settings.index', ['generator' => $generator, 'data' => old() + $settings->all()]);
    }

    /**
     * Update Settings
     * @param  Request  $request
     * @param  Settings $settings
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Settings $settings)
    {
        // validate inputs
        $this->validate($request, $this->rules());

        // Set settings
        $input = $request->except(['_token']);

        foreach ($input as $key => $value) {
            if (!is_null($value)) {
                $settings->set($key, $value);
            }
        }

        // save and redirect
        $settings->save();

        return redirect()->route('settings');
    }

    /**
     * Define Settings Routes
     * @return void
     */
    public static function routes()
    {
        Route::prefix('settings')->middleware('auth')->group(function () {
            Route::get('/', 'SettingsController@index')->name('settings');
            Route::post('/', 'SettingsController@update')->name('updateSettings');
        });
    }

    /**
     * Define validation rules
     * @return array
     */
    protected function rules()
    {
        return [
            // General
            'language'            => 'required|alpha',
            'country'             => 'required|string',
            'date_format'         => 'required|string',
            'first_day_of_week'   => 'required|integer|between:1,7',
            'currency'            => 'required|string',
            'currency_placement'  => 'required|in:before,after',
            'thousands_separator' => 'required|string|size:1',
            'decimal_point'       => 'required|string|size:1',

            // Company
            'company_website'     => 'url',
            'company_email'       => 'required|email',
            'company_logo'        => 'image',
            'company_street'      => 'required|string',
            'company_apt'         => 'required|string',
            'company_city'        => 'required|string',
            'company_postal_code' => 'required|string',

            // Email
            'reply_to_mail'               => 'required|email',
            'bcc_email'                   => 'required|email',
            'attach_invoice'              => 'required|boolean',
            'invoice_subject_template'    => 'required|string',
            'invoice_body_template'       => 'required|string',
            'reminder_send_after'         => 'required|integer',
            'reminder_send_automatically' => 'required|boolean',
            'reminder_subject_template'   => 'required|string',
            'reminder_body_template'      => 'required|string',
        ];
    }
}
