<?php

namespace App\Traits;

trait HasDataTrait {
    public function addData($key, $value) {
        $data = $this->data;

        if (!property_exists($data, $key)) {
            $data->$key = $value;

            $this->update([
                'data' => $data
            ]);
        }
    }

    public function updateData($key, $value) {
        $data = $this->data;

        if (property_exists($data, $key)) {
            $data->$key = $value;

            $this->update([
                'data' => $data
            ]);
        }
    }

    public function removeData($key) {
        $data = $this->data;

        if (property_exists($data, $key)) {
            unset($data->$key);

            $this->update([
                'data' => $data
            ]);
        }
    }
}