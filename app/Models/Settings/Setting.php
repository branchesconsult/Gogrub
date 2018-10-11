<?php

namespace App\Models\Settings;

use App\Models\BaseModel;

class Setting extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    const SITE_LOGO = 'seo_site_logo';
    const SITE_FAVICON = 'seo_site_favicon';
    const SITE_TITLE = 'seo_site_title';
    const PRODUCT_SEARCH_AREA = 'product_search_area';
    const DEFAULT_GOGRUB_COMMISSION = 'gogrub_default_commission';
    const COMPANY_ADDRESS = 'company_address';
    const COMPANY_PHONE = 'company_phone';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
