<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function formatAmount($column, $decimals = 2, $dec_point = ',', $thousand_sep = ' ')
    {
        return $this->$column ? number_format($this->$column, $decimals, $dec_point, $thousand_sep) : null;
    }

    public function formatTimestamp($column, $format = 'Y-m-d H:i:s')
    {
        return $this->$column ? Carbon::parse($this->$column)->format($format) : null;
    }

}
