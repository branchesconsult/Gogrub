<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Settings\ManageSettingsRequest;
use App\Http\Requests\Backend\Settings\UpdateSettingsRequest;
use App\Http\Responses\Backend\Setting\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Models\Settings\Setting;
use App\Repositories\Backend\Settings\SettingsRepository;

/**
 * Class SettingsController.
 */
class SettingsController extends Controller
{
    protected $settings;

    public function index()
    {
        $settings = Setting::all();
        $reformationSettingsArr = [];
        foreach ($settings as $key => $val) {
            $reformationSettingsArr[$val['setting_key']] = $val['setting_value'];
        }
        $data['settings'] = $reformationSettingsArr;
        return view('backend.settings.edit', $data);
    }

    /**
     * @param \App\Repositories\Backend\Settings\SettingsRepository $settings
     */
    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param \App\Models\Settings\Setting $setting
     * @param \App\Http\Requests\Backend\Settings\ManageSettingsRequest $request
     *
     * @return \App\Http\Responses\Backend\Setting\EditResponse
     */
    public function edit(Setting $setting, ManageSettingsRequest $request)
    {
        return new EditResponse($setting);
    }

    /**
     * @param \App\Models\Settings\Setting $setting
     * @param \App\Http\Requests\Backend\Settings\UpdateSettingsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Setting $setting, UpdateSettingsRequest $request)
    {
        Setting::truncate();
        $settings = $request->except(['_token', '_method']);
        $insertRecord = [];
        $counter = 0;
        foreach ($settings as $key => $val) {
            $insertRecord[$counter]['setting_key'] = $key;
            $insertRecord[$counter]['setting_value'] = $val;
            $counter++;
        }
        Setting::insert($insertRecord);
        return new RedirectResponse(route('admin.settings.form'),
            ['flash_success' => trans('alerts.backend.settings.updated')]);
    }
}
