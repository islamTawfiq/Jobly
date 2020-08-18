<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $appends = ['import_name','export_name','worker_name','reservation_status'];
    protected $fillable = [
        'import_id',
        'nanny_id',
        'broker_id',
        'date',
        'time',
        'notes',
        'status',
    ];

    public function import()
    {
        return $this->hasOne(User::class, 'id', 'import_id');
    }
    public function export()
    {
        return $this->hasOne(User::class, 'id', 'broker_id');
    }
    public function workers()
    {
        return $this->hasOne(Nanny::class, 'id', 'nanny_id');
    }


    public function getImportNameAttribute()
    {

        $attribute = '';
        if ($this->import) {
            $attribute = $this->import->name;
        }
        return $attribute;
    }
    public function getExportNameAttribute()
    {

        $attribute = '';
        if ($this->export) {
            $attribute = $this->export->name;
        }
        return $attribute;
    }
    public function getWorkerNameAttribute()
    {

        $attribute = '';
        if ($this->workers) {
            $attribute = $this->workers->name;
        }
        return $attribute;
    }
    public function getReservationStatusAttribute()
    {

        $attribute = '';
        if ($this->status == 1) {
            $attribute = '<span class="btn btn-warning">Pending</span>';
        } elseif ($this->status == 2 || $this->status == 3 || $this->status == 5) {
            $attribute = '<span class="btn btn-danger">Rejected</span>';
        } elseif ($this->status == 4) {
            $attribute = '<span class="btn btn-danger">Waiting Interview</span>';
        } elseif ($this->status == 6) {
            $attribute = '<span class="btn btn-success">Hired</span>';
        }
        return $attribute;
    }

}
